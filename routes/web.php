<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RoleSelectionController;
use App\Http\Controllers\JobApplicationController;

// Test route for homepage
Route::get('/test-home', function() {
    return '<h1>Homepage Test - Working!</h1><p>Database: ' . (DB::connection()->getPdo() ? 'Connected' : 'Not Connected') . '</p>';
});

// Role Selection
Route::middleware(['customer'])->group(function () {
    Route::get('/select-role', [RoleSelectionController::class, 'index'])->name('role.select');
    Route::post('/select-role', [RoleSelectionController::class, 'select'])->name('role.select.submit');
});

// Include vendor routes
require __DIR__.'/vendor.php';

// Account Type Selection Routes
Route::middleware(['customer'])->group(function () {
    Route::get('/account-type', [App\Http\Controllers\AccountTypeController::class, 'show'])->name('account-type.show');
    Route::post('/account-type', [App\Http\Controllers\AccountTypeController::class, 'store'])->name('account-type.store');
});

// Admin vendor management routes
Route::group(['prefix' => config('app.admin_url', 'admin'), 'middleware' => ['web']], function () {
    Route::get('vendors', [App\Http\Controllers\Admin\VendorController::class, 'index'])->name('admin.vendors.index');
    Route::get('vendors/create', [App\Http\Controllers\Admin\VendorController::class, 'create'])->name('admin.vendors.create');
    Route::post('vendors', [App\Http\Controllers\Admin\VendorController::class, 'store'])->name('admin.vendors.store');
    Route::get('vendors/{id}', [App\Http\Controllers\Admin\VendorController::class, 'show'])->name('admin.vendors.show');
    Route::get('vendors/{id}/edit', [App\Http\Controllers\Admin\VendorController::class, 'edit'])->name('admin.vendors.edit');
    Route::put('vendors/{id}', [App\Http\Controllers\Admin\VendorController::class, 'update'])->name('admin.vendors.update');
    Route::delete('vendors/{id}', [App\Http\Controllers\Admin\VendorController::class, 'destroy'])->name('admin.vendors.destroy');
    Route::post('vendors/mass-delete', [App\Http\Controllers\Admin\VendorController::class, 'massDestroy'])->name('admin.vendors.mass_delete');
    Route::post('vendors/{id}/approve', [App\Http\Controllers\Admin\VendorController::class, 'approve'])->name('admin.vendors.approve');
    Route::post('vendors/{id}/reject', [App\Http\Controllers\Admin\VendorController::class, 'reject'])->name('admin.vendors.reject');
    Route::post('vendors/{id}/suspend', [App\Http\Controllers\Admin\VendorController::class, 'suspend'])->name('admin.vendors.suspend');
    Route::post('vendors/{id}/commission', [App\Http\Controllers\Admin\VendorController::class, 'updateCommission'])->name('admin.vendors.commission');
    
    Route::get('vendor-management', [App\Http\Controllers\Admin\VendorManagementController::class, 'index'])->name('admin.vendor-management.index');
    Route::get('vendor-management/{id}', [App\Http\Controllers\Admin\VendorManagementController::class, 'show'])->name('admin.vendor-management.show');
    Route::post('vendor-management/{id}/approve', [App\Http\Controllers\Admin\VendorManagementController::class, 'approve'])->name('admin.vendor-management.approve');
    Route::post('vendor-management/{id}/reject', [App\Http\Controllers\Admin\VendorManagementController::class, 'reject'])->name('admin.vendor-management.reject');
    Route::post('vendor-management/{id}/suspend', [App\Http\Controllers\Admin\VendorManagementController::class, 'suspend'])->name('admin.vendor-management.suspend');

    Route::get('debug-products', [App\Http\Controllers\Admin\VendorController::class, 'debugProducts'])->name('admin.debug.products');
});

// Jobs Routes
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{id}/apply', [JobApplicationController::class, 'store'])->middleware('customer')->name('jobs.apply');
Route::get('/jobs/{slug}/apply/success', function ($slug) {
    return view('jobs.apply-success', compact('slug'));
})->name('jobs.apply.success');

// Company Routes
Route::group([
    'prefix' => 'company',
    'middleware' => ['web', 'customer', 'role:company'],
    'as' => 'company.'
], function () {
    Route::get('/dashboard', [App\Http\Controllers\Company\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jobs', [App\Http\Controllers\Company\JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [App\Http\Controllers\Company\JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [App\Http\Controllers\Company\JobController::class, 'store'])->name('jobs.store');
    Route::get('/applications', [App\Http\Controllers\Company\ApplicationController::class, 'index'])->name('applications.index');
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