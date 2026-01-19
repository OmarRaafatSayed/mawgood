<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Fixing Vendor Products Attribute Values ===\n\n";

// Get required attributes
$nameAttr = \Webkul\Attribute\Models\Attribute::where('code', 'name')->first();
$statusAttr = \Webkul\Attribute\Models\Attribute::where('code', 'status')->first();
$visibleAttr = \Webkul\Attribute\Models\Attribute::where('code', 'visible_individually')->first();
$urlKeyAttr = \Webkul\Attribute\Models\Attribute::where('code', 'url_key')->first();
$shortDescAttr = \Webkul\Attribute\Models\Attribute::where('code', 'short_description')->first();
$descAttr = \Webkul\Attribute\Models\Attribute::where('code', 'description')->first();
$priceAttr = \Webkul\Attribute\Models\Attribute::where('code', 'price')->first();

echo "Attribute IDs:\n";
echo "- name: " . ($nameAttr->id ?? 'NOT FOUND') . "\n";
echo "- status: " . ($statusAttr->id ?? 'NOT FOUND') . "\n";
echo "- visible_individually: " . ($visibleAttr->id ?? 'NOT FOUND') . "\n";
echo "- url_key: " . ($urlKeyAttr->id ?? 'NOT FOUND') . "\n";
echo "- price: " . ($priceAttr->id ?? 'NOT FOUND') . "\n\n";

// Get default channel and locale
$channel = \Webkul\Core\Models\Channel::first();
$locale = \Webkul\Core\Models\Locale::where('code', 'ar')->first() ?: \Webkul\Core\Models\Locale::first();

echo "Channel: {$channel->code}, Locale: {$locale->code}\n\n";

// Get vendor products
$products = \Webkul\Product\Models\Product::where('vendor_id', '>', 0)->get();

foreach ($products as $product) {
    echo "--- Product ID: {$product->id} ---\n";
    
    // Get vendor info
    $vendor = \App\Models\Vendor::find($product->vendor_id);
    $vendorName = $vendor ? $vendor->store_name : 'Unknown Vendor';
    
    $productName = "منتج من متجر {$vendorName}";
    $urlKey = 'product-' . $product->id . '-' . time();
    
    // Check and create attribute values
    $attrs = [
        ['attr' => $nameAttr, 'value' => $productName, 'type' => 'text'],
        ['attr' => $statusAttr, 'value' => 1, 'type' => 'boolean'],
        ['attr' => $visibleAttr, 'value' => 1, 'type' => 'boolean'],
        ['attr' => $urlKeyAttr, 'value' => $urlKey, 'type' => 'text'],
        ['attr' => $shortDescAttr, 'value' => 'منتج مصري محلي', 'type' => 'text'],
        ['attr' => $descAttr, 'value' => 'منتج مصري محلي من صانع مصري', 'type' => 'text'],
        ['attr' => $priceAttr, 'value' => 100.00, 'type' => 'float'],
    ];
    
    foreach ($attrs as $item) {
        if (!$item['attr']) continue;
        
        $exists = \DB::table('product_attribute_values')
            ->where('product_id', $product->id)
            ->where('attribute_id', $item['attr']->id)
            ->first();
        
        $column = match($item['type']) {
            'text' => 'text_value',
            'boolean' => 'boolean_value',
            'integer' => 'integer_value',
            'float' => 'float_value',
            default => 'text_value'
        };
        
        $insertData = [
            'product_id' => $product->id,
            'attribute_id' => $item['attr']->id,
            'locale' => in_array($item['attr']->code, ['name', 'short_description', 'description']) ? $locale->code : null,
            'channel' => in_array($item['attr']->code, ['name', 'short_description', 'description']) ? $channel->code : null,
            $column => $item['value'],
        ];
        
        if ($exists) {
            \DB::table('product_attribute_values')
                ->where('id', $exists->id)
                ->update([$column => $item['value']]);
            echo "  Updated {$item['attr']->code}\n";
        } else {
            \DB::table('product_attribute_values')->insert($insertData);
            echo "  Created {$item['attr']->code}\n";
        }
    }
    
    echo "\n";
}

echo "=== Running Full Indexer ===\n";
\Artisan::call('indexer:index', ['--type' => ['flat', 'price', 'inventory'], '--mode' => ['full']]);

echo "=== Final Verification ===\n";
$products = \Webkul\Product\Models\Product::where('vendor_id', '>', 0)->get();
foreach ($products as $product) {
    $flat = \DB::table('product_flat')->where('product_id', $product->id)->first();
    echo "Product {$product->id}: Name=" . ($flat->name ?? 'NULL') . " Status=" . ($flat->status ?? 'NULL') . " Visible=" . ($flat->visible_individually ?? 'NULL') . "\n";
}

$searchable = \Webkul\Product\Models\ProductFlat::where('status', 1)
    ->where('visible_individually', 1)
    ->count();
echo "\nSearchable products: {$searchable}\n";
