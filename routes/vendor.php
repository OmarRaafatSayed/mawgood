<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\WalletController;
use App\Http\Controllers\Vendor\SettingsController;
use App\Http\Controllers\Vendor\OnboardingController;
use App\Http\Controllers\Vendor\AdminController;
use App\Http\Controllers\Vendor\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Vendor\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Here are the routes for vendor/seller functionality
| All routes are protected by auth:customer and isSeller middleware
|
*/

// Vendor Onboarding Routes (accessible to authenticated customers)
Route::group([
    'prefix' => 'vendor',
    'middleware' => ['customer'],
    'as' => 'vendor.onboarding.'
], function () {
    Route::get('/apply', [OnboardingController::class, 'showForm'])->name('form');
    Route::post('/apply', [OnboardingController::class, 'submitApplication'])->name('submit');
    Route::get('/confirmation', [OnboardingController::class, 'showConfirmation'])->name('confirmation');
    Route::post('/final-submit', [OnboardingController::class, 'finalSubmit'])->name('final-submit');
    Route::get('/under-review', [OnboardingController::class, 'underReview'])->name('under-review');
    
    // AJAX routes for real-time validation
    Route::post('/check-name', [OnboardingController::class, 'checkStoreName'])->name('check-name');
    Route::post('/check-slug', [OnboardingController::class, 'checkStoreSlug'])->name('check-slug');
    Route::post('/generate-slug', [OnboardingController::class, 'generateSlug'])->name('generate-slug');
});

// Under Review Route (separate from onboarding group)
Route::get('/vendor/under-review', [OnboardingController::class, 'underReview'])
    ->middleware(['customer'])
    ->name('vendor.under-review');

Route::group([
    'prefix' => 'vendor',
    'as' => 'vendor.'
], function () {
    
    // Test route without middleware
    Route::get('/test', [\App\Http\Controllers\Vendor\TestController::class, 'index'])->name('test');
    
});

Route::group([
    'prefix' => 'vendor',
    'middleware' => ['customer', 'isSeller'],
    'as' => 'vendor.'
], function () {
    
    // Dashboard Routes
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Product Management Routes
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::post('/mass-delete', [ProductController::class, 'massDestroy'])->name('mass_delete');
    });
    
    // Order Management Routes
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('show');
        Route::post('/{id}/shipping-label', [OrderController::class, 'generateShippingLabel'])->name('shipping_label');
        Route::patch('/{id}/status', [OrderController::class, 'updateStatus'])->name('update_status');
        Route::get('/{id}/invoice', [OrderController::class, 'generateInvoice'])->name('invoice');
    });
    
    // Wallet Management Routes
    Route::prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('index');
        Route::post('/withdrawal', [WalletController::class, 'requestWithdrawal'])->name('withdrawal');
        Route::get('/transactions', [WalletController::class, 'transactions'])->name('transactions');
        Route::get('/earnings-chart', [WalletController::class, 'earningsChart'])->name('earnings_chart');
    });
    
    // Settings Routes
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::put('/profile', [SettingsController::class, 'updateProfile'])->name('profile.update');
        Route::put('/inventory-source', [SettingsController::class, 'updateInventorySource'])->name('inventory_source.update');
        Route::get('/system-config/{key}', [SettingsController::class, 'getSystemConfig'])->name('system_config');
    });
    
    // API Routes for AJAX calls
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/dashboard-stats', [DashboardController::class, 'getDashboardStats'])->name('dashboard.stats');
        Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
        Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search');
    });
});

// Vendor Admin Dashboard Routes (Scoped Admin UI)
Route::group([
    'prefix' => 'vendor/admin',
    'middleware' => ['customer', 'vendor.admin.access'],
    'as' => 'vendor.admin.'
], function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.index');
    Route::get('/stats', [AdminController::class, 'stats'])->name('dashboard.stats');
    
    // Products (Scoped to vendor)
    Route::prefix('catalog/products')->name('catalog.products.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/', [AdminProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminProductController::class, 'destroy'])->name('destroy');
    });
    
    // Orders (Scoped to vendor)
    Route::prefix('sales/orders')->name('sales.orders.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('index');
        Route::get('/{id}', [AdminOrderController::class, 'view'])->name('view');
    });
});