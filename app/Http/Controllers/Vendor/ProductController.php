<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

            $query = DB::table('products')
                ->where(function($q) use ($vendor) {
                    $q->where('vendor_id', $vendor->id)
                      ->orWhere('seller_id', $vendor->id);
                })
                ->select(
                    'id',
                    'sku',
                    'type',
                    'status',
                    'created_at',
                    'updated_at',
                    DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar")) as name')
                );

            // Apply filters
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('sku', 'like', "%{$search}%")
                      ->orWhere(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar"))'), 'like', "%{$search}%");
                });
            }

            if ($request->has('status') && $request->status !== '') {
                $query->where('status', $request->status);
            }

            $products = $query->orderBy('created_at', 'desc')->paginate(15);

            return view('vendor.products.index', compact('products', 'vendor'));

        } catch (\Exception $e) {
            \Log::error('Vendor Products Error: ' . $e->getMessage());
            return view('vendor.products.index', [
                'products' => collect(),
                'vendor' => null
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