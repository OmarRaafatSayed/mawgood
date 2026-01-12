<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        try {
            // Test database connection
            $dbStatus = DB::connection()->getPdo() ? 'Connected' : 'Not Connected';
            
            // Test tables existence
            $tables = [
                'vendors' => DB::getSchemaBuilder()->hasTable('vendors'),
                'products' => DB::getSchemaBuilder()->hasTable('products'),
                'vendor_orders' => DB::getSchemaBuilder()->hasTable('vendor_orders'),
                'vendor_payouts' => DB::getSchemaBuilder()->hasTable('vendor_payouts'),
            ];
            
            // Count records
            $counts = [];
            foreach ($tables as $table => $exists) {
                if ($exists) {
                    $counts[$table] = DB::table($table)->count();
                } else {
                    $counts[$table] = 'Table not found';
                }
            }
            
            return response()->json([
                'status' => 'success',
                'database' => $dbStatus,
                'tables' => $tables,
                'counts' => $counts,
                'message' => 'Vendor system is working!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}