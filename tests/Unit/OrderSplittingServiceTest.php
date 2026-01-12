<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\OrderSplittingService;
use Webkul\Sales\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderSplittingServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_split_order_creates_vendor_order()
    {
        // Create vendor
        $vendorId = DB::table('vendors')->insertGetId([
            'customer_id' => null,
            'store_name' => 'Test Vendor',
            'commission_rate' => 10.00,
            'status' => 'approved',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create product
        $productId = DB::table('products')->insertGetId([
            'sku' => 'TST-1',
            'type' => 'simple',
            'status' => 'enabled',
            'name' => json_encode(['ar' => 'اختبار']),
            'vendor_id' => $vendorId,
            'price' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create order
        $orderId = DB::table('orders')->insertGetId([
            'status' => 'pending',
            'sub_total' => 50,
            'shipping_amount' => 0,
            'grand_total' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create order item
        DB::table('order_items')->insert([
            'order_id' => $orderId,
            'product_id' => $productId,
            'price' => 50,
            'qty_ordered' => 1,
            'total' => 50,
            'tax_amount' => 0,
            'discount_amount' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $order = Order::find($orderId);

        $service = new OrderSplittingService();
        $service->splitOrder($order);

        $this->assertDatabaseHas('vendor_orders', [
            'vendor_id' => $vendorId,
            'order_id' => $orderId,
        ]);
    }
}
