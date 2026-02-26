<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestProductSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        $productId = DB::table('products')->insertGetId([
            'type' => 'simple',
            'attribute_family_id' => 1,
            'sku' => 'TEST-FURNITURE-001',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_flat')->insert([
            'product_id' => $productId,
            'sku' => 'TEST-FURNITURE-001',
            'name' => 'كنبة مودرن 3 مقاعد',
            'description' => 'كنبة عصرية مريحة بتصميم أنيق',
            'short_description' => 'كنبة مودرن مريحة',
            'url_key' => 'modern-sofa-3-seats',
            'price' => 4500.00,
            'status' => 1,
            'visible_individually' => 1,
            'locale' => 'ar',
            'channel' => 'default',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_categories')->insert([
            'product_id' => $productId,
            'category_id' => 9,
        ]);

        DB::table('product_inventories')->insert([
            'product_id' => $productId,
            'inventory_source_id' => 1,
            'vendor_id' => 0,
            'qty' => 10,
        ]);

        DB::table('product_images')->insert([
            'product_id' => $productId,
            'path' => 'product/1/placeholder.png',
            'type' => 'image',
            'position' => 1,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        $this->command->info('Test product created in Home Furniture category (ID: 9)');
    }
}
