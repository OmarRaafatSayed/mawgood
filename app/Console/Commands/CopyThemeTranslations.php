<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CopyThemeTranslations extends Command
{
    protected $signature = 'theme:copy-translations';
    protected $description = 'Copy theme customization translations from English to Arabic';

    public function handle()
    {
        $enTranslations = DB::table('theme_customization_translations')
            ->where('locale', 'en')
            ->get();

        foreach ($enTranslations as $trans) {
            $exists = DB::table('theme_customization_translations')
                ->where('theme_customization_id', $trans->theme_customization_id)
                ->where('locale', 'ar')
                ->exists();

            if (!$exists) {
                DB::table('theme_customization_translations')->insert([
                    'theme_customization_id' => $trans->theme_customization_id,
                    'locale' => 'ar',
                    'options' => $trans->options,
                ]);
            }
        }

        $this->info('Theme translations copied successfully!');
    }
}
