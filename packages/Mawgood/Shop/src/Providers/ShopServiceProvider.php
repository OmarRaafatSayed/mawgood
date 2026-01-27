<?php

namespace Mawgood\Shop\Providers;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Mawgood\Shop\Services\VendorStoreService::class);
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'mawgood-shop');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
    }
}
