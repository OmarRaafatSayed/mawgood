<?php

namespace Mawgood\Vendor\Services;

use Illuminate\Support\Facades\DB;
use Mawgood\Vendor\Models\Vendor;

class VendorProductService
{
    public function getProducts(Vendor $vendor, array $filters = [])
    {
        $query = DB::table('products')
            ->leftJoin('product_flat', function($join) {
                $join->on('products.id', '=', 'product_flat.product_id')
                     ->where('product_flat.locale', '=', core()->getRequestedLocaleCode())
                     ->where('product_flat.channel', '=', core()->getRequestedChannelCode());
            })
            ->where('products.vendor_id', $vendor->id)
            ->select(
                'products.id',
                'products.sku',
                'products.type',
                'products.created_at',
                'products.updated_at',
                'product_flat.name',
                'product_flat.price',
                'product_flat.status',
                'product_flat.description'
            );

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('products.sku', 'like', "%{$search}%")
                  ->orWhere('product_flat.name', 'like', "%{$search}%");
            });
        }

        if (isset($filters['status']) && $filters['status'] !== '') {
            $query->where('product_flat.status', $filters['status']);
        }

        return $query->orderBy('products.created_at', 'desc')->paginate(15);
    }

    public function createProduct(Vendor $vendor, array $data)
    {
        DB::beginTransaction();

        try {
            $sku = 'V' . strtoupper(uniqid());
            $urlKey = \Illuminate\Support\Str::slug($data['name']) . '-' . time();

            $productId = DB::table('products')->insertGetId([
                'sku' => $sku,
                'type' => 'simple',
                'attribute_family_id' => 1,
                'vendor_id' => $vendor->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (!$productId) {
                throw new \Exception('Failed to create product');
            }

            $productExists = DB::table('products')->where('id', $productId)->exists();
            if (!$productExists) {
                throw new \Exception('Product not found after insertion');
            }

            DB::table('product_inventories')->insert([
                'product_id' => $productId,
                'inventory_source_id' => 1,
                'vendor_id' => $vendor->id,
                'qty' => $data['quantity'] ?? 0,
            ]);

            foreach (['ar', 'en'] as $locale) {
                DB::table('product_flat')->insert([
                    'sku' => $sku,
                    'type' => 'simple',
                    'attribute_family_id' => 1,
                    'name' => $data['name'],
                    'description' => $data['description'] ?? '',
                    'url_key' => $urlKey,
                    'price' => $data['price'],
                    'weight' => $data['weight'] ?? null,
                    'status' => 0,
                    'locale' => $locale,
                    'channel' => 'default',
                    'product_id' => $productId,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'visible_individually' => 1,
                ]);
            }

            DB::table('product_categories')->insert([
                'product_id' => $productId,
                'category_id' => $data['category_id'],
            ]);

            DB::table('product_channels')->insert([
                'product_id' => $productId,
                'channel_id' => 1,
            ]);

            foreach (['ar', 'en'] as $locale) {
                DB::table('product_attribute_values')->insert([
                    'locale' => $locale,
                    'channel' => 'default',
                    'text_value' => $data['name'],
                    'product_id' => $productId,
                    'attribute_id' => 2,
                ]);
                
                DB::table('product_attribute_values')->insert([
                    'locale' => $locale,
                    'channel' => 'default',
                    'text_value' => $urlKey,
                    'product_id' => $productId,
                    'attribute_id' => 3,
                ]);
                
                DB::table('product_attribute_values')->insert([
                    'locale' => $locale,
                    'channel' => 'default',
                    'boolean_value' => 1,
                    'product_id' => $productId,
                    'attribute_id' => 7,
                ]);
                
                DB::table('product_attribute_values')->insert([
                    'locale' => $locale,
                    'channel' => 'default',
                    'boolean_value' => 0,
                    'product_id' => $productId,
                    'attribute_id' => 8,
                ]);
                
                DB::table('product_attribute_values')->insert([
                    'locale' => $locale,
                    'channel' => 'default',
                    'float_value' => $data['price'],
                    'product_id' => $productId,
                    'attribute_id' => 11,
                ]);
            }

            if (isset($data['images']) && is_array($data['images'])) {
                foreach ($data['images'] as $index => $image) {
                    if ($image && $image->isValid()) {
                        $path = $image->store('product', 'public');
                        DB::table('product_images')->insert([
                            'product_id' => $productId,
                            'path' => $path,
                            'type' => 'image',
                            'position' => $index + 1,
                        ]);
                    }
                }
            }

            if (isset($data['video']) && $data['video']->isValid()) {
                $videoPath = $data['video']->store('product/videos', 'public');
                DB::table('product_videos')->insert([
                    'product_id' => $productId,
                    'path' => $videoPath,
                    'type' => 'video',
                ]);
            }

            DB::commit();

            return $productId;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Product Creation Error: ' . $e->getMessage());
            \Log::error('Stack: ' . $e->getTraceAsString());
            throw $e;
        }
    }
}
