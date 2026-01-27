<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\OnboardingController;

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Vendor dashboard routes are now loaded from Mawgood\Vendor package
| Only onboarding routes remain here
|
*/

// Vendor Onboarding Routes (accessible to authenticated customers)
Route::group([
    'prefix' => 'vendor',
    'middleware' => ['customer', 'vendor.onboarding'],
    'as' => 'vendor.onboarding.'
], function () {
    Route::get('/apply', [OnboardingController::class, 'showForm'])->name('form');
    Route::post('/apply', [OnboardingController::class, 'submitApplication'])->name('submit');
    
    // AJAX routes for real-time validation
    Route::post('/check-name', [OnboardingController::class, 'checkStoreName'])->name('check-name');
    Route::post('/check-slug', [OnboardingController::class, 'checkStoreSlug'])->name('check-slug');
    Route::post('/generate-slug', [OnboardingController::class, 'generateSlug'])->name('generate-slug');
});

Route::group([
    'prefix' => 'vendor',
    'as' => 'vendor.'
], function () {
    // Test route without middleware
    Route::get('/test', [\App\Http\Controllers\Vendor\TestController::class, 'index'])->name('test');
});