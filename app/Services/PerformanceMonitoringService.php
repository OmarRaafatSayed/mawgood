<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PerformanceMonitoringService
{
    public static function logSlowQuery($sql, $time, $bindings = [])
    {
        if ($time > 1000) { // Log queries taking more than 1 second
            Log::warning('Slow Query Detected', [
                'sql' => $sql,
                'time' => $time,
                'bindings' => $bindings
            ]);
        }
    }

    public static function getCacheHitRate()
    {
        $hits = Cache::get('cache_hits', 0);
        $misses = Cache::get('cache_misses', 0);
        $total = $hits + $misses;
        
        return $total > 0 ? ($hits / $total) * 100 : 0;
    }

    public static function getDbConnectionCount()
    {
        return DB::connection()->getPdo()->getAttribute(\PDO::ATTR_CONNECTION_STATUS);
    }

    public static function optimizeDatabase()
    {
        // Run ANALYZE TABLE for key tables
        $tables = ['products', 'vendor_orders', 'orders', 'customers', 'vendors'];
        
        foreach ($tables as $table) {
            try {
                DB::statement("ANALYZE TABLE {$table}");
            } catch (\Exception $e) {
                Log::error("Failed to analyze table {$table}: " . $e->getMessage());
            }
        }
    }
}