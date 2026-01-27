<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class OptimizePerformance extends Command
{
    protected $signature = 'optimize:performance';
    protected $description = 'Run all performance optimizations';

    public function handle()
    {
        $this->info('Starting performance optimization...');

        // Clear and optimize caches
        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('view:cache');
        $this->call('event:cache');

        // Optimize autoloader
        $this->call('optimize');

        // Clear old cache
        $this->call('cache:clear');

        // Run database optimizations
        $this->call('migrate', ['--force' => true]);

        $this->info('Performance optimization completed!');
        
        return 0;
    }
}