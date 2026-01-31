<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create products table if it doesn't exist
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sku')->unique();
                $table->string('type')->default('booking');
                $table->integer('parent_id')->unsigned()->nullable();
                $table->integer('attribute_family_id')->unsigned()->default(1);
                $table->boolean('status')->default(1);
                $table->integer('visibility')->default(4);
                $table->json('additional')->nullable();
                $table->timestamps();

                $table->index(['status', 'visibility']);
                $table->index(['type']);
            });
        }

        // Create product_attribute_values table if missing
        if (!Schema::hasTable('product_attribute_values')) {
            Schema::create('product_attribute_values', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->unsigned();
                $table->integer('attribute_id')->unsigned();
                $table->string('locale')->nullable();
                $table->string('channel')->nullable();
                $table->text('text_value')->nullable();
                $table->boolean('boolean_value')->nullable();
                $table->integer('integer_value')->nullable();
                $table->decimal('float_value', 12, 4)->nullable();
                $table->datetime('datetime_value')->nullable();
                $table->date('date_value')->nullable();
                $table->json('json_value')->nullable();
                $table->string('unique_id')->nullable();
                $table->timestamps();

                $table->index(['product_id', 'attribute_id']);
                $table->index(['attribute_id']);
            });
        }

        // Create product_inventories table if missing
        if (!Schema::hasTable('product_inventories')) {
            Schema::create('product_inventories', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('qty')->default(0);
                $table->integer('product_id')->unsigned();
                $table->integer('inventory_source_id')->unsigned()->default(1);
                $table->integer('vendor_id')->default(0);
                $table->timestamps();

                $table->unique(['product_id', 'inventory_source_id', 'vendor_id']);
                $table->index(['product_id']);
            });
        }

        // Create product_price_indices table if missing
        if (!Schema::hasTable('product_price_indices')) {
            Schema::create('product_price_indices', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->unsigned();
                $table->integer('customer_group_id')->unsigned()->default(1);
                $table->integer('channel_id')->unsigned()->default(1);
                $table->decimal('min_price', 12, 4)->default(0);
                $table->decimal('regular_min_price', 12, 4)->default(0);
                $table->decimal('max_price', 12, 4)->default(0);
                $table->decimal('regular_max_price', 12, 4)->default(0);
                $table->timestamps();

                $table->unique(['product_id', 'customer_group_id', 'channel_id']);
                $table->index(['product_id']);
            });
        }

        // Sync booking products to products table
        $this->syncBookingProducts();
    }

    /**
     * Sync booking products to main products table
     */
    private function syncBookingProducts(): void
    {
        if (Schema::hasTable('booking_products')) {
            $bookingProducts = DB::table('booking_products')->get();
            
            foreach ($bookingProducts as $booking) {
                // Check if product already exists
                $existingProduct = DB::table('products')->where('id', $booking->product_id)->first();
                
                if (!$existingProduct) {
                    // Create product entry
                    DB::table('products')->insert([
                        'id' => $booking->product_id,
                        'sku' => 'BOOKING-' . $booking->id,
                        'type' => $booking->type ?? 'booking',
                        'status' => 1,
                        'visibility' => 4,
                        'attribute_family_id' => 1,
                        'created_at' => $booking->created_at ?? now(),
                        'updated_at' => $booking->updated_at ?? now(),
                    ]);

                    // Create basic inventory
                    DB::table('product_inventories')->insert([
                        'qty' => 999,
                        'product_id' => $booking->product_id,
                        'inventory_source_id' => 1,
                        'vendor_id' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Create basic price index
                    DB::table('product_price_indices')->insert([
                        'product_id' => $booking->product_id,
                        'customer_group_id' => 1,
                        'channel_id' => 1,
                        'min_price' => $booking->price ?? 10.00,
                        'regular_min_price' => $booking->price ?? 10.00,
                        'max_price' => $booking->price ?? 10.00,
                        'regular_max_price' => $booking->price ?? 10.00,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Create name attribute if attributes table exists
                    if (Schema::hasTable('attributes')) {
                        $nameAttribute = DB::table('attributes')->where('code', 'name')->first();
                        if ($nameAttribute) {
                            DB::table('product_attribute_values')->insert([
                                'product_id' => $booking->product_id,
                                'attribute_id' => $nameAttribute->id,
                                'locale' => 'en',
                                'channel' => 'default',
                                'text_value' => 'Booking Product ' . $booking->id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't drop tables in down to prevent data loss
    }
};