<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use App\Models\VendorOrder;

class OrderController extends Controller
{
    /**
     * Display vendor orders
     */
    public function index(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            $query = DB::table('vendor_orders')
                ->join('orders', 'vendor_orders.order_id', '=', 'orders.id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('vendor_orders.vendor_id', $vendor->id)
                ->select(
                    'vendor_orders.*',
                    'orders.increment_id',
                    'orders.created_at as order_date',
                    'customers.first_name',
                    'customers.last_name',
                    'customers.email'
                );

            // Apply filters
            if ($request->has('status') && $request->status !== '') {
                $query->where('vendor_orders.status', $request->status);
            }

            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('orders.increment_id', 'like', "%{$search}%")
                      ->orWhere('customers.first_name', 'like', "%{$search}%")
                      ->orWhere('customers.last_name', 'like', "%{$search}%")
                      ->orWhere('customers.email', 'like', "%{$search}%");
                });
            }

            $orders = $query->orderBy('vendor_orders.created_at', 'desc')->paginate(15);

            return view('vendor.orders.index', compact('orders', 'vendor'));

        } catch (\Exception $e) {
            \Log::error('Vendor Orders Error: ' . $e->getMessage());
            return view('vendor.orders.index', [
                'orders' => collect(),
                'vendor' => null
            ]);
        }
    }

    /**
     * Show order details
     */
    public function show($id)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            $vendorOrder = VendorOrder::where('id', $id)
                ->where('vendor_id', $vendor->id)
                ->with(['order.customer', 'order.items.product'])
                ->first();

            if (!$vendorOrder) {
                return redirect()->route('vendor.orders.index')->with('error', 'الطلب غير موجود');
            }

            // Get order items for this vendor
            $orderItems = DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->where('order_items.order_id', $vendorOrder->order_id)
                ->where('products.vendor_id', $vendor->id)
                ->select(
                    'order_items.*',
                    DB::raw('JSON_UNQUOTE(JSON_EXTRACT(products.name, "$.ar")) as product_name'),
                    'products.sku'
                )
                ->get();

            return view('vendor.orders.show', compact('vendorOrder', 'orderItems', 'vendor'));

        } catch (\Exception $e) {
            \Log::error('Vendor Order Show Error: ' . $e->getMessage());
            return redirect()->route('vendor.orders.index')->with('error', 'حدث خطأ في عرض الطلب');
        }
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $vendorOrder = VendorOrder::where('id', $id)
                ->where('vendor_id', $vendor->id)
                ->first();

            if (!$vendorOrder) {
                return response()->json(['error' => 'Order not found'], 404);
            }

            $request->validate([
                'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
            ]);

            $vendorOrder->update([
                'status' => $request->status,
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث حالة الطلب بنجاح'
            ]);

        } catch (\Exception $e) {
            \Log::error('Update Order Status Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }

    /**
     * Search orders for AJAX
     */
    public function search(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $search = $request->get('q', '');
            
            $orders = DB::table('vendor_orders')
                ->join('orders', 'vendor_orders.order_id', '=', 'orders.id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('vendor_orders.vendor_id', $vendor->id)
                ->where(function($query) use ($search) {
                    $query->where('orders.increment_id', 'like', "%{$search}%")
                          ->orWhere('customers.first_name', 'like', "%{$search}%")
                          ->orWhere('customers.last_name', 'like', "%{$search}%");
                })
                ->select(
                    'vendor_orders.id',
                    'orders.increment_id',
                    'vendor_orders.status',
                    'vendor_orders.total_amount',
                    'customers.first_name',
                    'customers.last_name'
                )
                ->limit(10)
                ->get();

            return response()->json($orders);

        } catch (\Exception $e) {
            \Log::error('Order Search Error: ' . $e->getMessage());
            return response()->json(['error' => 'Search failed'], 500);
        }
    }
}