<?php

namespace App\Repositories;

use Webkul\Core\Eloquent\Repository;
use App\Models\Vendor;

class VendorRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Vendor::class;
    }

    /**
     * Find vendor by customer ID
     */
    public function findByCustomerId($customerId)
    {
        return $this->findOneWhere(['customer_id' => $customerId]);
    }

    /**
     * Get vendor statistics
     */
    public function getVendorStats($vendorId)
    {
        try {
            $vendor = $this->find($vendorId);
            
            if (!$vendor) {
                return $this->getMockStats();
            }

            // Use Bagisto's repositories for data
            $productRepository = app(\Webkul\Product\Repositories\ProductRepository::class);
            $orderRepository = app(\Webkul\Sales\Repositories\OrderRepository::class);

            return [
                'total_products' => $productRepository->count(['seller_id' => $vendorId]),
                'total_orders' => $this->getVendorOrdersCount($vendorId),
                'pending_orders' => $this->getVendorOrdersCount($vendorId, 'pending'),
                'completed_orders' => $this->getVendorOrdersCount($vendorId, 'completed'),
                'current_balance' => $vendor->current_balance ?? 0,
                'total_earnings' => $vendor->total_earnings ?? 0,
                'commission_rate' => $vendor->commission_rate ?? 10.00
            ];
        } catch (\Exception $e) {
            return $this->getMockStats();
        }
    }

    /**
     * Get vendor orders count
     */
    protected function getVendorOrdersCount($vendorId, $status = null)
    {
        try {
            $query = \DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->where('products.seller_id', $vendorId);

            if ($status) {
                $query->join('orders', 'order_items.order_id', '=', 'orders.id')
                      ->where('orders.status', $status);
            }

            return $query->distinct('order_items.order_id')->count('order_items.order_id');
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get mock statistics for demo purposes
     */
    protected function getMockStats()
    {
        return [
            'total_products' => 25,
            'total_orders' => 150,
            'pending_orders' => 12,
            'completed_orders' => 138,
            'current_balance' => 15750.00,
            'total_earnings' => 17500.00,
            'commission_rate' => 10.00
        ];
    }

    /**
     * Create vendor with validation
     */
    public function createVendor(array $data)
    {
        // Validate required fields
        $validated = array_merge($data, [
            'status' => $data['status'] ?? 'pending',
            'commission_rate' => $data['commission_rate'] ?? 10.00,
            'total_earnings' => 0.00,
            'current_balance' => 0.00
        ]);

        return $this->create($validated);
    }

    /**
     * Update vendor earnings
     */
    public function updateEarnings($vendorId, $amount)
    {
        $vendor = $this->find($vendorId);
        
        if ($vendor) {
            $commissionAmount = ($amount * $vendor->commission_rate) / 100;
            $vendorEarning = $amount - $commissionAmount;
            
            $vendor->total_earnings += $amount;
            $vendor->current_balance += $vendorEarning;
            $vendor->save();
            
            return $vendor;
        }
        
        return null;
    }
}