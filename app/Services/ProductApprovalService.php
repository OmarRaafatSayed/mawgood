<?php

namespace App\Services;

use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductApprovalService
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected AttributeRepository $attributeRepository
    ) {}

    /**
     * Approve vendor product and auto-fill required fields
     */
    public function approveProduct(int $productId): bool
    {
        try {
            DB::beginTransaction();

            // Update directly in products table
            DB::table('products')
                ->where('id', $productId)
                ->update([
                    'approved_by_admin' => 1,
                    'status' => 1,
                ]);

            $product = $this->productRepository->find($productId);

            // Auto-fill required attribute values
            $this->autoFillRequiredAttributes($product);
            
            // Refresh product flat immediately
            $this->refreshProductFlat($productId);
            
            // Force update product_flat to ensure visibility
            DB::table('product_flat')
                ->where('product_id', $productId)
                ->update([
                    'status' => 1,
                    'visible_individually' => 1,
                ]);

            DB::commit();
            
            // Clear cache immediately after commit
            \Cache::forget('products');
            \Cache::forget('product_flat');
            \Artisan::call('cache:clear');

            Log::info("Product #{$productId} approved and published successfully");

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Failed to approve product #{$productId}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Auto-fill required attributes for product visibility
     */
    protected function autoFillRequiredAttributes($product): void
    {
        $requiredAttributes = [
            'status' => [
                'type' => 'boolean',
                'value' => 1,
                'column' => 'boolean_value'
            ],
            'visible_individually' => [
                'type' => 'boolean',
                'value' => 1,
                'column' => 'boolean_value'
            ],
            'guest_checkout' => [
                'type' => 'boolean',
                'value' => 1,
                'column' => 'boolean_value'
            ],
            'weight' => [
                'type' => 'text',
                'value' => '1',
                'column' => 'text_value'
            ],
        ];

        foreach ($requiredAttributes as $attributeCode => $config) {
            $this->setAttributeValue($product, $attributeCode, $config);
        }

        // Ensure description exists
        $this->ensureDescriptionExists($product);
    }

    /**
     * Set attribute value for product
     */
    protected function setAttributeValue($product, string $attributeCode, array $config): void
    {
        $attribute = $this->attributeRepository->findOneByField('code', $attributeCode);

        if (!$attribute) {
            Log::warning("Attribute {$attributeCode} not found");
            return;
        }

        $channels = core()->getAllChannels();
        $locales = core()->getAllLocales();

        foreach ($channels as $channel) {
            foreach ($locales as $locale) {
                $data = [
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $channel->code : null,
                    'locale' => $attribute->value_per_locale ? $locale->code : null,
                ];

                $existingValue = $this->productAttributeValueRepository
                    ->where($data)
                    ->first();

                // Only set if doesn't exist OR if it's status/visible_individually (force enable on approval)
                if (!$existingValue) {
                    $data[$config['column']] = $config['value'];
                    $this->productAttributeValueRepository->create($data);
                } elseif (in_array($attributeCode, ['status', 'visible_individually'])) {
                    // Force enable these on approval
                    $existingValue->update([$config['column'] => $config['value']]);
                }
                // For other attributes (weight, description, etc), keep vendor's values
            }
        }
    }

    /**
     * Ensure product has description
     */
    protected function ensureDescriptionExists($product): void
    {
        $attribute = $this->attributeRepository->findOneByField('code', 'description');

        if (!$attribute) {
            return;
        }

        $channels = core()->getAllChannels();
        $locales = core()->getAllLocales();

        foreach ($channels as $channel) {
            foreach ($locales as $locale) {
                $data = [
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $channel->code : null,
                    'locale' => $attribute->value_per_locale ? $locale->code : null,
                ];

                $existingValue = $this->productAttributeValueRepository
                    ->where($data)
                    ->first();

                // Only create default if vendor didn't provide one
                if (!$existingValue || empty($existingValue->text_value)) {
                    $defaultDescription = $product->name 
                        ? "وصف المنتج: {$product->name}" 
                        : "منتج معتمد من قبل الإدارة";

                    if (!$existingValue) {
                        $data['text_value'] = $defaultDescription;
                        $this->productAttributeValueRepository->create($data);
                    } else {
                        $existingValue->update(['text_value' => $defaultDescription]);
                    }
                }
                // If vendor provided description, keep it
            }
        }
    }

    /**
     * Reject vendor product
     */
    public function rejectProduct(int $productId, ?string $reason = null): bool
    {
        try {
            DB::beginTransaction();

            // Update directly in products table
            DB::table('products')
                ->where('id', $productId)
                ->update([
                    'approved_by_admin' => 0,
                    'status' => 0,
                ]);

            // Set visible_individually to false
            $this->setProductVisibility($productId, false);
            
            // Update product_flat
            DB::table('product_flat')
                ->where('product_id', $productId)
                ->update([
                    'status' => 0,
                    'visible_individually' => 0,
                ]);

            DB::commit();

            Log::info("Product #{$productId} rejected" . ($reason ? ": {$reason}" : ""));

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Failed to reject product #{$productId}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Set product visibility
     */
    protected function setProductVisibility(int $productId, bool $visible): void
    {
        $attribute = $this->attributeRepository->findOneByField('code', 'visible_individually');

        if (!$attribute) {
            return;
        }

        $product = $this->productRepository->find($productId);
        $channels = core()->getAllChannels();
        $locales = core()->getAllLocales();

        foreach ($channels as $channel) {
            foreach ($locales as $locale) {
                $data = [
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $channel->code : null,
                    'locale' => $attribute->value_per_locale ? $locale->code : null,
                ];

                $existingValue = $this->productAttributeValueRepository
                    ->where($data)
                    ->first();

                if ($existingValue) {
                    $existingValue->update(['boolean_value' => $visible]);
                } else {
                    $data['boolean_value'] = $visible;
                    $this->productAttributeValueRepository->create($data);
                }
            }
        }
    }
    
    /**
     * Refresh product flat table
     */
    protected function refreshProductFlat(int $productId): void
    {
        $product = $this->productRepository->find($productId);
        
        $attributes = $this->productAttributeValueRepository
            ->where('product_id', $productId)
            ->get();
        
        $channels = core()->getAllChannels();
        $locales = core()->getAllLocales();
        
        foreach ($channels as $channel) {
            foreach ($locales as $locale) {
                $flatData = [
                    'product_id' => $product->id,
                    'sku' => $product->sku,
                    'type' => $product->type,
                    'attribute_family_id' => $product->attribute_family_id,
                    'channel' => $channel->code,
                    'locale' => $locale->code,
                    'status' => 1,
                    'visible_individually' => 1,
                ];
                
                foreach ($attributes as $attr) {
                    $attribute = $this->attributeRepository->find($attr->attribute_id);
                    if (!$attribute) continue;
                    
                    if ($attribute->code == 'name') {
                        $flatData['name'] = $attr->text_value;
                    } elseif ($attribute->code == 'price') {
                        $flatData['price'] = $attr->float_value;
                    } elseif ($attribute->code == 'url_key') {
                        $flatData['url_key'] = $attr->text_value;
                    } elseif ($attribute->code == 'description') {
                        $flatData['description'] = $attr->text_value;
                    }
                }
                
                $flatData['name'] = $flatData['name'] ?? "Product {$product->id}";
                $flatData['url_key'] = $flatData['url_key'] ?? "product-{$product->id}";
                
                DB::table('product_flat')
                    ->updateOrInsert(
                        [
                            'product_id' => $product->id,
                            'channel' => $channel->code,
                            'locale' => $locale->code,
                        ],
                        $flatData
                    );
            }
        }
    }
}
