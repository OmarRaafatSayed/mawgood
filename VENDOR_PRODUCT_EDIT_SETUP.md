# نسخ صفحة تعديل المنتج من الأدمن إلى لوحة التاجر

## التغييرات المطبقة

### 1. إنشاء صفحة التعديل للتاجر
**الملف:** `packages/Mawgood/Vendor/src/Resources/views/products/edit.blade.php`

تم نسخ صفحة التعديل من الأدمن بالكامل مع التعديلات التالية:
- تغيير الروتات من `admin.catalog.products.*` إلى `vendor.products.*`
- تغيير النصوص للعربية
- استخدام نفس layout الأدمن (`x-admin::layouts`)
- استخدام نفس المكونات والـ includes من الأدمن

### 2. تحديث Controller التاجر
**الملف:** `packages/Mawgood/Vendor/src/Http/Controllers/ProductController.php`

تم إضافة دالتين جديدتين:

#### دالة edit
```php
public function edit(Request $request, $id)
{
    $vendor = $request->vendor;
    $product = \Webkul\Product\Models\Product::where('id', $id)
        ->where('vendor_id', $vendor->id)
        ->firstOrFail();

    return view('mawgood-vendor::products.edit', compact('product', 'vendor'));
}
```

#### دالة update
```php
public function update(Request $request, $id)
{
    try {
        $vendor = $request->vendor;
        $product = \Webkul\Product\Models\Product::where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->firstOrFail();

        \Illuminate\Support\Facades\Event::dispatch('catalog.product.update.before', $id);

        $productRepository = app(\Webkul\Product\Repositories\ProductRepository::class);
        $product = $productRepository->update($request->all(), $id);

        \Illuminate\Support\Facades\Event::dispatch('catalog.product.update.after', $product);

        return redirect()->route('vendor.products.index')
            ->with('success', 'تم تحديث المنتج بنجاح');
    } catch (\Exception $e) {
        \Log::error('Product Update Error: ' . $e->getMessage());
        return back()->withInput()->with('error', 'فشل في تحديث المنتج: ' . $e->getMessage());
    }
}
```

### 3. الروتات
**الملف:** `packages/Mawgood/Vendor/src/Routes/vendor.php`

الروتات موجودة بالفعل:
```php
Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/{id}', [ProductController::class, 'update'])->name('update');
```

## الروابط

### صفحة الأدمن (الأصلية)
```
http://localhost:8000/admin/catalog/products/edit/8
```

### صفحة التاجر (الجديدة)
```
http://localhost:8000/vendor/products/1/edit
```

## المميزات

✅ نفس الواجهة والتصميم من الأدمن
✅ نفس الحقول والخيارات
✅ دعم متعدد اللغات والقنوات
✅ رفع الصور والفيديوهات
✅ إدارة المخزون
✅ الفئات والعلاقات
✅ SEO والميتا
✅ جميع أنواع المنتجات (Simple, Configurable, Bundle, etc.)

## الاستخدام

1. قم بتسجيل الدخول كتاجر
2. اذهب إلى: `http://localhost:8000/vendor/products`
3. اضغط على "تعديل" لأي منتج
4. ستظهر نفس صفحة التعديل الموجودة في الأدمن
5. قم بالتعديلات المطلوبة
6. اضغط "حفظ"

## ملاحظات مهمة

1. **الصلاحيات**: التاجر يمكنه فقط تعديل منتجاته (vendor_id)
2. **الـ Layout**: تستخدم الصفحة `x-admin::layouts` من الأدمن
3. **الـ Components**: تستخدم جميع مكونات الأدمن
4. **الـ Includes**: تستخدم نفس ملفات الـ include من الأدمن:
   - `admin::catalog.products.edit.controls`
   - `admin::catalog.products.edit.images`
   - `admin::catalog.products.edit.videos`
   - `admin::catalog.products.edit.categories`
   - `admin::catalog.products.edit.channels`
   - `admin::catalog.products.edit.inventories`
   - `admin::catalog.products.edit.links`
   - `admin::catalog.products.edit.types.*`

## التحقق من التثبيت

```bash
# التحقق من الروتات
php artisan route:list | findstr "vendor.products"

# التحقق من الملفات
dir packages\Mawgood\Vendor\src\Resources\views\products\edit.blade.php

# اختبار الصفحة
# افتح المتصفح على: http://localhost:8000/vendor/products/1/edit
```

## استكشاف الأخطاء

### إذا ظهرت رسالة "View not found"
```bash
php artisan view:clear
php artisan config:clear
```

### إذا ظهرت رسالة "Product not found"
تأكد من أن المنتج ينتمي للتاجر المسجل دخوله (vendor_id)

### إذا لم تظهر الصفحة بشكل صحيح
تأكد من أن assets الأدمن محملة:
```bash
php artisan vendor:publish --tag=admin-assets
```
