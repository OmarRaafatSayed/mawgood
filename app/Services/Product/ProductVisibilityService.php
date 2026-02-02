<?php

namespace App\Services\Product;

use Webkul\Product\Models\Product;

class ProductVisibilityService
{
    /**
     * Check if product is visible in frontend
     */
    public function isVisibleInFrontend(Product $product): bool
    {
        // الشرط الأساسي: status = ACTIVE
        if ($product->status != 1) {
            return false;
        }

        // يجب أن يكون مرئي بشكل مستقل
        if (!$product->visible_individually) {
            return false;
        }

        // يجب أن يكون له url_key
        if (empty($product->url_key)) {
            return false;
        }

        // يجب أن يكون له اسم
        if (empty($product->name)) {
            return false;
        }

        // يجب أن يكون موافق عليه (للتجار فقط)
        if (!$this->isApproved($product)) {
            return false;
        }

        return true;
    }

    /**
     * Check if product is approved
     */
    public function isApproved(Product $product): bool
    {
        // المنتجات من الأدمن لا تحتاج موافقة
        if (!$product->vendor_id) {
            return true;
        }

        // منتجات التجار تحتاج موافقة
        return $product->approved_by_admin == 1;
    }

    /**
     * Get visibility requirements for a product
     */
    public function getVisibilityRequirements(Product $product): array
    {
        return [
            'status' => [
                'required' => true,
                'current' => $product->status,
                'valid' => $product->status == 1,
                'message' => 'يجب أن يكون المنتج نشط (status = 1)',
            ],
            'visible_individually' => [
                'required' => true,
                'current' => $product->visible_individually,
                'valid' => $product->visible_individually == 1,
                'message' => 'يجب أن يكون المنتج مرئي بشكل مستقل',
            ],
            'url_key' => [
                'required' => true,
                'current' => $product->url_key,
                'valid' => !empty($product->url_key),
                'message' => 'يجب أن يكون للمنتج رابط (URL Key)',
            ],
            'name' => [
                'required' => true,
                'current' => $product->name,
                'valid' => !empty($product->name),
                'message' => 'يجب أن يكون للمنتج اسم',
            ],
            'approved_by_admin' => [
                'required' => $product->vendor_id ? true : false,
                'current' => $product->approved_by_admin,
                'valid' => $this->isApproved($product),
                'message' => 'يجب أن يكون المنتج موافق عليه من الأدمن (للتجار فقط)',
            ],
        ];
    }

    /**
     * Get missing requirements for product visibility
     */
    public function getMissingRequirements(Product $product): array
    {
        $requirements = $this->getVisibilityRequirements($product);
        
        return array_filter($requirements, function($req) {
            return $req['required'] && !$req['valid'];
        });
    }

    /**
     * Check if product has valid price
     */
    public function hasValidPrice(Product $product): bool
    {
        return $product->price_indices()
            ->where('channel_id', core()->getCurrentChannel()->id)
            ->exists();
    }

    /**
     * Check if product has valid inventory
     */
    public function hasValidInventory(Product $product): bool
    {
        return $product->inventory_indices()
            ->where('channel_id', core()->getCurrentChannel()->id)
            ->where('qty', '>', 0)
            ->exists();
    }
}
