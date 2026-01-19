<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use Webkul\Admin\Helpers\Dashboard;

class AdminController extends Controller
{
    protected $dashboardHelper;

    public function __construct(Dashboard $dashboardHelper)
    {
        $this->dashboardHelper = $dashboardHelper;
    }

    /**
     * Vendor Admin Dashboard - Scoped version of core admin
     */
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->where('status', 'approved')->first();
        
        if (!$vendor) {
            return redirect()->route('shop.customers.account.profile.index')
                ->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        // Get vendor statistics
        $stats = [
            'total_products' => $vendor->products()->count(),
            'total_orders' => $vendor->vendorOrders()->count(),
            'total_revenue' => $vendor->vendorOrders()->where('status', 'delivered')->sum('vendor_amount'),
            'pending_orders' => $vendor->vendorOrders()->where('status', 'pending')->count(),
        ];

        // Get recent orders (last 5)
        $recentOrders = $vendor->vendorOrders()
            ->with('order')
            ->latest()
            ->take(5)
            ->get();

        // Get recent products (last 8)
        $recentProducts = $vendor->products()
            ->with(['attribute_family', 'images'])
            ->latest()
            ->take(8)
            ->get();

        return view('vendor.admin.dashboard.index', [
            'vendor' => $vendor,
            'stats' => $stats,
            'recentOrders' => $recentOrders,
            'recentProducts' => $recentProducts,
            'startDate' => $this->dashboardHelper->getStartDate(),
            'endDate' => $this->dashboardHelper->getEndDate(),
        ]);
    }

    /**
     * Get vendor-scoped dashboard statistics
     */
    public function stats(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->where('status', 'approved')->first();
        
        if (!$vendor) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Get vendor-specific stats based on request type
        $type = $request->query('type', 'over-all');
        $stats = $this->getVendorStats($vendor, $type);

        return response()->json([
            'statistics' => $stats,
            'date_range' => $this->dashboardHelper->getDateRange(),
        ]);
    }

    /**
     * Get vendor-specific statistics
     */
    private function getVendorStats($vendor, $type)
    {
        switch ($type) {
            case 'over-all':
                return $this->getOverAllStats($vendor);
            case 'today':
                return $this->getTodayStats($vendor);
            case 'total-sales':
                return $this->getSalesStats($vendor);
            default:
                return [];
        }
    }

    private function getOverAllStats($vendor)
    {
        return [
            'total_products' => $vendor->products()->count(),
            'total_orders' => $vendor->vendorOrders()->count(),
            'total_revenue' => $vendor->vendorOrders()->where('status', 'delivered')->sum('vendor_amount'),
            'pending_orders' => $vendor->vendorOrders()->where('status', 'pending')->count(),
        ];
    }

    private function getTodayStats($vendor)
    {
        $today = now()->toDateString();
        return [
            'orders_today' => $vendor->vendorOrders()->whereDate('created_at', $today)->count(),
            'revenue_today' => $vendor->vendorOrders()->whereDate('created_at', $today)->sum('vendor_amount'),
        ];
    }

    private function getSalesStats($vendor)
    {
        $salesData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $sales = $vendor->vendorOrders()
                ->whereDate('created_at', $date)
                ->sum('vendor_amount');
            $salesData[] = ['date' => $date, 'sales' => $sales];
        }
        return $salesData;
    }
}