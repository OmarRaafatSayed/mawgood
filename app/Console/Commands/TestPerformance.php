<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TestPerformance extends Command
{
    protected $signature = 'test:performance';
    protected $description = 'Test application performance';

    public function handle()
    {
        $this->info('🚀 Performance Test Results');
        $this->line('============================');

        // Database Performance Test
        $start = microtime(true);
        $productCount = DB::table('products')->count();
        $dbTime = round((microtime(true) - $start) * 1000, 2);
        $this->info("📊 Database Query: {$productCount} products in {$dbTime}ms");

        // Cache Performance Test
        $start = microtime(true);
        Cache::put('perf_test', 'test_data', 60);
        $cached = Cache::get('perf_test');
        $cacheTime = round((microtime(true) - $start) * 1000, 2);
        
        if ($cached === 'test_data') {
            $this->info("✅ Cache: Working in {$cacheTime}ms");
        } else {
            $this->error('❌ Cache: Failed');
        }

        // Memory Usage
        $memory = round(memory_get_usage(true) / 1024 / 1024, 2);
        $this->info("💾 Memory Usage: {$memory}MB");

        // Optimized Query Test
        $start = microtime(true);
        $stats = DB::table('products')
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN vendor_id IS NOT NULL THEN 1 ELSE 0 END) as with_vendor')
            ->first();
        $optimizedTime = round((microtime(true) - $start) * 1000, 2);
        $this->info("⚡ Optimized Query: {$stats->total} total, {$stats->with_vendor} with vendor in {$optimizedTime}ms");

        $this->line('============================');
        $this->info('✅ Performance test complete!');
        
        return 0;
    }
}