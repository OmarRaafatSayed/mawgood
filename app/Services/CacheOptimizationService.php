<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CacheOptimizationService
{
    const CACHE_TTL = [
        'stats' => 300,      // 5 minutes
        'products' => 600,   // 10 minutes
        'orders' => 180,     // 3 minutes
        'notifications' => 60 // 1 minute
    ];

    public static function getVendorStats($vendorId, callable $callback)
    {
        return Cache::remember(
            "vendor_stats_{$vendorId}",
            self::CACHE_TTL['stats'],
            $callback
        );
    }

    public static function getVendorProducts($vendorId, $filters = [])
    {
        $key = "vendor_products_{$vendorId}_" . md5(serialize($filters));
        return Cache::remember($key, self::CACHE_TTL['products'], function () use ($vendorId, $filters) {
            $query = DB::table('products')->where('vendor_id', $vendorId);
            
            if (isset($filters['status'])) {
                $query->where('status', $filters['status']);
            }
            
            return $query->get();
        });
    }

    public static function clearVendorCache($vendorId)
    {
        $patterns = [
            "vendor_stats_{$vendorId}",
            "vendor_products_{$vendorId}*",
            "vendor_orders_{$vendorId}*",
            "vendor_notifications_{$vendorId}"
        ];

        foreach ($patterns as $pattern) {
            if (str_contains($pattern, '*')) {
                Cache::flush(); // For wildcard patterns
            } else {
                Cache::forget($pattern);
            }
        }
    }
}