<?php

use Illuminate\Support\Facades\Route;

Route::prefix('vendors')->group(function () {
    Route::get('', [App\Http\Controllers\Admin\VendorController::class, 'index'])->name('admin.vendors.index');
    Route::get('create', [App\Http\Controllers\Admin\VendorController::class, 'create'])->name('admin.vendors.create');
    Route::post('', [App\Http\Controllers\Admin\VendorController::class, 'store'])->name('admin.vendors.store');
    Route::get('{id}', [App\Http\Controllers\Admin\VendorController::class, 'show'])->name('admin.vendors.show');
    Route::get('{id}/edit', [App\Http\Controllers\Admin\VendorController::class, 'edit'])->name('admin.vendors.edit');
    Route::put('{id}', [App\Http\Controllers\Admin\VendorController::class, 'update'])->name('admin.vendors.update');
    Route::delete('{id}', [App\Http\Controllers\Admin\VendorController::class, 'destroy'])->name('admin.vendors.destroy');
});