<?php

use Illuminate\Support\Facades\Route;
use Mawgood\Company\Http\Controllers\DashboardController;
use Mawgood\Company\Http\Controllers\ProfileController;
use Mawgood\Company\Http\Controllers\JobController;
use Mawgood\Company\Http\Controllers\ApplicationController;

Route::group([
    'prefix' => 'company',
    'middleware' => ['web', 'customer', Mawgood\Company\Http\Middleware\EnsureCompanyRole::class],
    'as' => 'company.'
], function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
    
    // Applications
    Route::get('/jobs/{id}/applications', [ApplicationController::class, 'index'])->name('jobs.applications');
    Route::post('/applications/{id}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
    Route::post('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
});
