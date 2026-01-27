<?php

namespace Mawgood\Vendor\Services;

use Illuminate\Support\Facades\DB;
use Mawgood\Vendor\Models\Vendor;
use Mawgood\Vendor\Models\VendorOrder;

class VendorOrderService
{
    public function getOrders(Vendor $vendor, array $filters = [])
    {
        $query = DB::table('vendor_orders')
            ->join('orders', 'vendor_orders.order_id', '=', 'orders.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('vendor_orders.vendor_id', $vendor->id)
            ->select('vendor_orders.*', 'orders.increment_id', 'orders.created_at as order_date',
                'customers.first_name', 'customers.last_name', 'customers.email');

        if (isset($filters['status']) && $filters['status'] !== '') {
            $query->where('vendor_orders.status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('orders.increment_id', 'like', "%{$search}%")
                  ->orWhere('customers.first_name', 'like', "%{$search}%")
                  ->orWhere('customers.last_name', 'like', "%{$search}%")
                  ->orWhere('customers.email', 'like', "%{$search}%");
            });
        }

        return $query->orderBy('vendor_orders.created_at', 'desc')->paginate(15);
    }

    public function getOrderDetails(Vendor $vendor, $orderId)
    {
        $vendorOrder = VendorOrder::where('id', $orderId)
            ->where('vendor_id', $vendor->id)
            ->with(['order.customer'])
            ->first();

        if (!$vendorOrder) {
            return null;
        }

        $orderItems = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('order_items.order_id', $vendorOrder->order_id)
            ->where('products.vendor_id', $vendor->id)
            ->select('order_items.*',
                DB::raw('JSON_UNQUOTE(JSON_EXTRACT(products.name, "$.ar")) as product_name'),
                'products.sku')
            ->get();

        return [
            'vendor_order' => $vendorOrder,
            'order_items' => $orderItems,
        ];
    }

    public function updateOrderStatus(Vendor $vendor, $orderId, string $status)
    {
        $vendorOrder = VendorOrder::where('id', $orderId)
            ->where('vendor_id', $vendor->id)
            ->first();

        if (!$vendorOrder) {
            return false;
        }

        $vendorOrder->update([
            'status' => $status,
            'updated_at' => now(),
        ]);

        return true;
    }
}
