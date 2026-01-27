<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class MonitorPerformance extends Command
{
    protected $signature = 'monitor:performance';
    protected $description = 'Monitor application performance metrics';

    public function handle()
    {
        $this->info('🚀 Performance Monitoring Report');
        $this->line('================================');

        // Redis Connection Test
        try {
            Redis::ping();
            $this->info('✅ Redis: Connected');
        } catch (\Exception $e) {
            $this->error('❌ Redis: Disconnected');
        }

        // Cache Test
        $start = microtime(true);
        Cache::put('test_key', 'test_value', 60);
        $value = Cache::get('test_key');
        $cacheTime = (microtime(true) - $start) * 1000;
        
        if ($value === 'test_value') {
            $this->info("✅ Cache: Working ({$cacheTime}ms)");
        } else {
            $this->error('❌ Cache: Failed');
        }

        // Database Performance
        $start = microtime(true);
        $count = DB::table('products')->count();
        $dbTime = (microtime(true) - $start) * 1000;
        $this->info("✅ Database: {$count} products ({$dbTime}ms)");

        // Memory Usage
        $memory = round(memory_get_usage(true) / 1024 / 1024, 2);
        $this->info("📊 Memory Usage: {$memory}MB");

        $this->line('================================');
        $this->info('✅ Performance monitoring complete!');
    }
}