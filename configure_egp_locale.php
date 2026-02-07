<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    // 1. Ensure EGP currency exists
    DB::statement("
        INSERT INTO currencies (code, name, symbol, decimal) 
        VALUES ('EGP', 'Egyptian Pound', 'ج.م', 2)
        ON DUPLICATE KEY UPDATE name = 'Egyptian Pound', symbol = 'ج.م', decimal = 2
    ");

    // 2. Get IDs
    $egpId = DB::table('currencies')->where('code', 'EGP')->value('id');
    $arLocaleId = DB::table('locales')->where('code', 'ar')->value('id');
    $channelId = DB::table('channels')->where('code', 'default')->value('id');

    // 3. Update default channel
    DB::table('channels')
        ->where('code', 'default')
        ->update([
            'base_currency_id' => $egpId,
            'default_locale_id' => $arLocaleId
        ]);

    // 4. Link EGP to channel
    DB::statement("
        INSERT INTO channel_currencies (channel_id, currency_id)
        VALUES (?, ?)
        ON DUPLICATE KEY UPDATE channel_id = ?
    ", [$channelId, $egpId, $channelId]);

    // 5. Link Arabic locale to channel
    DB::statement("
        INSERT INTO channel_locales (channel_id, locale_id)
        VALUES (?, ?)
        ON DUPLICATE KEY UPDATE channel_id = ?
    ", [$channelId, $arLocaleId, $channelId]);

    // 6. Set EGP exchange rate
    DB::table('currency_exchange_rates')
        ->where('target_currency', $egpId)
        ->update(['rate' => 1.0000]);

    echo "✓ EGP currency configured\n";
    echo "✓ Arabic locale set as default\n";
    echo "✓ Channel configuration updated\n";

    // Verify
    $result = DB::table('channels as c')
        ->leftJoin('currencies as curr', 'c.base_currency_id', '=', 'curr.id')
        ->leftJoin('locales as l', 'c.default_locale_id', '=', 'l.id')
        ->where('c.code', 'default')
        ->select('c.code as channel', 'curr.code as currency', 'l.code as locale')
        ->first();

    echo "\nConfiguration:\n";
    echo "Channel: {$result->channel}\n";
    echo "Currency: {$result->currency}\n";
    echo "Locale: {$result->locale}\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
