<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Vendor;
use Carbon\Carbon;

class OptimizedDashboardController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        if (!$customer) return redirect()->route('customer.session.index');

        $vendor = Vendor::where('customer_id', $customer->id)->first();
        if (!$vendor) return redirect()->route('shop.home.index');

        $stats = $this->getCachedStats($vendor);
        $unreadNotifications = $this->getCachedNotifications($vendor);

        return view('vendor.dashboard.index', compact('stats', 'vendor', 'unreadNotifications'));
    }

    public function getDashboardStats()
    {
        $customer = Auth::guard('customer')->user();
        if (!$customer) return response()->json(['error' => 'Unauthorized'], 401);

        $vendor = Vendor::where('customer_id', $customer->id)->first();
        if (!$vendor) return response()->json(['error' => 'Vendor not found'], 404);

        return response()->json($this->getCachedStats($vendor));
    }

    private function getCachedStats($vendor)
    {
        return Cache::remember("vendor_stats_{$vendor->id}", 300, function () use ($vendor) {
            return $this->calculateOptimizedStats($vendor);
        });
    }

    private function getCachedNotifications($vendor)
    {
        return Cache::remember("vendor_notifications_{$vendor->id}", 60, function () use ($vendor) {
            return DB::table('vendor_orders')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'pending')
                ->count();
        });
    }

    private function calculateOptimizedStats($vendor)
    {
        // Single query for all product stats
        $productStats = DB::table('products')
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as active,
                SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as inactive,
                SUM(CASE WHEN quantity <= 0 THEN 1 ELSE 0 END) as out_of_stock,
                SUM(CASE WHEN quantity BETWEEN 1 AND 5 THEN 1 ELSE 0 END) as low_stock
            ')
            ->where('vendor_id', $vendor->id)
            ->first();

        // Single query for all order stats
        $orderStats = DB::table('vendor_orders')
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN status = "processing" THEN 1 ELSE 0 END) as unshipped,
                SUM(CASE WHEN status = "shipped" THEN 1 ELSE 0 END) as shipped,
                SUM(CASE WHEN status = "cancelled" THEN 1 ELSE 0 END) as cancelled,
                SUM(CASE WHEN status = "completed" THEN total_amount ELSE 0 END) as total_revenue,
                SUM(CASE WHEN status = "completed" AND MONTH(created_at) = ? AND YEAR(created_at) = ? THEN total_amount ELSE 0 END) as monthly_revenue
            ')
            ->where('vendor_id', $vendor->id)
            ->setBindings([Carbon::now()->month, Carbon::now()->year])
            ->first();

        // Optimized recent orders with single query
        $recentOrders = DB::table('vendor_orders as vo')
            ->join('orders as o', 'vo.order_id', '=', 'o.id')
            ->join('customers as c', 'o.customer_id', '=', 'c.id')
            ->select('vo.*', 'o.increment_id', 'c.first_name', 'c.last_name')
            ->where('vo.vendor_id', $vendor->id)
            ->orderBy('vo.created_at', 'desc')
            ->limit(5)
            ->get();

        return [
            'products' => [
                'total' => $productStats->total ?? 0,
                'active' => $productStats->active ?? 0,
                'inactive' => $productStats->inactive ?? 0,
                'out_of_stock' => $productStats->out_of_stock ?? 0,
                'low_stock' => $productStats->low_stock ?? 0
            ],
            'orders' => [
                'total' => $orderStats->total ?? 0,
                'pending' => $orderStats->pending ?? 0,
                'unshipped' => $orderStats->unshipped ?? 0,
                'shipped' => $orderStats->shipped ?? 0,
                'cancelled' => $orderStats->cancelled ?? 0
            ],
            'revenue' => [
                'total' => (float) ($orderStats->total_revenue ?? 0),
                'monthly' => (float) ($orderStats->monthly_revenue ?? 0),
                'currency' => 'EGP'
            ],
            'wallet' => [
                'available' => (float) ($vendor->available_balance ?? 0),
                'unavailable' => (float) ($vendor->unavailable_balance ?? 0),
                'pending_payouts' => 0
            ],
            'recent_orders' => $recentOrders
        ];
    }
}