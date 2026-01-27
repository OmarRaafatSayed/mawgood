<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawgood\Vendor\Http\Requests\UpdateOrderStatusRequest;
use Mawgood\Vendor\Services\VendorOrderService;

class OrderController extends Controller
{
    public function __construct(
        private VendorOrderService $orderService
    ) {}

    public function index(Request $request)
    {
        $vendor = $request->vendor;
        $orders = $this->orderService->getOrders($vendor, $request->all());

        return view('mawgood-vendor::orders.index', compact('orders', 'vendor'));
    }

    public function show(Request $request, $id)
    {
        $vendor = $request->vendor;
        $orderData = $this->orderService->getOrderDetails($vendor, $id);

        if (!$orderData) {
            return redirect()->route('vendor.orders.index')
                ->with('error', 'الطلب غير موجود');
        }

        return view('mawgood-vendor::orders.show', [
            'vendorOrder' => $orderData['vendor_order'],
            'orderItems' => $orderData['order_items'],
            'vendor' => $vendor,
        ]);
    }

    public function updateStatus(UpdateOrderStatusRequest $request, $id)
    {
        try {
            $vendor = $request->vendor;
            $success = $this->orderService->updateOrderStatus(
                $vendor,
                $id,
                $request->validated()['status']
            );

            if (!$success) {
                return response()->json(['error' => 'Order not found'], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث حالة الطلب بنجاح',
            ]);
        } catch (\Exception $e) {
            \Log::error('Update Order Status Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }
}
