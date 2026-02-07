-- Update or Insert EGP Currency
INSERT INTO currencies (id, code, name, symbol, decimal) 
VALUES (1, 'EGP', 'Egyptian Pound', 'ج.م', 2)
ON DUPLICATE KEY UPDATE 
    code = 'EGP',
    name = 'Egyptian Pound',
    symbol = 'ج.م',
    decimal = 2;

-- Update or Insert Arabic Locale
INSERT INTO locales (id, code, name, direction) 
VALUES (1, 'ar', 'Arabic', 'rtl')
ON DUPLICATE KEY UPDATE 
    code = 'ar',
    name = 'Arabic',
    direction = 'rtl';

-- Update default channel to use EGP and Arabic
UPDATE channels 
SET base_currency_id = 1,
    default_locale_id = 1,
    root_category_id = COALESCE(root_category_id, 1)
WHERE code = 'default';

-- Link EGP to default channel
INSERT INTO channel_currencies (channel_id, currency_id)
SELECT id, 1 FROM channels WHERE code = 'default'
ON DUPLICATE KEY UPDATE currency_id = 1;

-- Link Arabic locale to default channel
INSERT INTO channel_locales (channel_id, locale_id)
SELECT id, 1 FROM channels WHERE code = 'default'
ON DUPLICATE KEY UPDATE locale_id = 1;
