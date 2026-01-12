<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use App\Models\Vendor;
use App\Models\VendorOrder;
use App\Models\VendorPayout;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $productRepository;
    protected $orderRepository;
    protected $orderItemRepository;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        OrderItemRepository $orderItemRepository
    ) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
    }

    /**
     * Display vendor dashboard
     */
    public function index()
    {
        try {
            $customer = Auth::guard('customer')->user();
            
            if (!$customer) {
                return redirect()->route('customer.session.index');
            }

            // Get vendor info
            $vendor = Vendor::where('customer_id', $customer->id)->first();
            
            if (!$vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            // Get dashboard statistics
            $stats = $this->getDashboardStats();

            return view('vendor.dashboard.index', compact('stats', 'vendor'));
            
        } catch (\Exception $e) {
            \Log::error('Vendor Dashboard Error: ' . $e->getMessage());
            return view('vendor.dashboard.index', [
                'stats' => $this->getDefaultStats(),
                'vendor' => null
            ]);
        }
    }

    /**
     * Get dashboard statistics
     */
    public function getDashboardStats()
    {
        try {
            $customer = Auth::guard('customer')->user();
            
            if (!$customer) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $vendor = Vendor::where('customer_id', $customer->id)->first();
            
            if (!$vendor) {
                return response()->json(['error' => 'Vendor not found'], 404);
            }

            $stats = $this->calculateStats($vendor);

            return response()->json($stats);
            
        } catch (\Exception $e) {
            \Log::error('Dashboard Stats Error: ' . $e->getMessage());
            return response()->json($this->getDefaultStats());
        }
    }

    /**
     * Calculate vendor statistics
     */
    private function calculateStats($vendor)
    {
        // Products count
        $totalProducts = DB::table('products')
            ->where('vendor_id', $vendor->id)
            ->count();

        $activeProducts = DB::table('products')
            ->where('vendor_id', $vendor->id)
            ->where('status', 1)
            ->count();

        // Orders statistics
        $totalOrders = DB::table('vendor_orders')
            ->where('vendor_id', $vendor->id)
            ->count();

        $pendingOrders = DB::table('vendor_orders')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'pending')
            ->count();

        $completedOrders = DB::table('vendor_orders')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'completed')
            ->count();

        // Revenue calculations
        $totalRevenue = DB::table('vendor_orders')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'completed')
            ->sum('total_amount');

        $monthlyRevenue = DB::table('vendor_orders')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'completed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_amount');

        // Wallet balance
        $walletBalance = DB::table('vendor_payouts')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'completed')
            ->sum('amount');

        $pendingPayouts = DB::table('vendor_payouts')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'pending')
            ->sum('amount');

        // Recent orders
        $recentOrders = DB::table('vendor_orders')
            ->join('orders', 'vendor_orders.order_id', '=', 'orders.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('vendor_orders.vendor_id', $vendor->id)
            ->select(
                'vendor_orders.*',
                'orders.increment_id',
                'customers.first_name',
                'customers.last_name'
            )
            ->orderBy('vendor_orders.created_at', 'desc')
            ->limit(5)
            ->get();

        // Top selling products
        $topProducts = DB::table('products')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->where('products.vendor_id', $vendor->id)
            ->select(
                'products.id',
                'products.sku',
                DB::raw('JSON_UNQUOTE(JSON_EXTRACT(products.name, "$.ar")) as name'),
                DB::raw('COALESCE(SUM(order_items.qty_ordered), 0) as total_sold')
            )
            ->groupBy('products.id', 'products.sku', 'products.name')
            ->orderBy('total_sold', 'desc')
            ->limit(5)
            ->get();

        // Monthly sales chart data
        $monthlySales = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $sales = DB::table('vendor_orders')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'completed')
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->sum('total_amount');
            
            $monthlySales[] = [
                'month' => $month->format('M Y'),
                'sales' => (float) $sales
            ];
        }

        return [
            'products' => [
                'total' => $totalProducts,
                'active' => $activeProducts,
                'inactive' => $totalProducts - $activeProducts
            ],
            'orders' => [
                'total' => $totalOrders,
                'pending' => $pendingOrders,
                'completed' => $completedOrders,
                'processing' => $totalOrders - $pendingOrders - $completedOrders
            ],
            'revenue' => [
                'total' => (float) $totalRevenue,
                'monthly' => (float) $monthlyRevenue,
                'currency' => core()->getCurrentCurrencyCode()
            ],
            'wallet' => [
                'balance' => (float) $walletBalance,
                'pending' => (float) $pendingPayouts,
                'currency' => core()->getCurrentCurrencyCode()
            ],
            'recent_orders' => $recentOrders,
            'top_products' => $topProducts,
            'monthly_sales' => $monthlySales
        ];
    }

    /**
     * Get default stats when there's an error
     */
    private function getDefaultStats()
    {
        return [
            'products' => [
                'total' => 0,
                'active' => 0,
                'inactive' => 0
            ],
            'orders' => [
                'total' => 0,
                'pending' => 0,
                'completed' => 0,
                'processing' => 0
            ],
            'revenue' => [
                'total' => 0,
                'monthly' => 0,
                'currency' => 'EGP'
            ],
            'wallet' => [
                'balance' => 0,
                'pending' => 0,
                'currency' => 'EGP'
            ],
            'recent_orders' => [],
            'top_products' => [],
            'monthly_sales' => []
        ];
    }
}