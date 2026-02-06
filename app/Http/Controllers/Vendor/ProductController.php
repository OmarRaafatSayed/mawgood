<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Webkul\Product\Repositories\ProductRepository;
use App\Models\Vendor;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display vendor products
     */
    public function index(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            // Log request parameters
            \Log::info('Products Filter Request:', $request->all());

            $query = DB::table('products')
                ->where(function($q) use ($vendor) {
                    $q->where('vendor_id', $vendor->id)
                      ->orWhere('seller_id', $vendor->id);
                });

            // Search filter
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('products.sku', 'like', "%{$search}%")
                      ->orWhere(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(products.name, "$.ar"))'), 'like', "%{$search}%");
                });
            }

            // Category filter
            if ($request->filled('category')) {
                $query->whereExists(function($q) use ($request) {
                    $q->select(DB::raw(1))
                      ->from('product_categories')
                      ->whereRaw('product_categories.product_id = products.id')
                      ->where('product_categories.category_id', $request->category);
                });
            }

            // Select fields
            $query->select(
                'products.id',
                'products.sku',
                'products.type',
                'products.status',
                'products.vendor_id',
                'products.approved_by_admin',
                'products.visible_individually',
                'products.created_at',
                'products.updated_at',
                DB::raw('JSON_UNQUOTE(JSON_EXTRACT(products.name, "$.ar")) as name'),
                DB::raw('COALESCE((SELECT SUM(qty) FROM product_inventories WHERE product_inventories.product_id = products.id), 0) as quantity')
            );

            // Log final query
            \Log::info('SQL Query: ' . $query->toSql());
            \Log::info('Query Bindings: ', $query->getBindings());

            $products = $query->orderBy('created_at', 'desc')->paginate(15);
            
            // Debug: Log first product status
            if ($products->count() > 0) {
                $first = $products->first();
                \Log::info('First Product Debug:', [
                    'id' => $first->id,
                    'name' => $first->name,
                    'status' => $first->status,
                    'approved_by_admin' => $first->approved_by_admin,
                    'status_type' => gettype($first->status),
                ]);
            }

            $categories = DB::table('categories')
                ->select('id', DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar")) as name'))
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->get();

            $stats = [
                'products' => [
                    'total' => 0,
                    'active' => 0,
                    'inactive' => 0,
                    'low_stock' => 0
                ],
                'orders' => ['pending' => 0, 'total' => 0],
                'wallet' => ['available' => 0]
            ];

            return view('vendor.products.index', compact('products', 'vendor', 'stats', 'categories'));

        } catch (\Exception $e) {
            \Log::error('Vendor Products Error: ' . $e->getMessage());
            $stats = [
                'products' => ['total' => 0, 'active' => 0, 'inactive' => 0, 'low_stock' => 0],
                'orders' => ['pending' => 0, 'total' => 0],
                'wallet' => ['available' => 0]
            ];
            return view('vendor.products.index', [
                'products' => collect(),
                'vendor' => null,
                'stats' => $stats
            ]);
        }
    }

    /**
     * Show product details
     */
    public function show($id)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            $product = $this->productRepository->find($id);

            if (!$product || ($product->vendor_id != $vendor->id && $product->seller_id != $vendor->id)) {
                return redirect()->route('vendor.products.index')->with('error', 'المنتج غير موجود');
            }

            return view('vendor.products.show', compact('product', 'vendor'));

        } catch (\Exception $e) {
            \Log::error('Vendor Product Show Error: ' . $e->getMessage());
            return redirect()->route('vendor.products.index')->with('error', 'حدث خطأ في عرض المنتج');
        }
    }

    /**
     * Search products for AJAX
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
            
            $products = DB::table('products')
                ->where(function($q) use ($vendor, $search) {
                    $q->where('vendor_id', $vendor->id)
                      ->orWhere('seller_id', $vendor->id);
                })
                ->where(function($query) use ($search) {
                    $query->where('sku', 'like', "%{$search}%")
                          ->orWhere(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar"))'), 'like', "%{$search}%");
                })
                ->select(
                    'id',
                    'sku',
                    'status',
                    DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar")) as name')
                )
                ->limit(10)
                ->get();

            return response()->json($products);

        } catch (\Exception $e) {
            \Log::error('Product Search Error: ' . $e->getMessage());
            return response()->json(['error' => 'Search failed'], 500);
        }
    }

    /**
     * Show add product form
     */
    public function create()
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (! $vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            // Load categories for select
            $categories = DB::table('categories')
                ->select('id', DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar")) as name'))
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->get();

            return view('vendor.products.create', compact('vendor', 'categories'));

        } catch (\Exception $e) {
            \Log::error('Vendor Product Create Error: ' . $e->getMessage());
            return redirect()->route('vendor.products.index')->with('error', 'فشل في تحميل صفحة إضافة المنتج');
        }
    }

    /**
     * Store new vendor product (simplified)
     */
    public function store(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (! $vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            $data = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
                'weight' => 'nullable|numeric|min:0'
            ]);

            // Minimal product creation to make vendor alive
            \DB::beginTransaction();

            $sku = 'V'.strtoupper(uniqid());

            $productId = DB::table('products')->insertGetId([
                'sku' => $sku,
                'type' => 'simple',
                'vendor_id' => $vendor->id,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert flat record for current channel/locale
            DB::table('product_flat')->insert([
                'sku' => $sku,
                'type' => 'simple',
                'name' => $data['name'],
                'price' => $data['price'],
                'weight' => $data['weight'] ?? null,
                'status' => 0,
                'created_at' => now(),
                'locale' => core()->getRequestedLocaleCode(),
                'channel' => core()->getRequestedChannelCode(),
                'attribute_family_id' => null,
                'product_id' => $productId,
                'updated_at' => now(),
                'visible_individually' => 1
            ]);

            // Attach category
            DB::table('product_categories')->insert([
                'product_id' => $productId,
                'category_id' => $data['category_id']
            ]);

            // Store name JSON in products.name for compatibility (locale ar)
            DB::table('products')->where('id', $productId)->update([
                'name' => json_encode(['ar' => $data['name']])
            ]);

            \DB::commit();

            return redirect()->route('vendor.products.index')->with('success', 'تم إضافة المنتج بنجاح');

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Vendor Product Store Error: ' . $e->getMessage());
            return redirect()->route('vendor.products.create')->with('error', 'فشل في إضافة المنتج');
        }
    }
}