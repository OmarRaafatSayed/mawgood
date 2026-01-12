<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\VendorRepository;

class VendorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(VendorRepository::class);
    }

    public function boot()
    {
        //
    }
}