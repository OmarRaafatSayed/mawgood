# 🏗️ معمارية ظهور المنتجات - Product Visibility Architecture

## 📋 المشكلة الحالية

المنتجات ذات الحالة `status = ACTIVE (1)` في لوحة الأدمن **لا تظهر** في الواجهة الأمامية بسبب:

### ✅ الشروط الخفية الموجودة حالياً:

#### 1. في `ProductsCategoriesProxyController` (السطر 73-78):
```php
if (
    ! $product->url_key          // ❌ يجب أن يكون موجود
    || ! $product->visible_individually  // ❌ يجب أن يكون = 1
    || ! $product->status        // ❌ يجب أن يكون = 1 (ACTIVE)
) {
    abort(404);
}
```

#### 2. في `ProductRepository->searchFromDatabase()`:
```php
// الشروط المطبقة على كل استعلام:
->where('name_product_attribute_values.text_value', 'like', '%'.$query.'%')
->where('status_product_attribute_values.integer_value', 1)
->where('visible_individually_product_attribute_values.boolean_value', 1)
->whereNotNull('url_key_product_attribute_values.text_value')
```

#### 3. في `product_flat` table:
- يجب أن يكون `name` موجود
- يجب أن يكون `status = 1`
- يجب أن يكون `visible_individually = 1`
- يجب أن يكون `url_key` موجود

#### 4. شروط إضافية محتملة:
- `approved_by_admin = 1` (للمنتجات من التجار)
- `vendor_id` موجود أو NULL
- `product_price_indices` موجود
- `product_inventory_indices` موجود
- `product_channels` مرتبط بالـ channel الحالي
- `product_categories` مرتبط بفئة واحدة على الأقل

---

## 🎯 التعريف الصحيح لـ ACTIVE

### ❌ التعريف الخاطئ الحالي:
```
ACTIVE = status = 1 فقط
```

### ✅ التعريف الصحيح المقترح:
```
ACTIVE = المنتج جاهز للعرض في الموقع
```

**يعني:**
- ✅ `status = 1` (مفعّل)
- ✅ `visible_individually = 1` (يظهر بشكل مستقل)
- ✅ `url_key` موجود (له رابط)
- ✅ `name` موجود (له اسم)
- ✅ `approved_by_admin = 1` (موافق عليه من الأدمن - للتجار فقط)
- ✅ مرتبط بـ channel واحد على الأقل
- ✅ له سعر في `product_price_indices`
- ✅ له كمية في `product_inventory_indices`

---

## 🏛️ المعمارية الصحيحة المقترحة

### 1️⃣ **فصل المفاهيم:**

```
┌─────────────────────────────────────────────────────────────┐
│                    Product Status Levels                     │
├─────────────────────────────────────────────────────────────┤
│                                                              │
│  1. DRAFT (مسودة)                                           │
│     - status = 0                                            │
│     - لا يظهر في أي مكان                                    │
│                                                              │
│  2. PENDING_APPROVAL (بانتظار الموافقة)                     │
│     - status = 1                                            │
│     - approved_by_admin = 0                                 │
│     - يظهر في لوحة التاجر فقط                               │
│                                                              │
│  3. ACTIVE (نشط)                                            │
│     - status = 1                                            │
│     - approved_by_admin = 1                                 │
│     - visible_individually = 1                              │
│     - url_key موجود                                         │
│     - name موجود                                            │
│     - يظهر في الموقع                                        │
│                                                              │
│  4. INACTIVE (غير نشط)                                      │
│     - status = 0                                            │
│     - لا يظهر في الموقع                                     │
│                                                              │
└─────────────────────────────────────────────────────────────┘
```

### 2️⃣ **تحديد المكان الصحيح للمنطق:**

#### A. Model Scopes (في `Product.php`):

```php
// Global Scope - يطبق تلقائياً على كل الاستعلامات
protected static function booted()
{
    // لا نستخدم Global Scope هنا لأنه سيمنع الأدمن من رؤية المنتجات
}

// Local Scopes - تستخدم عند الحاجة
public function scopeActive($query)
{
    return $query->where('status', 1);
}

public function scopeVisibleInFrontend($query)
{
    return $query
        ->where('status', 1)
        ->where('visible_individually', 1)
        ->whereNotNull('url_key')
        ->whereHas('attribute_values', function($q) {
            $q->where('attribute_id', $this->getNameAttributeId())
              ->whereNotNull('text_value');
        });
}

public function scopeApproved($query)
{
    return $query->where(function($q) {
        $q->whereNull('vendor_id')
          ->orWhere('approved_by_admin', 1);
    });
}

public function scopeForShop($query)
{
    return $query
        ->visibleInFrontend()
        ->approved()
        ->whereHas('channels', function($q) {
            $q->where('channel_id', core()->getCurrentChannel()->id);
        });
}
```

#### B. Repository Layer (في `ProductRepository.php`):

```php
/**
 * Get products for shop frontend
 */
public function getForShop(array $params = [])
{
    return $this->scopeQuery(function($query) use ($params) {
        return $query->forShop();
    })->getAll($params);
}

/**
 * Get products for admin panel
 */
public function getForAdmin(array $params = [])
{
    // بدون أي شروط إضافية - يعرض كل شيء
    return $this->getAll($params);
}
```

#### C. Service Layer (في `ProductService.php`):

```php
class ProductService
{
    public function isVisibleInFrontend(Product $product): bool
    {
        return $product->status == 1
            && $product->visible_individually == 1
            && !empty($product->url_key)
            && !empty($product->name)
            && $this->isApproved($product)
            && $this->hasValidPrice($product)
            && $this->hasValidInventory($product);
    }

    public function isApproved(Product $product): bool
    {
        // المنتجات من الأدمن لا تحتاج موافقة
        if (!$product->vendor_id) {
            return true;
        }

        // منتجات التجار تحتاج موافقة
        return $product->approved_by_admin == 1;
    }

    public function hasValidPrice(Product $product): bool
    {
        return $product->price_indices()
            ->where('channel_id', core()->getCurrentChannel()->id)
            ->exists();
    }

    public function hasValidInventory(Product $product): bool
    {
        return $product->inventory_indices()
            ->where('channel_id', core()->getCurrentChannel()->id)
            ->where('qty', '>', 0)
            ->exists();
    }
}
```

---

## 🔧 الحل المقترح

### الخطوة 1: إضافة Scopes في Product Model

```php
// في packages/Webkul/Product/src/Models/Product.php

/**
 * Scope للمنتجات النشطة فقط
 */
public function scopeActive($query)
{
    return $query->where('status', 1);
}

/**
 * Scope للمنتجات المرئية في الواجهة الأمامية
 */
public function scopeVisibleInFrontend($query)
{
    return $query
        ->where('status', 1)
        ->where('visible_individually', 1);
}

/**
 * Scope للمنتجات الموافق عليها
 */
public function scopeApproved($query)
{
    return $query->where(function($q) {
        $q->whereNull('vendor_id')
          ->orWhere('approved_by_admin', 1);
    });
}

/**
 * Scope للمنتجات الجاهزة للعرض في المتجر
 */
public function scopeForShop($query)
{
    return $query
        ->active()
        ->visibleInFrontend()
        ->approved();
}
```

### الخطوة 2: تحديث ProductRepository

```php
// في packages/Webkul/Product/src/Repositories/ProductRepository.php

/**
 * Search product from database for shop frontend
 */
public function searchFromDatabase(array $params = [])
{
    // ... الكود الموجود ...

    $query = $this->with([
        // ... العلاقات ...
    ])->scopeQuery(function ($query) use ($params) {
        // ... الكود الموجود ...

        // إضافة scope للمنتجات المرئية في المتجر
        if (!isset($params['admin_mode']) || !$params['admin_mode']) {
            $query->forShop();
        }

        return $query;
    });

    // ... باقي الكود ...
}
```

### الخطوة 3: تحديث ProductsCategoriesProxyController

```php
// في packages/Webkul/Shop/src/Http/Controllers/ProductsCategoriesProxyController.php

public function index(Request $request)
{
    // ... الكود الموجود ...

    $product = $this->productRepository
        ->setSearchEngine($searchEngine ?? 'database')
        ->findBySlug($slugOrURLKey);

    if ($product) {
        // ✅ استخدام Service للتحقق من الرؤية
        if (!app(ProductService::class)->isVisibleInFrontend($product)) {
            abort(404);
        }

        visitor()->visit($product);

        return view('shop::products.view', compact('product'));
    }

    // ... باقي الكود ...
}
```

### الخطوة 4: إنشاء ProductService

```php
// في app/Services/Product/ProductService.php

<?php

namespace App\Services\Product;

use Webkul\Product\Models\Product;

class ProductService
{
    /**
     * Check if product is visible in frontend
     */
    public function isVisibleInFrontend(Product $product): bool
    {
        // الشرط الأساسي: status = ACTIVE
        if ($product->status != 1) {
            return false;
        }

        // يجب أن يكون مرئي بشكل مستقل
        if (!$product->visible_individually) {
            return false;
        }

        // يجب أن يكون له url_key
        if (empty($product->url_key)) {
            return false;
        }

        // يجب أن يكون له اسم
        if (empty($product->name)) {
            return false;
        }

        // يجب أن يكون موافق عليه (للتجار فقط)
        if (!$this->isApproved($product)) {
            return false;
        }

        return true;
    }

    /**
     * Check if product is approved
     */
    public function isApproved(Product $product): bool
    {
        // المنتجات من الأدمن لا تحتاج موافقة
        if (!$product->vendor_id) {
            return true;
        }

        // منتجات التجار تحتاج موافقة
        return $product->approved_by_admin == 1;
    }

    /**
     * Get visibility requirements for a product
     */
    public function getVisibilityRequirements(Product $product): array
    {
        return [
            'status' => [
                'required' => true,
                'current' => $product->status,
                'valid' => $product->status == 1,
                'message' => 'يجب أن يكون المنتج نشط (status = 1)',
            ],
            'visible_individually' => [
                'required' => true,
                'current' => $product->visible_individually,
                'valid' => $product->visible_individually == 1,
                'message' => 'يجب أن يكون المنتج مرئي بشكل مستقل',
            ],
            'url_key' => [
                'required' => true,
                'current' => $product->url_key,
                'valid' => !empty($product->url_key),
                'message' => 'يجب أن يكون للمنتج رابط (URL Key)',
            ],
            'name' => [
                'required' => true,
                'current' => $product->name,
                'valid' => !empty($product->name),
                'message' => 'يجب أن يكون للمنتج اسم',
            ],
            'approved_by_admin' => [
                'required' => $product->vendor_id ? true : false,
                'current' => $product->approved_by_admin,
                'valid' => $this->isApproved($product),
                'message' => 'يجب أن يكون المنتج موافق عليه من الأدمن',
            ],
        ];
    }
}
```

---

## 🎯 Query مثالي لعرض المنتجات ACTIVE فقط

### في الواجهة الأمامية (Shop):

```php
// الطريقة 1: استخدام Scopes
$products = Product::forShop()
    ->with(['images', 'price_indices', 'inventory_indices'])
    ->paginate(20);

// الطريقة 2: استخدام Repository
$products = app(ProductRepository::class)->getAll([
    'status' => 1,
    'visible_individually' => 1,
]);

// الطريقة 3: Query Builder مباشر
$products = DB::table('product_flat')
    ->where('status', 1)
    ->where('visible_individually', 1)
    ->whereNotNull('url_key')
    ->whereNotNull('name')
    ->where('locale', app()->getLocale())
    ->where('channel', core()->getCurrentChannel()->code)
    ->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
    ->where(function($q) {
        $q->whereNull('products.vendor_id')
          ->orWhere('products.approved_by_admin', 1);
    })
    ->paginate(20);
```

### في لوحة الأدمن:

```php
// عرض كل المنتجات بدون شروط
$products = Product::with(['images', 'attribute_family'])
    ->paginate(20);

// أو مع فلتر حسب الحالة
$products = Product::where('status', 1)
    ->paginate(20);
```

---

## 🚫 تعطيل Global Scopes

إذا كان هناك Global Scope يمنع الظهور:

```php
// في Product Model
protected static function booted()
{
    // إزالة أي Global Scope موجود
    // static::addGlobalScope('active', function ($query) {
    //     $query->where('status', 1);
    // });
}

// لتجاوز Global Scope في استعلام معين:
$products = Product::withoutGlobalScope('active')->get();

// لتجاوز كل Global Scopes:
$products = Product::withoutGlobalScopes()->get();
```

---

## ✅ Checklist للتأكد من ظهور المنتج

عند إنشاء منتج جديد، تأكد من:

### في جدول `products`:
- [ ] `status = 1`
- [ ] `vendor_id` (إذا كان من تاجر)
- [ ] `approved_by_admin = 1` (إذا كان من تاجر)
- [ ] `attribute_family_id` موجود

### في جدول `product_attribute_values`:
- [ ] `name` موجود (attribute_id للاسم)
- [ ] `url_key` موجود (attribute_id للرابط)
- [ ] `visible_individually = 1`
- [ ] `status = 1`

### في جدول `product_flat`:
- [ ] `name` موجود
- [ ] `url_key` موجود
- [ ] `status = 1`
- [ ] `visible_individually = 1`
- [ ] `locale` = اللغة الحالية
- [ ] `channel` = القناة الحالية

### في جداول الفهرسة:
- [ ] `product_price_indices` موجود
- [ ] `product_inventory_indices` موجود
- [ ] `product_channels` مرتبط بالقناة

### في جداول العلاقات:
- [ ] `product_categories` مرتبط بفئة واحدة على الأقل
- [ ] `product_images` له صورة واحدة على الأقل

---

## 🔍 أداة تشخيص المنتج

```php
// في Tinker أو Controller
use App\Services\Product\ProductService;

$product = Product::find(1);
$service = new ProductService();

// التحقق من الرؤية
$isVisible = $service->isVisibleInFrontend($product);
echo "Is Visible: " . ($isVisible ? 'Yes' : 'No') . "\n";

// الحصول على المتطلبات
$requirements = $service->getVisibilityRequirements($product);

foreach ($requirements as $key => $req) {
    echo "\n{$key}:\n";
    echo "  Required: " . ($req['required'] ? 'Yes' : 'No') . "\n";
    echo "  Current: " . ($req['current'] ?? 'NULL') . "\n";
    echo "  Valid: " . ($req['valid'] ? 'Yes' : 'No') . "\n";
    echo "  Message: {$req['message']}\n";
}
```

---

## 📝 الخلاصة

### ❌ المشكلة:
- `status = ACTIVE` لا يكفي لظهور المنتج
- هناك شروط خفية في الكود

### ✅ الحل:
1. **تعريف واضح لـ ACTIVE**: منتج جاهز للعرض في الموقع
2. **فصل المنطق**: Model Scopes + Repository + Service
3. **استخدام Scopes**: `forShop()` للواجهة الأمامية
4. **تحديث Controllers**: استخدام Service للتحقق
5. **أداة تشخيص**: لمعرفة سبب عدم ظهور المنتج

### 🎯 Query النهائي:
```php
Product::forShop()->paginate(20);
```

هذا يضمن عرض **فقط** المنتجات:
- ✅ ACTIVE (status = 1)
- ✅ Visible (visible_individually = 1)
- ✅ Has URL (url_key موجود)
- ✅ Has Name (name موجود)
- ✅ Approved (approved_by_admin = 1 للتجار)

---

**تم! 🎉**
