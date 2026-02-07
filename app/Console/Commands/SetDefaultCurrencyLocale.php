<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class SetDefaultCurrencyLocale extends Command
{
    protected $signature = 'app:set-default';
    protected $description = 'Set EGP and Arabic as the only defaults';

    public function handle()
    {
        DB::transaction(function () {
            $egpId = DB::table('currencies')->where('code', 'EGP')->value('id');
            $arId = DB::table('locales')->where('code', 'ar')->value('id');
            $channelId = DB::table('channels')->where('code', 'default')->value('id');

            // Remove all other currency links
            DB::table('channel_currencies')->where('channel_id', $channelId)->delete();
            DB::table('channel_currencies')->insert(['channel_id' => $channelId, 'currency_id' => $egpId]);

            // Remove all other locale links
            DB::table('channel_locales')->where('channel_id', $channelId)->delete();
            DB::table('channel_locales')->insert(['channel_id' => $channelId, 'locale_id' => $arId]);

            // Set as defaults
            DB::table('channels')->where('id', $channelId)->update([
                'base_currency_id' => $egpId,
                'default_locale_id' => $arId,
            ]);
        });

        $this->info('EGP and Arabic set as only defaults');
        
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        
        return 0;
    }
}
