<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TranslateThemeContent extends Command
{
    protected $signature = 'theme:translate-ar';
    protected $description = 'Translate theme content to Arabic';

    public function handle()
    {
        $translations = [
            'Get UPTO 40% OFF on your 1st order SHOP NOW' => 'احصل على خصم يصل إلى 40% على طلبك الأول تسوق الآن',
            'SHOP NOW' => 'تسوق الآن',
            'Get UPTO 40% OFF on your 1st order' => 'احصل على خصم يصل إلى 40% على طلبك الأول',
            'New Collection' => 'مجموعة جديدة',
            'Top Categories' => 'أفضل الفئات',
            'New Products' => 'منتجات جديدة',
            'Featured Collections' => 'مجموعات مميزة',
            'All Products' => 'جميع المنتجات',
        ];

        $arTranslations = DB::table('theme_customization_translations')
            ->where('locale', 'ar')
            ->get();

        foreach ($arTranslations as $trans) {
            $options = json_decode($trans->options, true);
            
            if (isset($options['title'])) {
                foreach ($translations as $en => $ar) {
                    if (stripos($options['title'], $en) !== false) {
                        $options['title'] = str_ireplace($en, $ar, $options['title']);
                    }
                }
            }

            if (isset($options['html'])) {
                foreach ($translations as $en => $ar) {
                    $options['html'] = str_ireplace($en, $ar, $options['html']);
                }
            }

            if (isset($options['images'])) {
                foreach ($options['images'] as &$image) {
                    if (isset($image['title'])) {
                        foreach ($translations as $en => $ar) {
                            $image['title'] = str_ireplace($en, $ar, $image['title']);
                        }
                    }
                    if (isset($image['link'])) {
                        foreach ($translations as $en => $ar) {
                            $image['link'] = str_ireplace($en, $ar, $image['link']);
                        }
                    }
                }
            }

            DB::table('theme_customization_translations')
                ->where('id', $trans->id)
                ->update(['options' => json_encode($options)]);
        }

        $this->info('Theme content translated to Arabic successfully!');
    }
}
