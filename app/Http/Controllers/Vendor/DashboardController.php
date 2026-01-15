<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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

            // Get dashboard statistics directly
            $stats = $this->calculateStats($vendor);

            return view('vendor.dashboard.index', compact('stats', 'vendor'));
            
        } catch (\Exception $e) {
            Log::error('Vendor Dashboard Error: ' . $e->getMessage());
            return view('vendor.dashboard.index', [
                'stats' => $this->getDefaultStats(),
                'vendor' => null
            ]);
        }
    }

    /**
     * Get dashboard statistics (API)
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
            Log::error('Dashboard Stats Error: ' . $e->getMessage());
            return response()->json($this->getDefaultStats());
        }
    }

    /**
     * Calculate vendor statistics
     */
    private function calculateStats($vendor)
    {
        // Basic product counts
        $totalProducts = DB::table('products')->where('vendor_id', $vendor->id)->count();
        $activeProducts = DB::table('products')->where('vendor_id', $vendor->id)->where('status', 1)->count();
        $inactiveProducts = $totalProducts - $activeProducts;

        // Inventory details (best-effort; gracefully handle missing inventory schema)
        $outOfStock = 0;
        $lowStock = 0;
        $lowStockThreshold = 5;

        try {
            // If there is a dedicated inventory table
            if (Schema::hasTable('product_inventories')) {
                $productIds = DB::table('products')->where('vendor_id', $vendor->id)->pluck('id');

                if ($productIds->count()) {
                    $outOfStock = DB::table('product_inventories')
                        ->whereIn('product_id', $productIds)
                        ->where('qty', '<=', 0)
                        ->count();

                    $lowStock = DB::table('product_inventories')
                        ->whereIn('product_id', $productIds)
                        ->whereBetween('qty', [1, $lowStockThreshold])
                        ->count();
                }
            } elseif (Schema::hasColumn('products', 'quantity')) {
                $outOfStock = DB::table('products')
                    ->where('vendor_id', $vendor->id)
                    ->where('quantity', '<=', 0)
                    ->count();

                $lowStock = DB::table('products')
                    ->where('vendor_id', $vendor->id)
                    ->whereBetween('quantity', [1, $lowStockThreshold])
                    ->count();
            }
        } catch (\Exception $e) {
            Log::warning('Inventory stats not available: ' . $e->getMessage());
        }

        // Orders statistics (mapped to Amazon-style tabs)
        $pending = DB::table('vendor_orders')->where('vendor_id', $vendor->id)->where('status', 'pending')->count();
        $unshipped = DB::table('vendor_orders')->where('vendor_id', $vendor->id)->where('status', 'processing')->count();
        $shipped = DB::table('vendor_orders')->where('vendor_id', $vendor->id)->where('status', 'shipped')->count();
        $cancelled = DB::table('vendor_orders')->where('vendor_id', $vendor->id)->where('status', 'cancelled')->count();
        $totalOrders = $pending + $unshipped + $shipped + $cancelled;

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

        // Wallet breakdown
        $available = (float) ($vendor->available_balance ?? $vendor->wallet_balance ?? 0);
        $unavailable = (float) ($vendor->unavailable_balance ?? 0);

        // Pending payout amounts
        $pendingPayouts = DB::table('vendor_payouts')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'pending')
            ->sum('amount');

        // Recent orders (same as before)
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

        // Sales analytics: daily sales for last 30 days + total units sold
        $salesChart = [];
        $unitsSold = 0;
        for ($i = 29; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i);
            $sales = (float) DB::table('vendor_orders')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'completed')
                ->whereDate('created_at', $day->toDateString())
                ->sum('total_amount');

            $units = (int) DB::table('vendor_order_items')
                ->join('vendor_orders', 'vendor_order_items.vendor_order_id', '=', 'vendor_orders.id')
                ->where('vendor_orders.vendor_id', $vendor->id)
                ->whereDate('vendor_order_items.created_at', $day->toDateString())
                ->sum('qty');

            $unitsSold += $units;

            $salesChart[] = [
                'date' => $day->format('Y-m-d'),
                'sales' => $sales,
                'units' => $units,
            ];
        }

        // Top selling products (same query)
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

        return [
            'products' => [
                'total' => $totalProducts,
                'active' => $activeProducts,
                'inactive' => $inactiveProducts,
                'out_of_stock' => $outOfStock,
                'low_stock' => $lowStock
            ],
            'orders' => [
                'total' => $totalOrders,
                'pending' => $pending,
                'unshipped' => $unshipped,
                'shipped' => $shipped,
                'cancelled' => $cancelled
            ],
            'revenue' => [
                'total' => (float) $totalRevenue,
                'monthly' => (float) $monthlyRevenue,
                'currency' => core()->getCurrentCurrencyCode()
            ],
            'wallet' => [
                'available' => $available,
                'unavailable' => $unavailable,
                'pending_payouts' => (float) $pendingPayouts,
                'request_payout_url' => route('vendor.wallet.withdrawal')
            ],
            'recent_orders' => $recentOrders,
            'top_products' => $topProducts,
            'sales_chart' => $salesChart,
            'units_sold' => $unitsSold
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
