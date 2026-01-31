# إصلاح مشكلة الكمية في المخزن للتاجر

## المشكلة
كانت المنتجات في لوحة التاجر لا تظهر في الموقع ويتم اعتبارها "out of stock" بسبب عدم حفظ الكمية في المخزن بشكل صحيح.

## السبب
كان الكود في `ProductController` يحاول حفظ الـ inventory يدوياً بعد إنشاء المنتج، لكن الطريقة الصحيحة هي استخدام `update` method الذي يستدعي `saveInventories` من `AbstractType`.

## الحل

### 1. تعديل ProductController.php
تم تعديل method `store` و `update` في:
`packages/Mawgood/Vendor/src/Http/Controllers/ProductController.php`

**التغييرات:**
- في `store` method: إضافة استدعاء `update` بعد `create` لحفظ الـ inventory بشكل صحيح
- إزالة الكود المكرر لحفظ الـ inventory يدوياً
- الاعتماد على الـ Type Instance لحفظ البيانات

### 2. تعديل ProductInventoryRepository.php
تم تعديل method `saveInventories` في:
`packages/Webkul/Product/src/Repositories/ProductInventoryRepository.php`

**التغييرات:**
- تغيير طريقة حفظ `vendor_id` لتأخذها من المنتج نفسه بدلاً من البيانات المرسلة
- نقل `vendor_id` من شرط `updateOrCreate` إلى البيانات المحفوظة

## كيفية الاستخدام

### إضافة منتج جديد
1. اذهب إلى لوحة التاجر
2. اضغط على "إضافة منتج جديد"
3. املأ البيانات المطلوبة:
   - اسم المنتج (مطلوب)
   - SKU (مطلوب)
   - السعر (مطلوب)
   - **الكمية في المخزن (مطلوب)** - هذا هو الحقل المهم
   - الحالة (نشط/غير نشط)
4. اضغط "حفظ المنتج"

### تعديل منتج موجود
1. اذهب إلى قائمة المنتجات
2. اضغط على "تعديل" للمنتج المطلوب
3. عدل الكمية في حقل "الكمية في المخزن"
4. اضغط "حفظ المنتج"

## التحقق من الحل

### 1. التحقق من حفظ الكمية
```sql
SELECT p.id, p.name, p.sku, pi.qty, pi.vendor_id, pi.inventory_source_id
FROM products p
LEFT JOIN product_inventories pi ON p.id = pi.product_id
WHERE p.vendor_id = [VENDOR_ID];
```

### 2. التحقق من ظهور المنتج في الموقع
- المنتج يجب أن يكون:
  - `status = 1` (نشط)
  - `qty > 0` في جدول `product_inventories`
  - له صورة واحدة على الأقل (اختياري لكن مفضل)

## الملفات المعدلة
1. `packages/Mawgood/Vendor/src/Http/Controllers/ProductController.php`
2. `packages/Webkul/Product/src/Repositories/ProductInventoryRepository.php`

## ملاحظات مهمة
- الـ inventory source ID الافتراضي هو `1`
- يتم حفظ الكمية في جدول `product_inventories` مع `vendor_id` و `inventory_source_id`
- المنتج يظهر في الموقع فقط إذا كان:
  - نشط (`status = 1`)
  - له كمية متاحة (`qty > 0`)
  - مرتبط بـ channel نشط

## اختبار الحل
1. أضف منتج جديد مع كمية 10
2. تحقق من قاعدة البيانات أن الكمية محفوظة
3. تحقق من ظهور المنتج في الموقع
4. حاول تعديل الكمية إلى 0 وتحقق من اختفاء المنتج
5. أعد الكمية إلى رقم أكبر من 0 وتحقق من ظهور المنتج مرة أخرى
