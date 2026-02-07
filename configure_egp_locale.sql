-- Configure EGP as base currency and Arabic as default locale

-- 1. Ensure EGP currency exists
INSERT INTO currencies (code, name, symbol, decimal) 
VALUES ('EGP', 'Egyptian Pound', 'ج.م', 2)
ON DUPLICATE KEY UPDATE name = 'Egyptian Pound', symbol = 'ج.م', decimal = 2;

-- 2. Get currency and locale IDs
SET @egp_id = (SELECT id FROM currencies WHERE code = 'EGP' LIMIT 1);
SET @ar_locale_id = (SELECT id FROM locales WHERE code = 'ar' LIMIT 1);
SET @default_channel_id = (SELECT id FROM channels WHERE code = 'default' LIMIT 1);

-- 3. Update default channel to use EGP and Arabic
UPDATE channels 
SET base_currency_id = @egp_id,
    default_locale_id = @ar_locale_id
WHERE code = 'default';

-- 4. Link EGP to default channel
INSERT INTO channel_currencies (channel_id, currency_id)
VALUES (@default_channel_id, @egp_id)
ON DUPLICATE KEY UPDATE channel_id = @default_channel_id;

-- 5. Link Arabic locale to default channel
INSERT INTO channel_locales (channel_id, locale_id)
VALUES (@default_channel_id, @ar_locale_id)
ON DUPLICATE KEY UPDATE channel_id = @default_channel_id;

-- 6. Set EGP exchange rate to 1.0
UPDATE currency_exchange_rates 
SET rate = 1.0000 
WHERE target_currency = @egp_id;

-- Verify configuration
SELECT 
    c.code as channel_code,
    curr.code as base_currency,
    l.code as default_locale
FROM channels c
LEFT JOIN currencies curr ON c.base_currency_id = curr.id
LEFT JOIN locales l ON c.default_locale_id = l.id
WHERE c.code = 'default';
