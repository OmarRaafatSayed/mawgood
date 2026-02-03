<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    /**
     * Clear category cache for all locales
     */
    public static function clearCategoryCache($channelId = null)
    {
        $channelId = $channelId ?? core()->getCurrentChannel()->id;
        
        foreach (core()->getAllLocales() as $locale) {
            $cacheKey = 'category_tree_' . $channelId . '_' . $locale->code;
            Cache::forget($cacheKey);
        }
    }

    /**
     * Clear all performance caches
     */
    public static function clearPerformanceCaches()
    {
        Cache::tags(['categories', 'products', 'cart'])->flush();
        self::clearCategoryCache();
    }
}
