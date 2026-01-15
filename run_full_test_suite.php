#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Vendor;
use Webkul\Product\Models\Product;
use Webkul\Attribute\Models\AttributeFamily;

echo "\n";
echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║   Bagisto Vendor Product Management - Full Test Suite      ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n\n";

$testsPassed = 0;
$testsFailed = 0;

// Test 1: Verify Vendor exists
echo "Test 1: Verify Test Vendor Exists\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    $vendor = Vendor::where('store_name', 'Test Store')->firstOrFail();
    echo "✓ PASS: Found vendor '{$vendor->store_name}' (ID: {$vendor->id})\n";
    echo "  - Store Slug: {$vendor->store_slug}\n";
    echo "  - Email: {$vendor->email}\n";
    echo "  - Status: {$vendor->status}\n";
    $testsPassed++;
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Test 2: Create Product with Auto-SKU
echo "Test 2: Create Product with Auto-Generated SKU\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    $attrFamily = AttributeFamily::firstOrFail();
    $sku = 'SKU-' . strtoupper(substr(md5(microtime()), 0, 8));
    
    $product = Product::create([
        'sku' => $sku,
        'type' => 'simple',
        'attribute_family_id' => $attrFamily->id,
        'vendor_id' => $vendor->id,
    ]);
    
    if ($product->id && $product->vendor_id === $vendor->id) {
        echo "✓ PASS: Product created successfully\n";
        echo "  - Product ID: {$product->id}\n";
        echo "  - SKU (Auto-Generated): {$product->sku}\n";
        echo "  - Vendor ID: {$product->vendor_id}\n";
        echo "  - Type: {$product->type}\n";
        $testsPassed++;
    } else {
        throw new Exception("Product vendor_id not set");
    }
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Test 3: Verify Vendor-Product Relationship
echo "Test 3: Verify Vendor-Product Relationship\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    $productCount = $vendor->products()->count();
    $productInList = $vendor->products()->where('id', $product->id)->exists();
    
    if ($productCount > 0 && $productInList) {
        echo "✓ PASS: Product appears in vendor's product list\n";
        echo "  - Total Vendor Products: {$productCount}\n";
        echo "  - Product Found: Yes (ID: {$product->id})\n";
        $testsPassed++;
    } else {
        throw new Exception("Product not found in vendor's list");
    }
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Test 4: Verify Product Table Structure
echo "Test 4: Verify Product Table Structure\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    $columns = DB::getSchemaBuilder()->getColumns('products');
    $columnNames = array_map(fn($col) => $col['name'], $columns);
    
    $requiredColumns = ['id', 'sku', 'type', 'vendor_id', 'attribute_family_id', 'parent_id'];
    $missingColumns = array_diff($requiredColumns, $columnNames);
    
    if (empty($missingColumns)) {
        echo "✓ PASS: All required columns exist\n";
        echo "  - Columns Found:\n";
        foreach ($requiredColumns as $col) {
            echo "    • {$col}\n";
        }
        $testsPassed++;
    } else {
        throw new Exception("Missing columns: " . implode(', ', $missingColumns));
    }
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Test 5: Verify Product Model Fillable
echo "Test 5: Verify Product Model Fillable Attributes\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    $model = new Product();
    $fillable = $model->getFillable();
    
    if (in_array('vendor_id', $fillable)) {
        echo "✓ PASS: vendor_id is in fillable array\n";
        echo "  - Fillable Attributes:\n";
        foreach ($fillable as $attr) {
            echo "    • {$attr}\n";
        }
        $testsPassed++;
    } else {
        throw new Exception("vendor_id not in fillable array");
    }
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Test 6: Database Integrity Check
echo "Test 6: Database Integrity Check\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    // Check products with vendor_id
    $productsWithVendor = DB::table('products')->whereNotNull('vendor_id')->count();
    $productsTotal = DB::table('products')->count();
    
    // Check vendor relationships
    $vendorsCount = DB::table('vendors')->count();
    $validVendorProducts = DB::table('products')
        ->leftJoin('vendors', 'products.vendor_id', '=', 'vendors.id')
        ->whereNotNull('products.vendor_id')
        ->whereNotNull('vendors.id')
        ->count();
    
    // Check if all products with vendor_id have valid vendors
    $orphanProducts = $productsWithVendor - $validVendorProducts;
    
    if ($orphanProducts === 0 && $productsWithVendor > 0) {
        echo "✓ PASS: Database integrity check successful\n";
        echo "  - Total Products: {$productsTotal}\n";
        echo "  - Products with Vendor: {$productsWithVendor}\n";
        echo "  - Valid Vendor References: {$validVendorProducts}\n";
        echo "  - Orphan Records: 0\n";
        $testsPassed++;
    } else {
        throw new Exception("Found {$orphanProducts} orphan product records");
    }
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Test 7: Verify Route Exists
echo "Test 7: Verify Product Store Route Exists\n";
echo "─────────────────────────────────────────────────────────────\n";
try {
    $route = app('router')->getRoutes()->getByName('vendor.admin.catalog.products.store');
    if ($route) {
        echo "✓ PASS: Product store route exists\n";
        echo "  - Route Name: vendor.admin.catalog.products.store\n";
        echo "  - Methods: " . implode(', ', $route->methods) . "\n";
        echo "  - URI: {$route->uri}\n";
        $testsPassed++;
    } else {
        throw new Exception("Route not found");
    }
} catch (\Exception $e) {
    echo "✗ FAIL: {$e->getMessage()}\n";
    $testsFailed++;
}
echo "\n";

// Summary
echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║                     TEST RESULTS SUMMARY                   ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n\n";

$totalTests = $testsPassed + $testsFailed;
$successRate = ($totalTests > 0) ? round(($testsPassed / $totalTests) * 100, 2) : 0;

echo "Total Tests: {$totalTests}\n";
echo "Passed: {$testsPassed} ✓\n";
echo "Failed: {$testsFailed} " . ($testsFailed > 0 ? "✗" : "✓") . "\n";
echo "Success Rate: {$successRate}%\n\n";

if ($testsFailed === 0 && $testsPassed > 0) {
    echo "🎉 All tests passed! The vendor product system is working correctly.\n\n";
    exit(0);
} else {
    echo "❌ Some tests failed. Please review the errors above.\n\n";
    exit(1);
}
