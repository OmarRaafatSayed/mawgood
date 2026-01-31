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
        
        // Share stats with all vendor views
        view()->composer('mawgood-vendor::*', function ($view) {
            if (auth('customer')->check() && request()->vendor) {
                $vendor = request()->vendor;
                
                $stats = [
                    'orders' => [
                        'total' => \DB::table('order_items')
                            ->join('products', 'order_items.product_id', '=', 'products.id')
                            ->where('products.vendor_id', $vendor->id)
                            ->distinct('order_items.order_id')
                            ->count('order_items.order_id'),
                        'pending' => 0,
                        'shipped' => 0,
                        'unshipped' => 0,
                    ],
                    'products' => [
                        'total' => \DB::table('products')->where('vendor_id', $vendor->id)->count(),
                        'inactive' => \DB::table('products')->where('vendor_id', $vendor->id)->where('status', 0)->count(),
                        'low_stock' => 0,
                    ],
                    'wallet' => [
                        'available' => 0,
                    ],
                ];
                
                $view->with('stats', $stats);
                $view->with('vendor', $vendor);
                $view->with('unreadNotifications', 0);
            }
        });
    }
}
