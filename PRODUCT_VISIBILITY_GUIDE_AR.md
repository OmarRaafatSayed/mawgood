# 🎯 دليل حل مشكلة ظهور المنتجات ACTIVE

## 📌 المشكلة

منتجات حالتها `status = ACTIVE (1)` في لوحة الأدمن **لا تظهر** في الواجهة الأمامية.

---

## 🔍 السبب الجذري

### الشروط الخفية التي تمنع الظهور:

#### 1️⃣ في `ProductsCategoriesProxyController.php`:
```php
if (
    ! $product->url_key          // ❌ يجب أن يكون موجود
    || ! $product->visible_individually  // ❌ يجب أن يكون = 1
    || ! $product->status        // ❌ يجب أن يكون = 1
) {
    abort(404);
}
```

#### 2️⃣ في `ProductRepository->searchFromDatabase()`:
- يبحث في `product_attribute_values` عن:
  - `name` (يجب أن يكون موجود)
  - `status = 1`
  - `visible_individually = 1`
  - `url_key` (يجب أن يكون موجود)

#### 3️⃣ في `product_flat` table:
- يجب أن تكون البيانات محدثة ومتطابقة

#### 4️⃣ شروط إضافية:
- `approved_by_admin = 1` (للمنتجات من التجار)
- `product_price_indices` موجود
- `product_inventory_indices` موجود
- `product_channels` مرتبط
- `product_categories` مرتبط

---

## ✅ الحل الشامل

### الخطوة 1: إضافة Scopes في Product Model

تم إضافة الـ Scopes التالية في `packages/Webkul/Product/src/Models/Product.php`:

```php
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
    return $query->where('visible_individually', 1);
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

### الخطوة 2: استخدام ProductVisibilityService

تم إنشاء Service في `app/Services/Product/ProductVisibilityService.php`:

```php
$service = new ProductVisibilityService();

// التحقق من الرؤية
$isVisible = $service->isVisibleInFrontend($product);

// الحصول على المتطلبات
$requirements = $service->getVisibilityRequirements($product);

// الحصول على المتطلبات الناقصة
$missing = $service->getMissingRequirements($product);
```

### الخطوة 3: استخدام أمر التشخيص

```bash
# تشخيص منتج معين
php artisan product:diagnose 123

# سيعرض:
# ✅ حالة الظهور
# 📋 جدول بكل المتطلبات
# ⚠️  المتطلبات الناقصة
# 🔍 فحوصات إضافية
# 💡 توصيات للإصلاح
```

---

## 🎯 استخدام Scopes في الكود

### في الواجهة الأمامية (Shop):

```php
// ✅ الطريقة الصحيحة - عرض المنتجات الجاهزة للمتجر فقط
$products = Product::forShop()
    ->with(['images', 'price_indices'])
    ->paginate(20);

// أو باستخدام Scopes منفصلة
$products = Product::active()
    ->visibleInFrontend()
    ->approved()
    ->paginate(20);
```

### في لوحة الأدمن:

```php
// ✅ عرض كل المنتجات بدون شروط
$products = Product::with(['images', 'attribute_family'])
    ->paginate(20);

// أو مع فلتر حسب الحالة
$products = Product::where('status', 1)
    ->paginate(20);
```

### في Repository:

```php
// في ProductRepository
public function getForShop(array $params = [])
{
    return $this->scopeQuery(function($query) {
        return $query->forShop();
    })->getAll($params);
}
```

---

## 🔧 إصلاح منتج لا يظهر

### الطريقة 1: استخدام أمر التشخيص

```bash
# 1. تشخيص المشكلة
php artisan product:diagnose 123

# 2. اتبع التوصيات المعروضة
```

### الطريقة 2: استخدام SQL

```sql
-- 1. التحقق من حالة المنتج
SELECT 
    p.id,
    p.sku,
    p.status,
    p.vendor_id,
    p.approved_by_admin,
    pf.name,
    pf.url_key,
    pf.visible_individually,
    pf.status as flat_status
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id
WHERE p.id = 123;

-- 2. إصلاح المنتج
UPDATE products 
SET status = 1, approved_by_admin = 1 
WHERE id = 123;

UPDATE product_flat 
SET status = 1, visible_individually = 1 
WHERE product_id = 123;

-- 3. التأكد من وجود price index
SELECT * FROM product_price_indices WHERE product_id = 123;

-- 4. التأكد من وجود inventory index
SELECT * FROM product_inventory_indices WHERE product_id = 123;
```

### الطريقة 3: استخدام Tinker

```bash
php artisan tinker
```

```php
use Webkul\Product\Models\Product;
use App\Services\Product\ProductVisibilityService;

$product = Product::find(123);
$service = new ProductVisibilityService();

// التحقق من الرؤية
$isVisible = $service->isVisibleInFrontend($product);
echo "Is Visible: " . ($isVisible ? 'Yes' : 'No') . "\n";

// الحصول على المتطلبات الناقصة
$missing = $service->getMissingRequirements($product);
print_r($missing);

// إصلاح المنتج
$product->status = 1;
$product->approved_by_admin = 1;
$product->save();

// تحديث product_flat
\DB::table('product_flat')
    ->where('product_id', 123)
    ->update([
        'status' => 1,
        'visible_individually' => 1,
    ]);
```

---

## 📋 Checklist للمنتج الجديد

عند إضافة منتج جديد، تأكد من:

### في جدول `products`:
- [ ] `status = 1` (نشط)
- [ ] `vendor_id` (إذا كان من تاجر)
- [ ] `approved_by_admin = 1` (إذا كان من تاجر)
- [ ] `attribute_family_id` موجود
- [ ] `sku` فريد

### في جدول `product_attribute_values`:
- [ ] `name` موجود (attribute_id = 2 عادة)
- [ ] `url_key` موجود (attribute_id = 3 عادة)
- [ ] `visible_individually = 1` (attribute_id = 7 عادة)
- [ ] `status = 1` (attribute_id = 8 عادة)
- [ ] `price` موجود (attribute_id = 11 عادة)

### في جدول `product_flat`:
- [ ] `name` موجود
- [ ] `url_key` موجود
- [ ] `status = 1`
- [ ] `visible_individually = 1`
- [ ] `locale` = اللغة الحالية
- [ ] `channel` = القناة الحالية

### في جداول الفهرسة:
- [ ] `product_price_indices` موجود
- [ ] `product_inventory_indices` موجود (qty > 0)

### في جداول العلاقات:
- [ ] `product_channels` مرتبط بقناة واحدة على الأقل
- [ ] `product_categories` مرتبط بفئة واحدة على الأقل
- [ ] `product_inventories` له كمية
- [ ] `product_images` له صورة واحدة على الأقل

---

## 🎓 فهم معنى ACTIVE

### ❌ التعريف الخاطئ:
```
ACTIVE = status = 1 فقط
```

### ✅ التعريف الصحيح:
```
ACTIVE = المنتج جاهز للعرض في الموقع
```

**يعني:**
- ✅ `status = 1` (مفعّل)
- ✅ `visible_individually = 1` (يظهر بشكل مستقل)
- ✅ `url_key` موجود (له رابط)
- ✅ `name` موجود (له اسم)
- ✅ `approved_by_admin = 1` (موافق عليه - للتجار فقط)
- ✅ مرتبط بـ channel
- ✅ مرتبط بـ category
- ✅ له سعر
- ✅ له كمية

---

## 🏗️ المعمارية الصحيحة

### مستويات حالة المنتج:

```
1. DRAFT (مسودة)
   - status = 0
   - لا يظهر في أي مكان

2. PENDING_APPROVAL (بانتظار الموافقة)
   - status = 1
   - approved_by_admin = 0
   - يظهر في لوحة التاجر فقط

3. ACTIVE (نشط)
   - status = 1
   - approved_by_admin = 1
   - visible_individually = 1
   - url_key موجود
   - name موجود
   - يظهر في الموقع

4. INACTIVE (غير نشط)
   - status = 0
   - لا يظهر في الموقع
```

### فصل المنطق:

```
┌─────────────────────────────────────────┐
│         Model (Product.php)             │
│  - Scopes (active, forShop, etc.)      │
└─────────────────────────────────────────┘
                    ↓
┌─────────────────────────────────────────┐
│    Repository (ProductRepository.php)   │
│  - getForShop(), getForAdmin()         │
└─────────────────────────────────────────┘
                    ↓
┌─────────────────────────────────────────┐
│  Service (ProductVisibilityService.php) │
│  - isVisibleInFrontend()               │
│  - getVisibilityRequirements()         │
└─────────────────────────────────────────┘
                    ↓
┌─────────────────────────────────────────┐
│         Controller                      │
│  - استخدام Service للتحقق             │
└─────────────────────────────────────────┘
```

---

## 🚀 أمثلة عملية

### مثال 1: عرض المنتجات في الصفحة الرئيسية

```php
// في HomeController
public function index()
{
    $products = Product::forShop()
        ->with(['images', 'price_indices'])
        ->latest()
        ->take(12)
        ->get();
    
    return view('shop::home.index', compact('products'));
}
```

### مثال 2: عرض المنتجات في فئة

```php
// في CategoryController
public function show($slug)
{
    $category = Category::findBySlug($slug);
    
    $products = $category->products()
        ->forShop()
        ->with(['images', 'price_indices'])
        ->paginate(20);
    
    return view('shop::categories.view', compact('category', 'products'));
}
```

### مثال 3: البحث عن المنتجات

```php
// في SearchController
public function index(Request $request)
{
    $query = $request->input('query');
    
    $products = Product::forShop()
        ->where('name', 'like', "%{$query}%")
        ->with(['images', 'price_indices'])
        ->paginate(20);
    
    return view('shop::search.index', compact('products', 'query'));
}
```

### مثال 4: التحقق من رؤية منتج معين

```php
// في ProductController
public function show($slug)
{
    $product = Product::where('url_key', $slug)->first();
    
    if (!$product) {
        abort(404);
    }
    
    $service = new ProductVisibilityService();
    
    if (!$service->isVisibleInFrontend($product)) {
        abort(404, 'المنتج غير متاح حالياً');
    }
    
    return view('shop::products.view', compact('product'));
}
```

---

## 🔧 تحديث ProductRepository (اختياري)

إذا أردت تحديث `ProductRepository` لاستخدام الـ Scopes:

```php
// في packages/Webkul/Product/src/Repositories/ProductRepository.php

/**
 * Get products for shop frontend
 */
public function getForShop(array $params = [])
{
    return $this->scopeQuery(function($query) {
        return $query->forShop();
    })->getAll($params);
}

/**
 * Search product from database for shop
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

---

## 📊 Query مثالي لعرض المنتجات ACTIVE

### Query بسيط:
```php
Product::forShop()->get();
```

### Query مع علاقات:
```php
Product::forShop()
    ->with([
        'images',
        'price_indices',
        'inventory_indices',
        'categories',
    ])
    ->paginate(20);
```

### Query مع فلاتر إضافية:
```php
Product::forShop()
    ->whereHas('categories', function($q) use ($categoryId) {
        $q->where('category_id', $categoryId);
    })
    ->whereBetween('price', [100, 500])
    ->orderBy('created_at', 'desc')
    ->paginate(20);
```

### Query SQL مباشر:
```sql
SELECT p.*
FROM products p
INNER JOIN product_flat pf ON p.id = pf.product_id
WHERE p.status = 1
  AND pf.visible_individually = 1
  AND pf.url_key IS NOT NULL
  AND pf.name IS NOT NULL
  AND (p.vendor_id IS NULL OR p.approved_by_admin = 1)
  AND pf.locale = 'ar'
  AND pf.channel = 'default';
```

---

## 🎯 الخلاصة

### المشكلة:
- `status = ACTIVE` لا يكفي لظهور المنتج
- هناك شروط خفية في الكود

### الحل:
1. ✅ استخدام Scopes: `Product::forShop()`
2. ✅ استخدام Service: `ProductVisibilityService`
3. ✅ استخدام أمر التشخيص: `php artisan product:diagnose {id}`
4. ✅ التأكد من كل المتطلبات في Checklist

### Query النهائي:
```php
Product::forShop()->paginate(20);
```

هذا يضمن عرض **فقط** المنتجات الجاهزة للعرض في الموقع! 🎉

---

**تم! ✅**
