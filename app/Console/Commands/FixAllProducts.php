<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webkul\Product\Models\Product;
use Illuminate\Support\Facades\DB;

class FixAllProducts extends Command
{
    protected $signature = 'products:fix-all';
    protected $description = 'إصلاح كل المنتجات تلقائياً';

    public function handle()
    {
        $this->info('🔧 بدء إصلاح المنتجات...');
        
        $products = Product::all();
        $fixed = 0;
        
        foreach ($products as $product) {
            $this->fixProduct($product);
            $fixed++;
        }
        
        $this->info("✅ تم إصلاح {$fixed} منتج بنجاح!");
        
        return 0;
    }

    protected function fixProduct(Product $product)
    {
        // 1. Auto-approve
        if ($product->vendor_id && !$product->approved_by_admin) {
            $product->update(['approved_by_admin' => true, 'status' => 1]);
        }

        // 2. Set visible_individually
        DB::table('product_attribute_values')
            ->where('product_id', $product->id)
            ->where('attribute_id', 7)
            ->update(['boolean_value' => 1]);

        // 3. Create price index
        if ($product->price) {
            DB::table('product_price_indices')->updateOrInsert(
                ['product_id' => $product->id, 'customer_group_id' => 1, 'channel_id' => 1],
                [
                    'min_price' => $product->price,
                    'regular_min_price' => $product->price,
                    'max_price' => $product->price,
                    'regular_max_price' => $product->price,
                ]
            );
        }

        // 4. Create inventory index
        $totalQty = DB::table('product_inventories')
            ->where('product_id', $product->id)
            ->sum('qty');

        DB::table('product_inventory_indices')->updateOrInsert(
            ['product_id' => $product->id, 'channel_id' => 1],
            ['qty' => $totalQty ?? 0]
        );

        // 5. Update product_flat
        DB::table('product_flat')
            ->where('product_id', $product->id)
            ->update([
                'visible_individually' => 1,
                'status' => $product->status,
            ]);
    }
}
