<?php

namespace Mawgood\Company\Providers;

use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Mawgood\Company\Services\JobPostingService::class);
        $this->app->singleton(\Mawgood\Company\Services\ApplicationReviewService::class);
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'mawgood-company');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
    }
}
