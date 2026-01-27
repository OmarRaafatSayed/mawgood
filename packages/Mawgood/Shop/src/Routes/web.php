<?php

use Illuminate\Support\Facades\Route;
use Mawgood\Shop\Http\Controllers\VendorStoreController;
use Mawgood\Shop\Http\Controllers\VendorStoreProductController;
use Mawgood\Shop\Http\Controllers\VendorReviewController;

Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
    
    Route::get('/{slug}', [VendorStoreController::class, 'show'])->name('show');
    Route::get('/{slug}/about', [VendorStoreController::class, 'about'])->name('about');
    Route::get('/{slug}/products', [VendorStoreProductController::class, 'index'])->name('products');
    Route::get('/{slug}/reviews', [VendorReviewController::class, 'index'])->name('reviews');
    Route::post('/{slug}/reviews', [VendorReviewController::class, 'store'])->name('reviews.store');
    
});
