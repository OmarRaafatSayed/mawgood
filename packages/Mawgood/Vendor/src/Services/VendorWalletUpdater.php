<?php

namespace Mawgood\Vendor\Services;

use Mawgood\Vendor\Models\VendorOrder;

class VendorWalletUpdater
{
    public function onOrderPaid(VendorOrder $vendorOrder)
    {
        $vendor = $vendorOrder->vendor;
        $vendor->increment('unavailable_balance', $vendorOrder->vendor_amount);
    }

    public function onOrderDelivered(VendorOrder $vendorOrder)
    {
        $vendor = $vendorOrder->vendor;
        $vendor->decrement('unavailable_balance', $vendorOrder->vendor_amount);
        $vendor->increment('available_balance', $vendorOrder->vendor_amount);
    }

    public function onOrderCancelled(VendorOrder $vendorOrder)
    {
        $vendor = $vendorOrder->vendor;
        $vendor->decrement('unavailable_balance', $vendorOrder->vendor_amount);
    }
}
