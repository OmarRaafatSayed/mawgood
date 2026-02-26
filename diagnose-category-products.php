<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Webkul\Product\Models\Product;
use Webkul\Category\Models\Category;

echo "=== Category-Product Diagnostic ===\n\n";

// Test Category ID 9 (Home Furniture)
$categoryId = 9;

echo "1. Testing Category ID: {$categoryId}\n";
$category = Category::find($categoryId);
if ($category) {
    echo "   ✓ Category Found: {$category->name}\n";
} else {
    echo "   ✗ Category NOT Found\n";
    exit(1);
}

echo "\n2. Raw Product Query (No Filters):\n";
$rawProducts = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
    ->where('product_categories.category_id', $categoryId)
    ->select('products.*')
    ->get();
echo "   Found: {$rawProducts->count()} products\n";

foreach ($rawProducts as $product) {
    echo "   - Product ID: {$product->id}\n";
    echo "     Status: {$product->status}\n";
    echo "     Visible Individually: " . ($product->visible_individually ?? 'NULL') . "\n";
    echo "     Vendor ID: " . ($product->vendor_id ?? 'NULL') . "\n";
    echo "     Approved by Admin: " . ($product->approved_by_admin ?? 'NULL') . "\n";
}

echo "\n3. Testing with Active Scope:\n";
$activeProducts = Product::active()
    ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
    ->where('product_categories.category_id', $categoryId)
    ->select('products.*')
    ->get();
echo "   Found: {$activeProducts->count()} products\n";

echo "\n4. Testing with ForShop Scope:\n";
$shopProducts = Product::forShop()
    ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
    ->where('product_categories.category_id', $categoryId)
    ->select('products.*')
    ->get();
echo "   Found: {$shopProducts->count()} products\n";

echo "\n5. Checking Product Flat Table:\n";
$flatProducts = DB::table('product_flat')
    ->join('product_categories', 'product_flat.product_id', '=', 'product_categories.product_id')
    ->where('product_categories.category_id', $categoryId)
    ->where('product_flat.locale', 'ar')
    ->where('product_flat.channel', 'default')
    ->select('product_flat.*')
    ->get();
echo "   Found: {$flatProducts->count()} products in flat table\n";

foreach ($flatProducts as $flat) {
    echo "   - Product ID: {$flat->product_id}, Name: {$flat->name}, Price: {$flat->price}\n";
}

echo "\n6. Recommended Fix:\n";
echo "   The controller should use Product::forShop() scope\n";
echo "   OR manually filter: status=1, visible_individually=1, approved_by_admin=1\n";

echo "\n=== Diagnostic Complete ===\n";
