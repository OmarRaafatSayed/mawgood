# 🎯 دليل الأدمن - الموافقة على المنتجات

## ⚡ الحل السريع

عندما يضيف التاجر منتج جديد، المنتج **لن يظهر** في الموقع حتى توافق عليه.

### الموافقة على جميع المنتجات المعلقة:
```bash
php artisan vendor:approve-products
```

### الموافقة على منتج محدد:
```bash
php artisan vendor:approve-products --product_id=11
```

---

## 📋 عرض المنتجات المعلقة

### عبر SQL:
```sql
SELECT 
    p.id,
    p.sku,
    pav.text_value as name,
    pi.qty,
    p.created_at
FROM products p
LEFT JOIN product_attribute_values pav ON p.id = pav.product_id
LEFT JOIN attributes a ON pav.attribute_id = a.id AND a.code = 'name'
LEFT JOIN product_inventories pi ON p.id = pi.product_id
WHERE p.vendor_id IS NOT NULL 
AND p.approved_by_admin = 0
ORDER BY p.created_at DESC;
```

### عبر Tinker:
```bash
php artisan tinker
```
```php
$products = \Webkul\Product\Models\Product::where('vendor_id', '!=', null)
    ->where('approved_by_admin', false)
    ->get(['id', 'sku']);
    
foreach($products as $p) {
    echo "ID: {$p->id} - SKU: {$p->sku}\n";
}
```

---

## ✅ الموافقة على المنتجات

### الطريقة 1: Command (الأسهل)
```bash
# الموافقة على الكل
php artisan vendor:approve-products

# منتج محدد
php artisan vendor:approve-products --product_id=11
```

### الطريقة 2: SQL
```sql
-- منتج محدد
UPDATE products 
SET approved_by_admin = 1, status = 1 
WHERE id = 11;

-- جميع المنتجات المعلقة
UPDATE products 
SET approved_by_admin = 1, status = 1 
WHERE vendor_id IS NOT NULL 
AND approved_by_admin = 0;
```

### الطريقة 3: Tinker
```bash
php artisan tinker
```
```php
$product = \Webkul\Product\Models\Product::find(11);
$product->approved_by_admin = true;
$product->status = 1;
$product->save();
echo "تمت الموافقة!\n";
```

---

## ❌ رفض منتج

### عبر SQL:
```sql
UPDATE products 
SET approved_by_admin = 0, status = 0 
WHERE id = 11;
```

### عبر Tinker:
```php
$product = \Webkul\Product\Models\Product::find(11);
$product->approved_by_admin = false;
$product->status = 0;
$product->save();
```

---

## 🔍 التحقق من منتج

```bash
php artisan tinker --execute="
\$p = \Webkul\Product\Models\Product::find(11);
echo 'Status: ' . \$p->status . PHP_EOL;
echo 'Approved: ' . \$p->approved_by_admin . PHP_EOL;
echo 'Qty: ' . \$p->inventories->first()->qty . PHP_EOL;
echo 'Images: ' . \$p->images->count() . PHP_EOL;
"
```

**يجب أن يكون:**
- ✅ Status = 1
- ✅ Approved = 1
- ✅ Qty > 0
- ✅ Images > 0

---

## 🎯 الخلاصة

### عند إضافة منتج جديد:
1. التاجر يضيف المنتج
2. المنتج يُحفظ بـ `approved_by_admin = 0`
3. المنتج **لا يظهر** في الموقع

### للموافقة:
```bash
php artisan vendor:approve-products
```

### النتيجة:
- ✅ `approved_by_admin = 1`
- ✅ `status = 1`
- ✅ المنتج **يظهر** في الموقع

---

## 📞 ملاحظات

- الأمر `vendor:approve-products` يقوم بـ:
  - ✅ الموافقة على المنتج
  - ✅ تحديث product_flat
  - ✅ إنشاء price indices
  - ✅ إنشاء inventory indices

- يمكنك تشغيل الأمر بشكل دوري (كل ساعة مثلاً) عبر Cron Job

---

**استخدم هذا الأمر بعد كل منتج جديد:**
```bash
php artisan vendor:approve-products
```
