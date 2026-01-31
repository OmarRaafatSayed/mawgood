<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Fix product in main products table
        DB::table('products')->updateOrInsert(['id' => 7], [
            'sku' => 'mntg-gdyd-1769725215',
            'type' => 'simple',
            'attribute_family_id' => 1,
            'status' => 1
        ]);

        // Fix product_attribute_values
        DB::table('product_attribute_values')->updateOrInsert(
            ['product_id' => 7, 'attribute_id' => 1],
            ['text_value' => 'simple', 'locale' => 'en', 'channel' => 'default']
        );

        // Fix product_inventories
        DB::table('product_inventories')->updateOrInsert(['product_id' => 7], [
            'qty' => 100,
            'vendor_id' => 0
        ]);
    }

    public function down() {}
};