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
        // Create URL mappings for existing products
        $this->createUrlMappings();
        
        // Ensure product flat table has proper data
        $this->populateProductFlat();
        
        // Create missing attribute values
        $this->createMissingAttributes();
    }

    /**
     * Create URL mappings for products
     */
    private function createUrlMappings(): void
    {
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            // Create URL key attribute if missing
            $urlKeyAttribute = DB::table('attributes')->where('code', 'url_key')->first();
            if (!$urlKeyAttribute) {
                $urlKeyAttribute = DB::table('attributes')->insertGetId([
                    'code' => 'url_key',
                    'admin_name' => 'URL Key',
                    'type' => 'text',
                    'is_required' => 1,
                    'is_unique' => 1,
                    'validation' => null,
                    'value_per_locale' => 0,
                    'value_per_channel' => 0,
                    'is_filterable' => 0,
                    'is_configurable' => 0,
                    'is_user_defined' => 1,
                    'is_visible_on_front' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $urlKeyAttribute = $urlKeyAttribute->id;
            }

            // Check if URL key already exists
            $existingUrlKey = DB::table('product_attribute_values')
                ->where('product_id', $product->id)
                ->where('attribute_id', $urlKeyAttribute)
                ->first();

            if (!$existingUrlKey) {
                // Generate URL key from SKU
                $urlKey = strtolower($product->sku) . '-' . $product->id;
                
                DB::table('product_attribute_values')->insert([
                    'product_id' => $product->id,
                    'attribute_id' => $urlKeyAttribute,
                    'locale' => 'en',
                    'channel' => 'default',
                    'text_value' => $urlKey,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Populate product flat table
     */
    private function populateProductFlat(): void
    {
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            // Get product attributes
            $name = DB::table('product_attribute_values')
                ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
                ->where('product_attribute_values.product_id', $product->id)
                ->where('attributes.code', 'name')
                ->value('text_value') ?? 'Product ' . $product->id;

            $urlKey = DB::table('product_attribute_values')
                ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
                ->where('product_attribute_values.product_id', $product->id)
                ->where('attributes.code', 'url_key')
                ->value('text_value') ?? strtolower($product->sku) . '-' . $product->id;

            $price = DB::table('product_price_indices')
                ->where('product_id', $product->id)
                ->value('min_price') ?? 25.00;

            // Check if visibility column exists
            $hasVisibility = Schema::hasColumn('product_flat', 'visibility');
            
            $data = [
                'sku' => $product->sku,
                'name' => $name,
                'url_key' => $urlKey,
                'status' => $product->status ?? 1,
                'price' => $price,
                'created_at' => $product->created_at ?? now(),
                'updated_at' => now(),
            ];
            
            if ($hasVisibility) {
                $data['visibility'] = 4;
            }

            // Insert or update product flat
            DB::table('product_flat')->updateOrInsert(
                [
                    'product_id' => $product->id,
                    'locale' => 'en',
                    'channel' => 'default'
                ],
                $data
            );
        }
    }

    /**
     * Create missing essential attributes
     */
    private function createMissingAttributes(): void
    {
        $essentialAttributes = [
            'name' => ['admin_name' => 'Name', 'type' => 'text'],
            'description' => ['admin_name' => 'Description', 'type' => 'textarea'],
            'short_description' => ['admin_name' => 'Short Description', 'type' => 'textarea'],
            'status' => ['admin_name' => 'Status', 'type' => 'boolean'],
            'url_key' => ['admin_name' => 'URL Key', 'type' => 'text'],
        ];

        foreach ($essentialAttributes as $code => $config) {
            $exists = DB::table('attributes')->where('code', $code)->exists();
            
            if (!$exists) {
                DB::table('attributes')->insert([
                    'code' => $code,
                    'admin_name' => $config['admin_name'],
                    'type' => $config['type'],
                    'is_required' => $code === 'name' ? 1 : 0,
                    'is_unique' => $code === 'url_key' ? 1 : 0,
                    'validation' => null,
                    'value_per_locale' => 1,
                    'value_per_channel' => 1,
                    'is_filterable' => 0,
                    'is_configurable' => 0,
                    'is_user_defined' => 1,
                    'is_visible_on_front' => $code === 'name' ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't drop data in down method
    }
};