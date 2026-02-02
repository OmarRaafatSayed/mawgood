<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔄 Refreshing product_flat table...\n\n";

$products = DB::table('products')
    ->where('approved_by_admin', 1)
    ->where('status', 1)
    ->get();

echo "Found {$products->count()} approved products\n\n";

foreach ($products as $product) {
    echo "Processing product #{$product->id}...\n";
    
    // Get product attributes
    $attributes = DB::table('product_attribute_values')
        ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
        ->where('product_attribute_values.product_id', $product->id)
        ->select('attributes.code', 'product_attribute_values.*')
        ->get();
    
    $flatData = [
        'product_id' => $product->id,
        'sku' => $product->sku,
        'type' => $product->type,
        'attribute_family_id' => $product->attribute_family_id,
    ];
    
    // Get attribute values
    foreach ($attributes as $attr) {
        if ($attr->code == 'name') {
            $flatData['name'] = $attr->text_value;
        } elseif ($attr->code == 'price') {
            $flatData['price'] = $attr->float_value;
        } elseif ($attr->code == 'status') {
            $flatData['status'] = $attr->boolean_value;
        } elseif ($attr->code == 'visible_individually') {
            $flatData['visible_individually'] = $attr->boolean_value;
        } elseif ($attr->code == 'url_key') {
            $flatData['url_key'] = $attr->text_value;
        } elseif ($attr->code == 'description') {
            $flatData['description'] = $attr->text_value;
        }
        
        $flatData['channel'] = $attr->channel ?? 'default';
        $flatData['locale'] = $attr->locale ?? 'en';
    }
    
    // Set defaults if missing
    $flatData['channel'] = $flatData['channel'] ?? 'default';
    $flatData['locale'] = $flatData['locale'] ?? 'en';
    $flatData['status'] = $flatData['status'] ?? 1;
    $flatData['visible_individually'] = $flatData['visible_individually'] ?? 1;
    $flatData['name'] = $flatData['name'] ?? "Product {$product->id}";
    $flatData['url_key'] = $flatData['url_key'] ?? "product-{$product->id}";
    
    // Check if exists
    $exists = DB::table('product_flat')
        ->where('product_id', $product->id)
        ->where('channel', $flatData['channel'])
        ->where('locale', $flatData['locale'])
        ->first();
    
    if ($exists) {
        DB::table('product_flat')
            ->where('id', $exists->id)
            ->update($flatData);
        echo "  ✅ Updated\n";
    } else {
        DB::table('product_flat')->insert($flatData);
        echo "  ✅ Inserted\n";
    }
}

echo "\n🎉 Done! Product flat table refreshed.\n";
echo "\nNow run: php artisan cache:clear\n";
