<?php

use Illuminate\Support\Facades\Route;

// Include vendor routes
require __DIR__.'/vendor.php';

// Admin vendor management routes
Route::group(['prefix' => config('app.admin_url', 'admin'), 'middleware' => ['web']], function () {
    Route::get('vendors', [App\Http\Controllers\Admin\VendorController::class, 'index'])->name('admin.vendors.index');
    Route::get('vendors/{id}', [App\Http\Controllers\Admin\VendorController::class, 'show'])->name('admin.vendors.show');
    Route::post('vendors/{id}/approve', [App\Http\Controllers\Admin\VendorController::class, 'approve'])->name('admin.vendors.approve');
    Route::post('vendors/{id}/reject', [App\Http\Controllers\Admin\VendorController::class, 'reject'])->name('admin.vendors.reject');
    Route::post('vendors/{id}/suspend', [App\Http\Controllers\Admin\VendorController::class, 'suspend'])->name('admin.vendors.suspend');
    Route::post('vendors/{id}/commission', [App\Http\Controllers\Admin\VendorController::class, 'updateCommission'])->name('admin.vendors.commission');
});

// Test routes
Route::get('/test-vendor', function() {
    return response()->json([
        'status' => 'success',
        'message' => 'Vendor system is working!',
        'timestamp' => now()
    ]);
});

Route::get('/test-db', function() {
    try {
        $dbStatus = DB::connection()->getPdo() ? 'Connected' : 'Not Connected';
        return response()->json([
            'status' => 'success',
            'database' => $dbStatus,
            'message' => 'Database connection test'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});