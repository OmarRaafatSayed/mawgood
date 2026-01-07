-- تحديث إعدادات اللوجو في قاعدة البيانات
-- استبدال اللوجو القديم باللوجو الجديد

-- تحديث لوجو الإدارة
INSERT INTO core_config (code, value, channel_code, locale_code, created_at, updated_at) 
VALUES ('general.design.admin_logo.logo_image', 'configuration/logo.png', 'default', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE 
value = 'configuration/logo.png', 
updated_at = NOW();

-- تحديث لوجو المتجر
INSERT INTO core_config (code, value, channel_code, locale_code, created_at, updated_at) 
VALUES ('general.design.shop_logo.logo_image', 'configuration/logo.png', 'default', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE 
value = 'configuration/logo.png', 
updated_at = NOW();

-- تحديث favicon إذا كان موجود
INSERT INTO core_config (code, value, channel_code, locale_code, created_at, updated_at) 
VALUES ('general.design.admin_logo.favicon', 'configuration/logo.png', 'default', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE 
value = 'configuration/logo.png', 
updated_at = NOW();