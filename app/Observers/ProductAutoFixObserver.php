<?php

namespace App\Observers;

use Webkul\Product\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductAutoFixObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        // Run after transaction commits to avoid loops
        DB::afterCommit(function () use ($product) {
            $this->autoFix($product);
        });
    }

    /**
     * Auto-fix product to ensure it's ready for display
     */
    protected function autoFix(Product $product): void
    {
        // Skip if already processing
        if ($product->wasRecentlyCreated === false) {
            return;
        }

        // 1. Auto-approve vendor products
        if ($product->vendor_id && !$product->approved_by_admin) {
            DB::table('products')
                ->where('id', $product->id)
                ->update(['approved_by_admin' => true]);
        }

        // 2. Ensure visible_individually is set
        DB::table('product_attribute_values')
            ->where('product_id', $product->id)
            ->where('attribute_id', 7)
            ->update(['boolean_value' => 1]);

        // 3. Create price index if missing
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

        // 4. Create inventory index if missing
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
