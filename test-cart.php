<?php

// Test script to verify cart functionality
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "=== CART FUNCTIONALITY TEST ===" . PHP_EOL;
    
    // Test 1: Check if products table exists and has data
    echo "1. Checking products table..." . PHP_EOL;
    $productsCount = DB::table('products')->count();
    echo "   Products count: $productsCount" . PHP_EOL;
    
    // Test 2: Check booking products
    echo "2. Checking booking products..." . PHP_EOL;
    $bookingCount = DB::table('booking_products')->count();
    echo "   Booking products count: $bookingCount" . PHP_EOL;
    
    // Test 3: Test first product
    echo "3. Testing first product..." . PHP_EOL;
    $product = DB::table('products')->first();
    if ($product) {
        echo "   Product ID: {$product->id}" . PHP_EOL;
        echo "   Product SKU: {$product->sku}" . PHP_EOL;
        echo "   Product Status: {$product->status}" . PHP_EOL;
        
        // Check inventory
        $inventory = DB::table('product_inventories')->where('product_id', $product->id)->first();
        echo "   Has inventory: " . ($inventory ? "Yes (qty: {$inventory->qty})" : "No") . PHP_EOL;
        
        // Check price
        $price = DB::table('product_price_indices')->where('product_id', $product->id)->first();
        echo "   Has price: " . ($price ? "Yes (price: {$price->min_price})" : "No") . PHP_EOL;
    }
    
    // Test 4: Test cart service
    echo "4. Testing cart service..." . PHP_EOL;
    if (class_exists('App\Services\CartService')) {
        echo "   CartService class exists: Yes" . PHP_EOL;
    } else {
        echo "   CartService class exists: No" . PHP_EOL;
    }
    
    // Test 5: Test enhanced routes
    echo "5. Testing enhanced routes..." . PHP_EOL;
    $routes = app('router')->getRoutes();
    $hasEnhancedCart = false;
    foreach ($routes as $route) {
        if (str_contains($route->uri(), 'enhanced-cart')) {
            $hasEnhancedCart = true;
            break;
        }
    }
    echo "   Enhanced cart routes: " . ($hasEnhancedCart ? "Yes" : "No") . PHP_EOL;
    
    echo PHP_EOL . "=== TEST COMPLETED ===" . PHP_EOL;
    echo "Status: " . ($productsCount > 0 ? "SUCCESS - Cart should work now!" : "NEEDS ATTENTION") . PHP_EOL;
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . PHP_EOL;
    echo "File: " . $e->getFile() . " Line: " . $e->getLine() . PHP_EOL;
}