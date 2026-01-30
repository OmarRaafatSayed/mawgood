<?php

namespace App\Observers;

use Webkul\Product\Models\ProductInventory;
use Illuminate\Support\Facades\DB;

class ProductInventoryObserver
{
    public function created(ProductInventory $inventory)
    {
        $this->updateInventoryIndex($inventory);
    }

    public function updated(ProductInventory $inventory)
    {
        $this->updateInventoryIndex($inventory);
    }

    protected function updateInventoryIndex(ProductInventory $inventory)
    {
        $channels = DB::table('channel_inventory_sources')
            ->where('inventory_source_id', $inventory->inventory_source_id)
            ->pluck('channel_id');

        foreach ($channels as $channelId) {
            $totalQty = DB::table('product_inventories')
                ->join('channel_inventory_sources', 'product_inventories.inventory_source_id', '=', 'channel_inventory_sources.inventory_source_id')
                ->where('product_inventories.product_id', $inventory->product_id)
                ->where('channel_inventory_sources.channel_id', $channelId)
                ->sum('product_inventories.qty');

            DB::table('product_inventory_indices')->updateOrInsert(
                ['product_id' => $inventory->product_id, 'channel_id' => $channelId],
                ['qty' => $totalQty]
            );
        }
    }
}
