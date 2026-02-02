<?php

namespace App\Observers;

use Webkul\Product\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductApprovalObserver
{
    /**
     * Handle the Product "updated" event.
     * 
     * This observer watches for approval status changes
     */
    public function updated(Product $product): void
    {
        // Check if approved_by_admin was just changed to true
        if ($product->wasChanged('approved_by_admin') && $product->approved_by_admin) {
            Log::info("Product #{$product->id} approval detected via observer");
            
            // The service will handle the auto-fill logic
            // This is just for logging and potential future hooks
        }
    }

    /**
     * Handle the Product "creating" event.
     * 
     * Set default values for vendor products
     */
    public function creating(Product $product): void
    {
        // If product is created by vendor, set approved_by_admin to false
        if ($product->vendor_id && !isset($product->approved_by_admin)) {
            $product->approved_by_admin = false;
        }
    }

    /**
     * Handle the Product "created" event.
     * 
     * Auto-approve if needed (for testing or trusted vendors)
     */
    public function created(Product $product): void
    {
        // Future: Auto-approve for trusted vendors
        // if ($product->vendor && $product->vendor->is_trusted) {
        //     app(ProductApprovalService::class)->approveProduct($product->id);
        // }
    }
}
