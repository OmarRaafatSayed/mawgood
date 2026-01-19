<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Status Attribute Check ===\n\n";

$statusAttr = \Webkul\Attribute\Models\Attribute::where('code', 'status')->first();
echo "Status Attribute:\n";
echo "  ID: {$statusAttr->id}\n";
echo "  Type: {$statusAttr->type}\n\n";

// Check existing value
$val = \DB::table('product_attribute_values')
    ->where('product_id', 1284)
    ->where('attribute_id', $statusAttr->id)
    ->first();

echo "Current value row:\n";
print_r($val);

// Fix: status is usually 'boolean' type but should use boolean_value column
echo "\n=== Fixing Status Values ===\n";

$products = \Webkul\Product\Models\Product::where('vendor_id', '>', 0)->get();

foreach ($products as $product) {
    // Delete existing and recreate with correct column
    \DB::table('product_attribute_values')
        ->where('product_id', $product->id)
        ->where('attribute_id', $statusAttr->id)
        ->delete();
    
    \DB::table('product_attribute_values')->insert([
        'product_id' => $product->id,
        'attribute_id' => $statusAttr->id,
        'locale' => null,
        'channel' => null,
        'boolean_value' => 1,  // true = enabled
    ]);
    
    echo "Fixed status for product {$product->id}\n";
}

// Run indexer
echo "\n=== Running Indexer ===\n";
\Artisan::call('indexer:index', ['--type' => ['flat'], '--mode' => ['full']]);

// Verify
echo "\n=== Final Check ===\n";
foreach ($products as $product) {
    $flat = \DB::table('product_flat')->where('product_id', $product->id)->first();
    echo "Product {$product->id}: Status=" . ($flat->status ?? 'NULL') . "\n";
}

$searchable = \DB::table('product_flat')
    ->where('status', 1)
    ->where('visible_individually', 1)
    ->count();
echo "\nSearchable products: {$searchable}\n";
