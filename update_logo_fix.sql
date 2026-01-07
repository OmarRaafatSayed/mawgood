-- تحديث إعدادات اللوجو بالمسار الصحيح
UPDATE core_config SET value = 'logo.png', updated_at = NOW() WHERE code = 'general.design.admin_logo.logo_image';
UPDATE core_config SET value = 'logo.png', updated_at = NOW() WHERE code = 'general.design.shop_logo.logo_image';
UPDATE core_config SET value = 'logo.png', updated_at = NOW() WHERE code = 'general.design.admin_logo.favicon';