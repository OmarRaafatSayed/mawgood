<?php

use Illuminate\Support\Facades\Route;
use Mawgood\Vendor\Http\Controllers\DashboardController;
use Mawgood\Vendor\Http\Controllers\ProductController;
use Mawgood\Vendor\Http\Controllers\OrderController;
use Mawgood\Vendor\Http\Controllers\WalletController;
use Mawgood\Vendor\Http\Controllers\SettingsController;
use Mawgood\Vendor\Http\Controllers\NotificationController;
use Mawgood\Vendor\Http\Middleware\EnsureVendorAccess;

Route::group([
    'prefix' => 'vendor',
    'middleware' => ['web', 'customer', EnsureVendorAccess::class],
    'as' => 'vendor.'
], function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Products
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::post('/mass-delete', [ProductController::class, 'massDelete'])->name('mass_delete');
    });
    
    // Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('show');
        Route::patch('/{id}/status', [OrderController::class, 'updateStatus'])->name('update_status');
    });
    
    // Wallet
    Route::prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('index');
        Route::post('/withdrawal', [WalletController::class, 'requestWithdrawal'])->name('withdrawal');
        Route::get('/transactions', [WalletController::class, 'transactions'])->name('transactions');
    });
    
    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::put('/profile', [SettingsController::class, 'updateProfile'])->name('profile.update');
    });
    
    // Notifications
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::post('/{id}/read', [NotificationController::class, 'markAsRead'])->name('mark_read');
        Route::delete('/delete-all', [NotificationController::class, 'deleteAll'])->name('delete_all');
    });
    
    // API
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/dashboard-stats', [DashboardController::class, 'getDashboardStats'])->name('dashboard.stats');
    });
    
    // Public Store
    Route::get('/store', [DashboardController::class, 'publicStore'])->name('store');
    
    // Logout
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
