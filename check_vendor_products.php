<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Vendor Products Diagnostic ===\n\n";

// Get vendor products
$products = \Webkul\Product\Models\Product::where('vendor_id', '>', 0)->get();

echo "Total vendor products: " . $products->count() . "\n\n";

foreach ($products as $product) {
    echo "--- Product ID: {$product->id} ---\n";
    echo "SKU: {$product->sku}\n";
    echo "Type: {$product->type}\n";
    echo "Vendor ID: {$product->vendor_id}\n";
    echo "Parent ID: " . ($product->parent_id ?? 'NULL') . "\n";
    
    // Check product_flat
    $flats = \DB::table('product_flat')->where('product_id', $product->id)->get();
    echo "Product Flat Records: " . $flats->count() . "\n";
    
    foreach ($flats as $flat) {
        echo "  - Channel: {$flat->channel}, Locale: {$flat->locale}\n";
        echo "    Name: " . ($flat->name ?? 'NULL') . "\n";
        echo "    Status: " . ($flat->status ?? 'NULL') . "\n";
        echo "    Visible Individually: " . ($flat->visible_individually ?? 'NULL') . "\n";
        echo "    URL Key: " . ($flat->url_key ?? 'NULL') . "\n";
    }
    
    // Check categories
    $categories = \DB::table('product_categories')->where('product_id', $product->id)->get();
    echo "Categories: " . $categories->count() . "\n";
    
    // Check inventory
    $inventory = \DB::table('product_inventories')->where('product_id', $product->id)->sum('qty');
    echo "Inventory Qty: " . $inventory . "\n";
    
    echo "\n";
}

// Check what search returns
echo "=== Search Query Test ===\n";
$searchProducts = \Webkul\Product\Models\ProductFlat::where('status', 1)
    ->where('visible_individually', 1)
    ->count();
echo "Searchable products (status=1, visible=1): {$searchProducts}\n";

