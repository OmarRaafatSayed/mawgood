-- ============================================
-- SQL Queries للاختبار والتحقق من نظام الموافقة
-- ============================================

-- ============================================
-- 1. عرض المنتجات بانتظار الموافقة
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.type,
    p.vendor_id,
    p.approved_by_admin,
    p.status,
    p.created_at,
    v.store_name as vendor_name
FROM products p
LEFT JOIN vendors v ON p.vendor_id = v.id
WHERE p.approved_by_admin = 0
ORDER BY p.created_at DESC;


-- ============================================
-- 2. عرض المنتجات المعتمدة
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.type,
    p.vendor_id,
    p.approved_by_admin,
    p.status,
    p.created_at,
    v.store_name as vendor_name
FROM products p
LEFT JOIN vendors v ON p.vendor_id = v.id
WHERE p.approved_by_admin = 1
ORDER BY p.created_at DESC;


-- ============================================
-- 3. التحقق من الحقول المطلوبة لمنتج معين
-- ============================================
SELECT 
    p.id as product_id,
    p.sku,
    a.code as attribute_code,
    pav.boolean_value,
    pav.text_value,
    pav.integer_value,
    pav.channel,
    pav.locale
FROM products p
JOIN product_attribute_values pav ON p.id = pav.product_id
JOIN attributes a ON pav.attribute_id = a.id
WHERE p.id = 1 -- غير الرقم إلى ID المنتج
AND a.code IN ('status', 'visible_individually', 'weight', 'description', 'guest_checkout')
ORDER BY a.code, pav.channel, pav.locale;


-- ============================================
-- 4. عرض المنتجات الناقصة للحقول المطلوبة
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.approved_by_admin,
    COUNT(DISTINCT CASE WHEN a.code = 'status' THEN pav.id END) as has_status,
    COUNT(DISTINCT CASE WHEN a.code = 'visible_individually' THEN pav.id END) as has_visible,
    COUNT(DISTINCT CASE WHEN a.code = 'weight' THEN pav.id END) as has_weight,
    COUNT(DISTINCT CASE WHEN a.code = 'description' THEN pav.id END) as has_description,
    COUNT(DISTINCT CASE WHEN a.code = 'guest_checkout' THEN pav.id END) as has_guest_checkout
FROM products p
LEFT JOIN product_attribute_values pav ON p.id = pav.product_id
LEFT JOIN attributes a ON pav.attribute_id = a.id 
    AND a.code IN ('status', 'visible_individually', 'weight', 'description', 'guest_checkout')
WHERE p.vendor_id IS NOT NULL
GROUP BY p.id, p.sku, p.approved_by_admin
HAVING 
    has_status = 0 OR 
    has_visible = 0 OR 
    has_weight = 0 OR 
    has_description = 0 OR 
    has_guest_checkout = 0;


-- ============================================
-- 5. إحصائيات المنتجات حسب حالة الموافقة
-- ============================================
SELECT 
    CASE 
        WHEN approved_by_admin = 1 THEN 'معتمد'
        WHEN approved_by_admin = 0 THEN 'بانتظار الموافقة'
        ELSE 'غير محدد'
    END as approval_status,
    COUNT(*) as total_products,
    COUNT(CASE WHEN status = 1 THEN 1 END) as active_products,
    COUNT(CASE WHEN status = 0 THEN 1 END) as inactive_products
FROM products
WHERE vendor_id IS NOT NULL
GROUP BY approved_by_admin;


-- ============================================
-- 6. عرض آخر 10 منتجات تمت الموافقة عليها
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.approved_by_admin,
    p.status,
    p.updated_at,
    v.store_name as vendor_name
FROM products p
LEFT JOIN vendors v ON p.vendor_id = v.id
WHERE p.approved_by_admin = 1
ORDER BY p.updated_at DESC
LIMIT 10;


-- ============================================
-- 7. التحقق من منتج معين بالتفصيل
-- ============================================
-- استبدل PRODUCT_ID برقم المنتج
SET @product_id = 1;

SELECT 
    'Product Info' as section,
    CONCAT('ID: ', p.id) as info
FROM products p WHERE p.id = @product_id
UNION ALL
SELECT 'Product Info', CONCAT('SKU: ', p.sku) FROM products p WHERE p.id = @product_id
UNION ALL
SELECT 'Product Info', CONCAT('Approved: ', p.approved_by_admin) FROM products p WHERE p.id = @product_id
UNION ALL
SELECT 'Product Info', CONCAT('Status: ', p.status) FROM products p WHERE p.id = @product_id
UNION ALL
SELECT 'Attributes', CONCAT(a.code, ' = ', COALESCE(pav.text_value, CAST(pav.boolean_value AS CHAR), 'NULL'))
FROM product_attribute_values pav
JOIN attributes a ON pav.attribute_id = a.id
WHERE pav.product_id = @product_id
AND a.code IN ('status', 'visible_individually', 'weight', 'description', 'guest_checkout');


-- ============================================
-- 8. عرض المنتجات حسب التاجر
-- ============================================
SELECT 
    v.id as vendor_id,
    v.store_name,
    COUNT(*) as total_products,
    COUNT(CASE WHEN p.approved_by_admin = 1 THEN 1 END) as approved_products,
    COUNT(CASE WHEN p.approved_by_admin = 0 THEN 1 END) as pending_products
FROM vendors v
LEFT JOIN products p ON v.id = p.vendor_id
GROUP BY v.id, v.store_name
ORDER BY total_products DESC;


-- ============================================
-- 9. البحث عن منتج بالـ SKU
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.type,
    p.approved_by_admin,
    p.status,
    v.store_name as vendor_name,
    GROUP_CONCAT(DISTINCT CONCAT(a.code, '=', COALESCE(pav.text_value, CAST(pav.boolean_value AS CHAR))) SEPARATOR ', ') as attributes
FROM products p
LEFT JOIN vendors v ON p.vendor_id = v.id
LEFT JOIN product_attribute_values pav ON p.id = pav.product_id
LEFT JOIN attributes a ON pav.attribute_id = a.id
WHERE p.sku LIKE '%YOUR_SKU%' -- استبدل YOUR_SKU
GROUP BY p.id, p.sku, p.type, p.approved_by_admin, p.status, v.store_name;


-- ============================================
-- 10. عرض المنتجات المرئية في الموقع
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.approved_by_admin,
    p.status,
    pav.boolean_value as visible_individually
FROM products p
JOIN product_attribute_values pav ON p.id = pav.product_id
JOIN attributes a ON pav.attribute_id = a.id
WHERE a.code = 'visible_individually'
AND pav.boolean_value = 1
AND p.vendor_id IS NOT NULL
ORDER BY p.id DESC;


-- ============================================
-- 11. تحديث يدوي لمنتج (للاختبار فقط)
-- ============================================
-- تحذير: استخدم هذا فقط للاختبار
-- في الإنتاج، استخدم ProductApprovalService

-- الموافقة على منتج يدويًا
UPDATE products 
SET approved_by_admin = 1, status = 1 
WHERE id = 1; -- غير الرقم

-- رفض منتج يدويًا
UPDATE products 
SET approved_by_admin = 0, status = 0 
WHERE id = 1; -- غير الرقم


-- ============================================
-- 12. حذف بيانات اختبار
-- ============================================
-- تحذير: هذا سيحذف البيانات نهائيًا

-- حذف منتج معين
DELETE FROM products WHERE id = 1; -- غير الرقم

-- حذف جميع منتجات تاجر معين
DELETE FROM products WHERE vendor_id = 1; -- غير الرقم


-- ============================================
-- 13. إعادة تعيين حالة الموافقة لجميع المنتجات
-- ============================================
-- للاختبار فقط
UPDATE products 
SET approved_by_admin = 0, status = 0 
WHERE vendor_id IS NOT NULL;


-- ============================================
-- 14. عرض المنتجات مع عدد الصور
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.approved_by_admin,
    COUNT(DISTINCT pi.id) as image_count
FROM products p
LEFT JOIN product_images pi ON p.id = pi.product_id
WHERE p.vendor_id IS NOT NULL
GROUP BY p.id, p.sku, p.approved_by_admin
ORDER BY p.id DESC;


-- ============================================
-- 15. عرض المنتجات مع المخزون
-- ============================================
SELECT 
    p.id,
    p.sku,
    p.approved_by_admin,
    p.status,
    COALESCE(SUM(pi.qty), 0) as total_qty
FROM products p
LEFT JOIN product_inventories pi ON p.id = pi.product_id
WHERE p.vendor_id IS NOT NULL
GROUP BY p.id, p.sku, p.approved_by_admin, p.status
ORDER BY p.id DESC;


-- ============================================
-- 16. التحقق من Attributes المتاحة
-- ============================================
SELECT 
    id,
    code,
    type,
    is_required,
    is_unique,
    value_per_channel,
    value_per_locale
FROM attributes
WHERE code IN ('status', 'visible_individually', 'weight', 'description', 'guest_checkout', 'name', 'price')
ORDER BY code;


-- ============================================
-- 17. عرض Channels و Locales
-- ============================================
SELECT 'Channels' as type, code, name FROM channels
UNION ALL
SELECT 'Locales' as type, code, name FROM locales;


-- ============================================
-- 18. نسخ احتياطي لمنتج قبل التعديل
-- ============================================
CREATE TABLE IF NOT EXISTS products_backup AS 
SELECT * FROM products WHERE id = 1; -- غير الرقم


-- ============================================
-- 19. استعادة منتج من النسخة الاحتياطية
-- ============================================
-- INSERT INTO products SELECT * FROM products_backup WHERE id = 1;


-- ============================================
-- 20. تنظيف البيانات القديمة
-- ============================================
-- حذف المنتجات غير المعتمدة الأقدم من 30 يوم
DELETE FROM products 
WHERE approved_by_admin = 0 
AND vendor_id IS NOT NULL
AND created_at < DATE_SUB(NOW(), INTERVAL 30 DAY);
