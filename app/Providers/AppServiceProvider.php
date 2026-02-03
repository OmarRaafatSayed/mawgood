<?php

namespace App\Providers;

use App\Observers\ProductInventoryObserver;
use App\Observers\ProductApprovalObserver;
use App\Observers\ProductAutoFixObserver;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\ParallelTesting;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Webkul\Product\Models\ProductInventory;
use Webkul\Product\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $allowedIPs = array_map('trim', explode(',', config('app.debug_allowed_ips')));

        $allowedIPs = array_filter($allowedIPs);

        if (empty($allowedIPs)) {
            return;
        }

        if (in_array(Request::ip(), $allowedIPs)) {
            Debugbar::enable();
        } else {
            Debugbar::disable();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ProductInventory::observe(ProductInventoryObserver::class);
        Product::observe(ProductApprovalObserver::class);
        // Product::observe(ProductAutoFixObserver::class); // Disabled temporarily

        // Register Category Observer for automatic cache invalidation
        if (class_exists(\Webkul\Category\Models\Category::class)) {
            \Webkul\Category\Models\Category::observe(\App\Observers\CategoryObserver::class);
        }

        ParallelTesting::setUpTestDatabase(function (string $database, int $token) {
            Artisan::call('db:seed');
        });
    }
}
