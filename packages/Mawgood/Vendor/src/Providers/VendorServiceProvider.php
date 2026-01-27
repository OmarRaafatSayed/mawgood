<?php

namespace Mawgood\Vendor\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class VendorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Mawgood\Vendor\Repositories\VendorRepository::class
        );
        
        $this->app->singleton(
            \Mawgood\Vendor\Services\VendorProductService::class
        );
        
        $this->app->singleton(
            \Mawgood\Vendor\Services\VendorOrderService::class
        );
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'mawgood-vendor');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/vendor.php');
        
        // Register middleware
        app('router')->aliasMiddleware(
            'vendor.access',
            \Mawgood\Vendor\Http\Middleware\EnsureVendorAccess::class
        );
    }
}
