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
        // Ensure products table has all required columns
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'status')) {
                    $table->boolean('status')->default(1)->after('type');
                }
                if (!Schema::hasColumn('products', 'visibility')) {
                    $table->integer('visibility')->default(4)->after('status');
                }
            });
        }

        // Ensure product_flat table exists for frontend queries
        if (!Schema::hasTable('product_flat')) {
            Schema::create('product_flat', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sku');
                $table->string('name')->nullable();
                $table->text('description')->nullable();
                $table->text('short_description')->nullable();
                $table->string('url_key')->nullable();
                $table->boolean('new')->default(0);
                $table->boolean('featured')->default(0);
                $table->boolean('status')->default(1);
                $table->integer('visibility')->default(4);
                $table->decimal('price', 12, 4)->default(0);
                $table->decimal('special_price', 12, 4)->nullable();
                $table->date('special_price_from')->nullable();
                $table->date('special_price_to')->nullable();
                $table->decimal('weight', 12, 4)->default(0);
                $table->integer('color')->nullable();
                $table->integer('size')->nullable();
                $table->string('locale');
                $table->string('channel');
                $table->integer('product_id')->unsigned();
                $table->integer('parent_id')->unsigned()->nullable();
                $table->timestamps();

                $table->unique(['product_id', 'channel', 'locale']);
                $table->index(['product_id']);
                $table->index(['parent_id']);
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            });
        }

        // Seed basic product data if products exist but are missing required attributes
        $this->seedProductData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't drop existing tables in down method to prevent data loss
    }

    /**
     * Seed basic product data
     */
    private function seedProductData(): void
    {
        // Update existing products to have proper status
        DB::table('products')->whereNull('status')->update(['status' => 1]);
        
        // Ensure products have basic attribute values
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            // Check if product has name attribute
            $hasName = DB::table('product_attribute_values')
                ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
                ->where('product_attribute_values.product_id', $product->id)
                ->where('attributes.code', 'name')
                ->exists();
                
            if (!$hasName) {
                $nameAttribute = DB::table('attributes')->where('code', 'name')->first();
                if ($nameAttribute) {
                    DB::table('product_attribute_values')->insert([
                        'product_id' => $product->id,
                        'attribute_id' => $nameAttribute->id,
                        'locale' => 'en',
                        'channel' => 'default',
                        'text_value' => 'Product ' . $product->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            
            // Check if product has status attribute
            $hasStatus = DB::table('product_attribute_values')
                ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
                ->where('product_attribute_values.product_id', $product->id)
                ->where('attributes.code', 'status')
                ->exists();
                
            if (!$hasStatus) {
                $statusAttribute = DB::table('attributes')->where('code', 'status')->first();
                if ($statusAttribute) {
                    DB::table('product_attribute_values')->insert([
                        'product_id' => $product->id,
                        'attribute_id' => $statusAttribute->id,
                        'locale' => 'en',
                        'channel' => 'default',
                        'boolean_value' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
};