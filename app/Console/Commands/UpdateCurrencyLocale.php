<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class UpdateCurrencyLocale extends Command
{
    protected $signature = 'app:update-currency-locale';
    protected $description = 'Update default currency to EGP and locale to Arabic';

    public function handle()
    {
        DB::transaction(function () {
            // Insert or update EGP currency
            $egpExists = DB::table('currencies')->where('code', 'EGP')->exists();
            if ($egpExists) {
                DB::table('currencies')->where('code', 'EGP')->update([
                    'name' => 'Egyptian Pound',
                    'symbol' => 'ج.م',
                ]);
            } else {
                DB::table('currencies')->insert([
                    'code' => 'EGP',
                    'name' => 'Egyptian Pound',
                    'symbol' => 'ج.م',
                ]);
            }

            // Insert or update Arabic locale
            $arExists = DB::table('locales')->where('code', 'ar')->exists();
            if ($arExists) {
                DB::table('locales')->where('code', 'ar')->update([
                    'name' => 'Arabic',
                    'direction' => 'rtl',
                ]);
            } else {
                DB::table('locales')->insert([
                    'code' => 'ar',
                    'name' => 'Arabic',
                    'direction' => 'rtl',
                ]);
            }

            // Get IDs
            $egpId = DB::table('currencies')->where('code', 'EGP')->value('id');
            $arId = DB::table('locales')->where('code', 'ar')->value('id');
            $channelId = DB::table('channels')->where('code', 'default')->value('id');

            // Update default channel
            DB::table('channels')->where('code', 'default')->update([
                'base_currency_id' => $egpId,
                'default_locale_id' => $arId,
            ]);

            // Link currency to channel
            if (!DB::table('channel_currencies')->where('channel_id', $channelId)->where('currency_id', $egpId)->exists()) {
                DB::table('channel_currencies')->insert([
                    'channel_id' => $channelId,
                    'currency_id' => $egpId,
                ]);
            }

            // Link locale to channel
            if (!DB::table('channel_locales')->where('channel_id', $channelId)->where('locale_id', $arId)->exists()) {
                DB::table('channel_locales')->insert([
                    'channel_id' => $channelId,
                    'locale_id' => $arId,
                ]);
            }
        });

        $this->info('Currency updated to EGP and locale updated to Arabic');
        
        // Clear caches
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        
        $this->info('Cache cleared successfully');
        
        return 0;
    }
}
