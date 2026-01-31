#!/usr/bin/env php
<?php

/**
 * Script لإصلاح المنتجات الجديدة من التجار
 * يقوم بـ:
 * 1. الموافقة على المنتج
 * 2. تحديث product_flat
 * 3. إنشاء price indices
 * 4. التحقق من inventory indices
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Webkul\Product\Models\Product;

echo "=== إصلاح المنتجات الجديدة ===" . PHP_EOL . PHP_EOL;

// الحصول على المنتجات التي تحتاج إصلاح
$products = Product::where('vendor_id', '!=', null)
    ->where('approved_by_admin', false)
    ->get();

if ($products->isEmpty()) {
    echo "✅ لا توجد منتجات تحتاج إصلاح" . PHP_EOL;
    exit(0);
}

echo "وجدت " . $products->count() . " منتج يحتاج إصلاح" . PHP_EOL . PHP_EOL;

foreach ($products as $product) {
    echo "معالجة المنتج #" . $product->id . " - " . $product->sku . PHP_EOL;
    
    // 1. الموافقة على المنتج
    $product->approved_by_admin = true;
    $product->status = 1;
    $product->save();
    echo "  ✅ تمت الموافقة على المنتج" . PHP_EOL;
    
    // 2. تحديث product_flat
    $name = DB::table('product_attribute_values')
        ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
        ->where('product_attribute_values.product_id', $product->id)
        ->where('attributes.code', 'name')
        ->value('text_value') ?? 'Product ' . $product->id;
    
    DB::table('product_flat')
        ->where('product_id', $product->id)
        ->update([
            'name' => $name,
            'status' => 1,
        ]);
    echo "  ✅ تم تحديث product_flat" . PHP_EOL;
    
    // 3. إنشاء price index إذا لم يكن موجود
    $priceExists = DB::table('product_price_indices')
        ->where('product_id', $product->id)
        ->exists();
    
    if (!$priceExists) {
        $price = $product->price ?? 0;
        DB::table('product_price_indices')->insert([
            'product_id' => $product->id,
            'customer_group_id' => 1,
            'channel_id' => 1,
            'min_price' => $price,
            'regular_min_price' => $price,
            'max_price' => $price,
            'regular_max_price' => $price,
        ]);
        echo "  ✅ تم إنشاء price index" . PHP_EOL;
    }
    
    // 4. التحقق من inventory index
    $invExists = DB::table('product_inventory_indices')
        ->where('product_id', $product->id)
        ->exists();
    
    if (!$invExists) {
        $qty = DB::table('product_inventories')
            ->where('product_id', $product->id)
            ->sum('qty');
        
        DB::table('product_inventory_indices')->insert([
            'product_id' => $product->id,
            'channel_id' => 1,
            'qty' => $qty,
        ]);
        echo "  ✅ تم إنشاء inventory index" . PHP_EOL;
    }
    
    echo "  ✅ المنتج جاهز للعرض في الموقع" . PHP_EOL . PHP_EOL;
}

echo "=== تم الانتهاء ===" . PHP_EOL;
echo "✅ تم إصلاح " . $products->count() . " منتج بنجاح" . PHP_EOL;
