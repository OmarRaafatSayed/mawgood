<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class AddEnglishUsd extends Command
{
    protected $signature = 'app:add-en-usd';
    protected $description = 'Add English and USD while keeping Arabic and EGP as defaults';

    public function handle()
    {
        DB::transaction(function () {
            // Add USD currency
            if (!DB::table('currencies')->where('code', 'USD')->exists()) {
                DB::table('currencies')->insert([
                    'code' => 'USD',
                    'name' => 'US Dollar',
                    'symbol' => '$',
                ]);
            }

            // Add English locale
            if (!DB::table('locales')->where('code', 'en')->exists()) {
                DB::table('locales')->insert([
                    'code' => 'en',
                    'name' => 'English',
                    'direction' => 'ltr',
                ]);
            }

            $channelId = DB::table('channels')->where('code', 'default')->value('id');
            $usdId = DB::table('currencies')->where('code', 'USD')->value('id');
            $enId = DB::table('locales')->where('code', 'en')->value('id');

            // Link USD to channel
            if (!DB::table('channel_currencies')->where('channel_id', $channelId)->where('currency_id', $usdId)->exists()) {
                DB::table('channel_currencies')->insert(['channel_id' => $channelId, 'currency_id' => $usdId]);
            }

            // Link English to channel
            if (!DB::table('channel_locales')->where('channel_id', $channelId)->where('locale_id', $enId)->exists()) {
                DB::table('channel_locales')->insert(['channel_id' => $channelId, 'locale_id' => $enId]);
            }
        });

        $this->info('English and USD added successfully');
        
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        
        return 0;
    }
}
