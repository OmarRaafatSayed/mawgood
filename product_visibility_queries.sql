-- ============================================
-- استعلامات تشخيص وإصلاح ظهور المنتجات
-- Product Visibility Diagnostic & Fix Queries
-- ============================================

-- ============================================
-- 1. التشخيص - Diagnosis
-- ============================================

-- 1.1 التحقق من حالة منتج معين
-- Check specific product status
SELECT 
    p.id,
    p.sku,
    p.type,
    p.status as product_status,
    p.vendor_id,
    p.approved_by_admin,
    pf.name,
    pf.url_key,
    pf.visible_individually,
    pf.status as flat_status,
    pf.locale,
    pf.channel,
    (SELECT COUNT(*) FROM product_price_indices WHERE product_id = p.id) as has_price_index,
    (SELECT COUNT(*) FROM product_inventory_indices WHERE product_id = p.id) as has_inventory_index,
    (SELECT COUNT(*) FROM product_categories WHERE product_id = p.id) as categories_count,
    (SELECT COUNT(*) FROM product_channels WHERE product_id = p.id) as channels_count,
    (SELECT COUNT(*) FROM product_images WHERE product_id = p.id) as images_count,
    (SELECT SUM(qty) FROM product_inventories WHERE product_id = p.id) as total_qty
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.channel = 'default'
WHERE p.id = 123; -- غير الرقم إلى ID المنتج

-- 1.2 البحث عن المنتجات ACTIVE التي لا تظهر
-- Find ACTIVE products that are not visible
SELECT 
    p.id,
    p.sku,
    p.status,
    p.vendor_id,
    p.approved_by_admin,
    pf.name,
    pf.url_key,
    pf.visible_individually,
    CASE 
        WHEN p.status = 0 THEN '❌ status = 0'
        WHEN pf.visible_individually = 0 THEN '❌ visible_individually = 0'
        WHEN pf.url_key IS NULL THEN '❌ url_key is NULL'
        WHEN pf.name IS NULL THEN '❌ name is NULL'
        WHEN p.vendor_id IS NOT NULL AND p.approved_by_admin = 0 THEN '❌ not approved'
        ELSE '✅ OK'
    END as issue
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.channel = 'default'
WHERE p.status = 1
HAVING issue != '✅ OK';

-- 1.3 المنتجات بدون price index
-- Products without price index
SELECT 
    p.id,
    p.sku,
    p.status,
    pf.name
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar'
LEFT JOIN product_price_indices ppi ON p.id = ppi.product_id
WHERE p.status = 1
  AND ppi.id IS NULL;

-- 1.4 المنتجات بدون inventory index
-- Products without inventory index
SELECT 
    p.id,
    p.sku,
    p.status,
    pf.name,
    (SELECT SUM(qty) FROM product_inventories WHERE product_id = p.id) as inventory_qty
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar'
LEFT JOIN product_inventory_indices pii ON p.id = pii.product_id
WHERE p.status = 1
  AND pii.id IS NULL;

-- 1.5 المنتجات بدون فئات
-- Products without categories
SELECT 
    p.id,
    p.sku,
    p.status,
    pf.name
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar'
LEFT JOIN product_categories pc ON p.id = pc.product_id
WHERE p.status = 1
  AND pc.id IS NULL;

-- 1.6 المنتجات بدون قنوات
-- Products without channels
SELECT 
    p.id,
    p.sku,
    p.status,
    pf.name
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar'
LEFT JOIN product_channels pch ON p.id = pch.product_id
WHERE p.status = 1
  AND pch.id IS NULL;

-- 1.7 منتجات التجار بدون موافقة
-- Vendor products without approval
SELECT 
    p.id,
    p.sku,
    p.vendor_id,
    p.approved_by_admin,
    pf.name
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar'
WHERE p.vendor_id IS NOT NULL
  AND p.approved_by_admin = 0;

-- ============================================
-- 2. الإصلاح - Fix
-- ============================================

-- 2.1 إصلاح منتج معين
-- Fix specific product

-- تفعيل المنتج
UPDATE products 
SET status = 1, approved_by_admin = 1 
WHERE id = 123;

-- تحديث product_flat
UPDATE product_flat 
SET status = 1, visible_individually = 1 
WHERE product_id = 123;

-- 2.2 إصلاح جميع منتجات التجار (الموافقة عليها)
-- Approve all vendor products
UPDATE products 
SET approved_by_admin = 1 
WHERE vendor_id IS NOT NULL 
  AND approved_by_admin = 0
  AND status = 1;

-- 2.3 إنشاء price index لمنتج معين
-- Create price index for specific product
INSERT INTO product_price_indices 
(product_id, customer_group_id, channel_id, min_price, regular_min_price, max_price, regular_max_price)
SELECT 
    p.id,
    1 as customer_group_id,
    1 as channel_id,
    COALESCE(pav.decimal_value, 0) as min_price,
    COALESCE(pav.decimal_value, 0) as regular_min_price,
    COALESCE(pav.decimal_value, 0) as max_price,
    COALESCE(pav.decimal_value, 0) as regular_max_price
FROM products p
LEFT JOIN product_attribute_values pav ON p.id = pav.product_id AND pav.attribute_id = 11
WHERE p.id = 123
  AND NOT EXISTS (SELECT 1 FROM product_price_indices WHERE product_id = p.id);

-- 2.4 إنشاء inventory index لمنتج معين
-- Create inventory index for specific product
INSERT INTO product_inventory_indices 
(product_id, channel_id, qty)
SELECT 
    product_id,
    1 as channel_id,
    SUM(qty) as qty
FROM product_inventories
WHERE product_id = 123
GROUP BY product_id
HAVING NOT EXISTS (SELECT 1 FROM product_inventory_indices WHERE product_id = 123);

-- 2.5 ربط المنتج بالقناة الافتراضية
-- Link product to default channel
INSERT IGNORE INTO product_channels (product_id, channel_id)
SELECT id, 1 FROM products WHERE id = 123;

-- 2.6 تحديث product_flat من product_attribute_values
-- Update product_flat from product_attribute_values
UPDATE product_flat pf
INNER JOIN product_attribute_values pav_name ON pf.product_id = pav_name.product_id AND pav_name.attribute_id = 2
INNER JOIN product_attribute_values pav_url ON pf.product_id = pav_url.product_id AND pav_url.attribute_id = 3
INNER JOIN product_attribute_values pav_status ON pf.product_id = pav_status.product_id AND pav_status.attribute_id = 8
INNER JOIN product_attribute_values pav_visible ON pf.product_id = pav_visible.product_id AND pav_visible.attribute_id = 7
SET 
    pf.name = pav_name.text_value,
    pf.url_key = pav_url.text_value,
    pf.status = pav_status.integer_value,
    pf.visible_individually = pav_visible.boolean_value
WHERE pf.product_id = 123;

-- ============================================
-- 3. الإصلاح الشامل - Bulk Fix
-- ============================================

-- 3.1 إصلاح جميع المنتجات ACTIVE بدون price index
-- Fix all ACTIVE products without price index
INSERT INTO product_price_indices 
(product_id, customer_group_id, channel_id, min_price, regular_min_price, max_price, regular_max_price)
SELECT 
    p.id,
    1 as customer_group_id,
    1 as channel_id,
    COALESCE(pav.decimal_value, 0) as min_price,
    COALESCE(pav.decimal_value, 0) as regular_min_price,
    COALESCE(pav.decimal_value, 0) as max_price,
    COALESCE(pav.decimal_value, 0) as regular_max_price
FROM products p
LEFT JOIN product_attribute_values pav ON p.id = pav.product_id AND pav.attribute_id = 11
LEFT JOIN product_price_indices ppi ON p.id = ppi.product_id
WHERE p.status = 1
  AND ppi.id IS NULL;

-- 3.2 إصلاح جميع المنتجات ACTIVE بدون inventory index
-- Fix all ACTIVE products without inventory index
INSERT INTO product_inventory_indices 
(product_id, channel_id, qty)
SELECT 
    pi.product_id,
    1 as channel_id,
    SUM(pi.qty) as qty
FROM product_inventories pi
INNER JOIN products p ON pi.product_id = p.id
LEFT JOIN product_inventory_indices pii ON pi.product_id = pii.product_id
WHERE p.status = 1
  AND pii.id IS NULL
GROUP BY pi.product_id;

-- 3.3 ربط جميع المنتجات بالقناة الافتراضية
-- Link all products to default channel
INSERT IGNORE INTO product_channels (product_id, channel_id)
SELECT id, 1 FROM products WHERE status = 1;

-- 3.4 تحديث visible_individually لجميع المنتجات
-- Update visible_individually for all products
UPDATE product_flat 
SET visible_individually = 1 
WHERE status = 1 
  AND visible_individually = 0;

-- ============================================
-- 4. التحقق بعد الإصلاح - Verification
-- ============================================

-- 4.1 عدد المنتجات الجاهزة للعرض
-- Count of products ready for display
SELECT COUNT(*) as ready_products
FROM products p
INNER JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.channel = 'default'
WHERE p.status = 1
  AND pf.visible_individually = 1
  AND pf.url_key IS NOT NULL
  AND pf.name IS NOT NULL
  AND (p.vendor_id IS NULL OR p.approved_by_admin = 1);

-- 4.2 عدد المنتجات حسب المشكلة
-- Count of products by issue
SELECT 
    CASE 
        WHEN p.status = 0 THEN 'status = 0'
        WHEN pf.visible_individually = 0 THEN 'visible_individually = 0'
        WHEN pf.url_key IS NULL THEN 'url_key is NULL'
        WHEN pf.name IS NULL THEN 'name is NULL'
        WHEN p.vendor_id IS NOT NULL AND p.approved_by_admin = 0 THEN 'not approved'
        ELSE 'OK'
    END as issue,
    COUNT(*) as count
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.channel = 'default'
GROUP BY issue;

-- 4.3 إحصائيات شاملة
-- Comprehensive statistics
SELECT 
    COUNT(*) as total_products,
    SUM(CASE WHEN p.status = 1 THEN 1 ELSE 0 END) as active_products,
    SUM(CASE WHEN p.status = 1 AND pf.visible_individually = 1 THEN 1 ELSE 0 END) as visible_products,
    SUM(CASE WHEN p.status = 1 AND pf.visible_individually = 1 AND pf.url_key IS NOT NULL THEN 1 ELSE 0 END) as with_url,
    SUM(CASE WHEN p.status = 1 AND pf.visible_individually = 1 AND pf.url_key IS NOT NULL AND pf.name IS NOT NULL THEN 1 ELSE 0 END) as with_name,
    SUM(CASE WHEN p.status = 1 AND pf.visible_individually = 1 AND pf.url_key IS NOT NULL AND pf.name IS NOT NULL AND (p.vendor_id IS NULL OR p.approved_by_admin = 1) THEN 1 ELSE 0 END) as ready_for_shop
FROM products p
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.channel = 'default';

-- ============================================
-- 5. استعلامات متقدمة - Advanced Queries
-- ============================================

-- 5.1 المنتجات الجاهزة للعرض (Query النهائي)
-- Products ready for display (Final Query)
SELECT 
    p.id,
    p.sku,
    pf.name,
    pf.url_key,
    pf.price,
    pii.qty,
    (SELECT path FROM product_images WHERE product_id = p.id ORDER BY position LIMIT 1) as image
FROM products p
INNER JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.channel = 'default'
LEFT JOIN product_inventory_indices pii ON p.id = pii.product_id AND pii.channel_id = 1
WHERE p.status = 1
  AND pf.visible_individually = 1
  AND pf.url_key IS NOT NULL
  AND pf.name IS NOT NULL
  AND (p.vendor_id IS NULL OR p.approved_by_admin = 1)
ORDER BY p.created_at DESC
LIMIT 20;

-- 5.2 المنتجات حسب الفئة
-- Products by category
SELECT 
    c.id as category_id,
    ct.name as category_name,
    COUNT(DISTINCT p.id) as products_count
FROM categories c
INNER JOIN category_translations ct ON c.id = ct.category_id AND ct.locale = 'ar'
LEFT JOIN product_categories pc ON c.id = pc.category_id
LEFT JOIN products p ON pc.product_id = p.id AND p.status = 1
LEFT JOIN product_flat pf ON p.id = pf.product_id AND pf.locale = 'ar' AND pf.visible_individually = 1
WHERE (p.vendor_id IS NULL OR p.approved_by_admin = 1)
GROUP BY c.id, ct.name
ORDER BY products_count DESC;

-- 5.3 منتجات التجار حسب الحالة
-- Vendor products by status
SELECT 
    v.id as vendor_id,
    v.name as vendor_name,
    COUNT(*) as total_products,
    SUM(CASE WHEN p.approved_by_admin = 1 THEN 1 ELSE 0 END) as approved_products,
    SUM(CASE WHEN p.approved_by_admin = 0 THEN 1 ELSE 0 END) as pending_products
FROM vendors v
LEFT JOIN products p ON v.id = p.vendor_id
GROUP BY v.id, v.name
ORDER BY total_products DESC;

-- ============================================
-- 6. صيانة - Maintenance
-- ============================================

-- 6.1 حذف price indices القديمة
-- Delete old price indices
DELETE FROM product_price_indices 
WHERE product_id NOT IN (SELECT id FROM products);

-- 6.2 حذف inventory indices القديمة
-- Delete old inventory indices
DELETE FROM product_inventory_indices 
WHERE product_id NOT IN (SELECT id FROM products);

-- 6.3 حذف product_flat للمنتجات المحذوفة
-- Delete product_flat for deleted products
DELETE FROM product_flat 
WHERE product_id NOT IN (SELECT id FROM products);

-- 6.4 إعادة بناء product_flat (استخدم بحذر!)
-- Rebuild product_flat (use with caution!)
-- php artisan indexer:index products

-- ============================================
-- ملاحظات مهمة - Important Notes
-- ============================================

-- 1. قبل تنفيذ أي استعلام UPDATE أو DELETE، قم بعمل نسخة احتياطية
-- 2. استبدل 123 بـ ID المنتج الفعلي
-- 3. استبدل 'ar' باللغة المطلوبة
-- 4. استبدل 'default' بكود القناة المطلوبة
-- 5. استبدل 1 بـ ID القناة أو مجموعة العملاء المطلوبة
-- 6. بعد أي تعديل، قم بتشغيل: php artisan cache:clear

-- ============================================
-- تم! ✅
-- ============================================
