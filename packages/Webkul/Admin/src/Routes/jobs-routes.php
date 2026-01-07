<?php

use Illuminate\Support\Facades\Route;

Route::prefix('jobs')->group(function () {
    Route::get('', [App\Http\Controllers\Admin\JobController::class, 'index'])->name('admin.jobs.index');
    Route::get('{id}', [App\Http\Controllers\Admin\JobController::class, 'show'])->name('admin.jobs.show');
    Route::get('{id}/edit', [App\Http\Controllers\Admin\JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::put('{id}', [App\Http\Controllers\Admin\JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('{id}', [App\Http\Controllers\Admin\JobController::class, 'destroy'])->name('admin.jobs.destroy');
    
    Route::get('categories/index', [App\Http\Controllers\Admin\JobController::class, 'categories'])->name('admin.jobs.categories');
    Route::post('categories', [App\Http\Controllers\Admin\JobController::class, 'storeCategory'])->name('admin.jobs.categories.store');
});