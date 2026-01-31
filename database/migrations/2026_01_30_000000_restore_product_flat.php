<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Clear existing flat data
        DB::table('product_flat')->truncate();
        
        // Get all products
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            // Get product name from booking_products or use SKU
            $bookingProduct = DB::table('booking_products')->where('id', $product->id)->first();
            $name = $bookingProduct->name ?? $product->sku;
            $description = $bookingProduct->description ?? '';
            $shortDescription = $bookingProduct->short_description ?? '';
            
            // Insert into product_flat for both locales
            foreach (['en', 'ar'] as $locale) {
                DB::table('product_flat')->insert([
                    'product_id' => $product->id,
                    'sku' => $product->sku,
                    'name' => $name,
                    'description' => $description,
                    'short_description' => $shortDescription,
                    'url_key' => $bookingProduct->url_key ?? $product->sku,
                    'price' => 25.00,
                    'status' => 1,
                    'visible_individually' => 1,
                    'locale' => $locale,
                    'channel' => 'default',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }

    public function down()
    {
        DB::table('product_flat')->truncate();
    }
};