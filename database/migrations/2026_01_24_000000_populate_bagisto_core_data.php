<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Populate product_flat from booking_products
        $bookingProducts = DB::table('booking_products')->get();
        
        foreach ($bookingProducts as $booking) {
            DB::table('product_flat')->updateOrInsert(
                ['product_id' => $booking->id],
                [
                    'sku' => $booking->sku,
                    'name' => $booking->name,
                    'description' => $booking->description,
                    'short_description' => $booking->short_description,
                    'url_key' => $booking->url_key,
                    'price' => 25.00,
                    'status' => 1,
                    'visible_individually' => 1,
                    'locale' => 'en',
                    'channel' => 'default',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        // Ensure attribute values exist
        DB::table('product_attribute_values')->updateOrInsert(
            ['product_id' => 1, 'attribute_id' => 1],
            ['text_value' => 'Simple', 'locale' => 'en', 'channel' => 'default']
        );
    }

    public function down()
    {
        DB::table('product_flat')->whereIn('product_id', [1, 2, 3])->delete();
    }
};