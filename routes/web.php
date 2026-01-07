<?php

// Jobs Routes
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{id}/apply', [App\Http\Controllers\JobController::class, 'apply'])->name('jobs.apply');