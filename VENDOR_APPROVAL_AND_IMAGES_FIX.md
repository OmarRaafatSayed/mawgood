# تحديثات نظام الموافقة على المنتجات وإصلاح الصور

## التحديثات الجديدة

### 1. نظام الموافقة على المنتجات (Admin Approval)

#### المشكلة:
المنتجات كانت بتظهر في الموقع مباشرة بدون موافقة الأدمن.

#### الحل:
- ✅ إضافة حقل `approved_by_admin` في جدول `products`
- ✅ المنتجات الجديدة من التاجر تكون `status = 0` و `approved_by_admin = false`
- ✅ الأدمن لازم يوافق على المنتج عشان يظهر في الموقع

#### الملفات المعدلة:
1. **Migration:** `database/migrations/2026_02_01_002918_add_approved_by_admin_to_products_table.php`
   - أضاف حقل `approved_by_admin` (boolean, default: false)

2. **ProductController:** `packages/Mawgood/Vendor/src/Http/Controllers/ProductController.php`
   - تعديل `store()` method:
     ```php
     $data['status'] = 0; // Inactive until approved
     $data['approved_by_admin'] = false;
     ```

---

### 2. إصلاح مشكلة عرض الصور

#### المشكلة:
الصور كانت بتتحفظ في `storage/app/public` لكن مش بتظهر في الفورم.

#### الحل:
- ✅ تغيير طريقة عرض الصور من `Storage::url()` إلى `asset('storage/')`
- ✅ إضافة fallback image في حالة عدم وجود الصورة
- ✅ التأكد من وجود symbolic link للـ storage

#### الملفات المعدلة:
1. **form.blade.php:** `packages/Mawgood/Vendor/src/Resources/views/products/form.blade.php`
   - تغيير عرض الصور:
     ```blade
     <img src="{{ asset('storage/' . $image->path) }}" 
          onerror="this.src='{{ asset('themes/mawgood/assets/images/placeholder.png') }}'">
     ```
   - تغيير عرض الفيديو:
     ```blade
     <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
     ```

---

## كيفية الاستخدام

### للتاجر (Vendor):

#### إضافة منتج جديد:
1. اذهب إلى "المنتجات" → "إضافة منتج جديد"
2. املأ البيانات المطلوبة
3. ارفع صور المنتج
4. اضغط "حفظ المنتج"
5. **ملحوظة:** المنتج لن يظهر في الموقع حتى يوافق عليه الأدمن

#### حالة المنتج:
- 🔴 **قيد المراجعة:** المنتج تم إضافته وينتظر موافقة الأدمن
- 🟡 **معتمد لكن غير نشط:** الأدمن وافق لكن المنتج غير نشط
- 🟢 **معتمد ونشط:** المنتج يظهر في الموقع

---

### للأدمن (Admin):

#### الموافقة على المنتجات:
1. اذهب إلى لوحة الأدمن → "المنتجات"
2. ستجد المنتجات التي تحتاج موافقة (approved_by_admin = false)
3. راجع المنتج (الصور، الوصف، السعر، إلخ)
4. إذا كان المنتج مناسب:
   - غير `approved_by_admin` إلى `true`
   - غير `status` إلى `1` (نشط)
5. احفظ التغييرات

#### استعلام SQL للمنتجات المعلقة:
```sql
SELECT 
    p.id,
    p.sku,
    p.vendor_id,
    p.status,
    p.approved_by_admin,
    p.created_at
FROM products p
WHERE p.approved_by_admin = 0
AND p.vendor_id IS NOT NULL
ORDER BY p.created_at DESC;
```

---

## شروط ظهور المنتج في الموقع

المنتج يظهر في الموقع فقط إذا:
1. ✅ `status = 1` (نشط)
2. ✅ `approved_by_admin = true` (معتمد من الأدمن)
3. ✅ `qty > 0` (له كمية في المخزن)
4. ✅ له صورة واحدة على الأقل (مفضل)
5. ✅ مرتبط بـ channel نشط

---

## إصلاح مشاكل الصور

### إذا الصور مش بتظهر:

#### 1. تحقق من الـ symbolic link:
```bash
php artisan storage:link
```

#### 2. تحقق من صلاحيات المجلدات:
```bash
# Windows
icacls storage /grant Users:F /T
icacls public/storage /grant Users:F /T

# Linux/Mac
chmod -R 775 storage
chmod -R 775 public/storage
```

#### 3. تحقق من مسار الصورة في قاعدة البيانات:
```sql
SELECT id, path FROM product_images WHERE product_id = [PRODUCT_ID];
```

المسار يجب أن يكون: `product/[PRODUCT_ID]/[IMAGE_NAME].jpg`

#### 4. تحقق من وجود الملف فعلياً:
```bash
# Windows
dir storage\app\public\product\[PRODUCT_ID]

# Linux/Mac
ls -la storage/app/public/product/[PRODUCT_ID]
```

---

## الملفات المعدلة

### 1. Migrations:
- ✅ `database/migrations/2026_02_01_002918_add_approved_by_admin_to_products_table.php`
- ✅ `database/migrations/2026_01_23_000002_fix_url_mappings.php` (إصلاح)
- ✅ `database/migrations/2026_01_24_000001_fix_product_display.php` (إصلاح)

### 2. Controllers:
- ✅ `packages/Mawgood/Vendor/src/Http/Controllers/ProductController.php`

### 3. Views:
- ✅ `packages/Mawgood/Vendor/src/Resources/views/products/form.blade.php`

---

## الاختبار

### اختبار نظام الموافقة:

#### 1. إضافة منتج من التاجر:
```bash
# تحقق من حالة المنتج
SELECT id, sku, status, approved_by_admin FROM products WHERE id = [PRODUCT_ID];
```
**النتيجة المتوقعة:**
- status = 0
- approved_by_admin = 0

#### 2. تحقق من عدم ظهور المنتج في الموقع:
- اذهب للموقع
- ابحث عن المنتج
- **النتيجة المتوقعة:** المنتج لا يظهر

#### 3. موافقة الأدمن:
```sql
UPDATE products 
SET approved_by_admin = 1, status = 1 
WHERE id = [PRODUCT_ID];
```

#### 4. تحقق من ظهور المنتج:
- اذهب للموقع
- ابحث عن المنتج
- **النتيجة المتوقعة:** المنتج يظهر الآن

---

### اختبار الصور:

#### 1. رفع صورة:
- أضف منتج جديد
- ارفع صورة
- احفظ المنتج

#### 2. تحقق من حفظ الصورة:
```sql
SELECT * FROM product_images WHERE product_id = [PRODUCT_ID];
```

#### 3. تحقق من وجود الملف:
```bash
# Windows
dir storage\app\public\product\[PRODUCT_ID]
```

#### 4. تحقق من عرض الصورة:
- افتح صفحة تعديل المنتج
- **النتيجة المتوقعة:** الصورة تظهر

---

## ملاحظات مهمة

### للتاجر:
- ⚠️ المنتجات الجديدة لن تظهر مباشرة في الموقع
- ⚠️ انتظر موافقة الأدمن على المنتج
- ⚠️ تأكد من رفع صور واضحة وذات جودة عالية
- ⚠️ املأ جميع البيانات المطلوبة بشكل صحيح

### للأدمن:
- ⚠️ راجع المنتجات بعناية قبل الموافقة
- ⚠️ تأكد من أن الصور مناسبة
- ⚠️ تأكد من أن السعر معقول
- ⚠️ تأكد من أن الوصف واضح ومفيد

---

## الدعم

إذا واجهت أي مشاكل:
1. تحقق من الـ logs في `storage/logs/laravel.log`
2. تحقق من صلاحيات المجلدات
3. تحقق من الـ symbolic link
4. راجع استعلامات SQL أعلاه

---

**تاريخ التحديث:** 2024
**الحالة:** ✅ تم التطبيق والاختبار
