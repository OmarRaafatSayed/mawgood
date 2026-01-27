<?php

namespace Mawgood\Vendor\Services;

use App\Models\Seller;
use App\Models\SellerOrder;
use Webkul\Sales\Models\Order;
use Mawgood\Vendor\Models\Vendor;
use Mawgood\Vendor\Models\VendorOrder;

class OrderSplittingService
{
    /**
     * Split order into seller/vendor orders.
     */
    public function splitOrder(Order $order): void
    {
        // Group order items by vendor
        $vendorItems = $order->items->groupBy(function ($item) {
            return $item->product->vendor_id ?? 0;
        });

        foreach ($vendorItems as $vendorId => $items) {
            if ($vendorId == 0) {
                continue; // Skip items without vendor
            }

            $vendor = Vendor::find($vendorId);
            if (!$vendor) {
                continue;
            }

            // Create seller-level order (backwards compatibility)
            $this->createSellerOrder($order, $vendor, $items);

            // Create vendor-level order for vendor dashboard and payouts
            $this->createVendorOrder($order, $vendor, $items);
        }
    }

    /**
     * Create vendor order.
     */
    private function createVendorOrder(Order $order, $vendor, $items)
    {
        $subTotal = $items->sum(function ($item) {
            return $item->price * $item->qty_ordered;
        });

        $taxAmount = $items->sum('tax_amount');
        $discountAmount = $items->sum('discount_amount');

        // Calculate proportional shipping
        $totalOrderValue = $order->sub_total;
        $vendorOrderValue = $subTotal;
        $shippingProportion = $totalOrderValue > 0 ? ($vendorOrderValue / $totalOrderValue) : 0;
        $shippingAmount = $order->shipping_amount * $shippingProportion;

        $grandTotal = $subTotal + $taxAmount + $shippingAmount - $discountAmount;

        // Calculate commission
        $commissionAmount = $grandTotal * ($vendor->commission_rate / 100);
        $vendorAmount = $grandTotal - $commissionAmount;

        return VendorOrder::create([
            'vendor_id' => $vendor->id,
            'order_id' => $order->id,
            'status' => 'pending',
            'sub_total' => $subTotal,
            'tax_amount' => $taxAmount,
            'shipping_amount' => $shippingAmount,
            'discount_amount' => $discountAmount,
            'grand_total' => $grandTotal,
            'commission_amount' => $commissionAmount,
            'vendor_amount' => $vendorAmount,
        ]);
    }

    /**
     * Create seller order.
     */
    private function createSellerOrder(Order $order, Seller $seller, $items): SellerOrder
    {
        $subTotal = $items->sum(function ($item) {
            return $item->price * $item->qty_ordered;
        });

        $taxAmount = $items->sum('tax_amount');
        $discountAmount = $items->sum('discount_amount');
        
        // Calculate proportional shipping
        $totalOrderValue = $order->sub_total;
        $sellerOrderValue = $subTotal;
        $shippingProportion = $totalOrderValue > 0 ? ($sellerOrderValue / $totalOrderValue) : 0;
        $shippingAmount = $order->shipping_amount * $shippingProportion;

        $grandTotal = $subTotal + $taxAmount + $shippingAmount - $discountAmount;
        
        // Calculate commission
        $commissionAmount = $grandTotal * ($seller->commission_rate / 100);
        $sellerAmount = $grandTotal - $commissionAmount;

        return SellerOrder::create([
            'seller_id' => $seller->id,
            'order_id' => $order->id,
            'seller_order_number' => SellerOrder::generateOrderNumber(),
            'status' => 'pending',
            'sub_total' => $subTotal,
            'tax_amount' => $taxAmount,
            'shipping_amount' => $shippingAmount,
            'discount_amount' => $discountAmount,
            'grand_total' => $grandTotal,
            'commission_amount' => $commissionAmount,
            'seller_amount' => $sellerAmount,
        ]);
    }

    /**
     * Update parent order status based on seller orders.
     */
    public function updateParentOrderStatus(Order $order): void
    {
        $sellerOrders = SellerOrder::where('order_id', $order->id)->get();
        
        if ($sellerOrders->isEmpty()) {
            return;
        }

        $statuses = $sellerOrders->pluck('status')->unique();

        // If all seller orders have the same status, update parent order
        if ($statuses->count() === 1) {
            $status = $statuses->first();
            
            $parentStatus = match($status) {
                'processing' => 'processing',
                'shipped' => 'processing',
                'delivered' => 'completed',
                'cancelled' => 'canceled',
                default => 'pending'
            };
            
            $order->update(['status' => $parentStatus]);
        } elseif ($statuses->contains('delivered') && $statuses->contains('shipped')) {
            // If some are delivered and some are shipped, mark as processing
            $order->update(['status' => 'processing']);
        }
    }
}