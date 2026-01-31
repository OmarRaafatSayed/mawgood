<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Check if product_flat entry exists before updating
        $exists = DB::table('product_flat')
            ->where('product_id', 7)
            ->where('locale', 'en')
            ->where('channel', 'default')
            ->exists();

        if ($exists) {
            DB::table('product_flat')
                ->where('product_id', 7)
                ->where('locale', 'en')
                ->where('channel', 'default')
                ->update([
                    'name' => 'منتج جيد - MNTG GDYD',
                    'description' => 'وصف المنتج الجيد',
                    'short_description' => 'وصف مختصر للمنتج',
                    'meta_title' => 'منتج جيد - MNTG GDYD',
                    'meta_description' => 'وصف المنتج الجيد',
                    'status' => 1,
                    'visible_individually' => 1,
                    'price' => 25.00,
                ]);
        }

        // Ensure product exists in main products table
        DB::table('products')->updateOrInsert(
            ['id' => 7],
            [
                'sku' => 'mntg-gdyd-1769725215',
                'type' => 'simple',
                'attribute_family_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }

    public function down()
    {
        // Rollback if needed
    }
};