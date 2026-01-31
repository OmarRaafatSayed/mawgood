-- إضافة Theme Customization للصفحة الرئيسية

-- 1. Image Carousel (البانر)
INSERT INTO theme_customizations (channel_id, type, name, sort_order, status, created_at, updated_at) 
VALUES (1, 'image_carousel', 'Image Carousel', 1, 1, NOW(), NOW());

-- احصل على ID اللي اتعمل
SET @carousel_id = LAST_INSERT_ID();

-- أضف الصور للكاروسيل
INSERT INTO theme_customization_translations (theme_customization_id, locale, options) 
VALUES (@carousel_id, 'ar', '{"images":[{"link":"","image":"themes/mawgood/assets/images/carousel/1.png"},{"link":"","image":"themes/mawgood/assets/images/carousel/2.png"},{"link":"","image":"themes/mawgood/assets/images/carousel/3.png"}]}');

-- 2. Static Content (محتوى ثابت)
INSERT INTO theme_customizations (channel_id, type, name, sort_order, status, created_at, updated_at) 
VALUES (1, 'static_content', 'Static Content', 2, 1, NOW(), NOW());

SET @static_id = LAST_INSERT_ID();

INSERT INTO theme_customization_translations (theme_customization_id, locale, options) 
VALUES (@static_id, 'ar', '{"html":"<div class=\"container mx-auto px-4 py-8\"><h2 class=\"text-3xl font-bold text-center mb-4\">مرحباً بك في متجرنا</h2><p class=\"text-center text-gray-600\">نقدم لك أفضل المنتجات بأفضل الأسعار</p></div>","css":""}');

-- 3. Product Carousel (عرض المنتجات)
INSERT INTO theme_customizations (channel_id, type, name, sort_order, status, created_at, updated_at) 
VALUES (1, 'product_carousel', 'Featured Products', 3, 1, NOW(), NOW());

SET @product_id = LAST_INSERT_ID();

INSERT INTO theme_customization_translations (theme_customization_id, locale, options) 
VALUES (@product_id, 'ar', '{"title":"المنتجات المميزة","filters":{"sort":"created_at","limit":"12","order":"desc"}}');
