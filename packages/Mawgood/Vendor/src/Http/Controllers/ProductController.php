<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawgood\Vendor\Http\Requests\StoreProductRequest;
use Mawgood\Vendor\Services\VendorProductService;

class ProductController extends Controller
{
    public function __construct(
        private VendorProductService $productService
    ) {}

    public function index(Request $request)
    {
        $vendor = $request->vendor;
        $products = $this->productService->getProducts($vendor, $request->all());

        return view('mawgood-vendor::products.index', compact('products', 'vendor'));
    }

    public function create(Request $request)
    {
        $vendor = $request->vendor;
        $categories = \Webkul\Category\Models\Category::where('status', 1)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function($cat) {
                return [
                    'id' => $cat->id,
                    'name' => $cat->name
                ];
            });

        return view('mawgood-vendor::products.create', compact('vendor', 'categories'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $vendor = $request->vendor;
            \Log::info('Creating product with data:', $request->validated());
            
            $this->productService->createProduct($vendor, $request->validated());

            return redirect()->route('vendor.products.index')
                ->with('success', 'تم إضافة المنتج بنجاح');
        } catch (\Exception $e) {
            \Log::error('Product Store Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return back()->withInput()->with('error', 'فشل في إضافة المنتج: ' . $e->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        $vendor = $request->vendor;
        $product = \DB::table('products')
            ->where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->first();

        if (!$product) {
            return redirect()->route('vendor.products.index')
                ->with('error', 'المنتج غير موجود');
        }

        return view('mawgood-vendor::products.show', compact('product', 'vendor'));
    }

    public function massDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:products,id'
        ]);

        $vendor = $request->vendor;
        
        \DB::table('products')
            ->whereIn('id', $request->ids)
            ->where('vendor_id', $vendor->id)
            ->delete();

        return redirect()->route('vendor.products.index')
            ->with('success', 'تم حذف المنتجات المحددة بنجاح');
    }
}
