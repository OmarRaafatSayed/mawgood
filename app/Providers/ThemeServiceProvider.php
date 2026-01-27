<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ThemeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register Mawgood theme views with higher priority
        View::addNamespace('shop', resource_path('themes/mawgood/views'));
    }
}
