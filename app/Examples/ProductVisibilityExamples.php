<?php

/**
 * ============================================
 * أمثلة عملية لاستخدام Product Visibility
 * Practical Examples for Product Visibility
 * ============================================
 */

namespace App\Examples;

use Webkul\Product\Models\Product;
use App\Services\Product\ProductVisibilityService;
use Illuminate\Http\Request;

class ProductVisibilityExamples
{
    /**
     * مثال 1: عرض المنتجات في الصفحة الرئيسية
     */
    public function homepageProducts()
    {
        $products = Product::forShop()
            ->with(['images', 'price_indices'])
            ->latest()
            ->take(12)
            ->get();

        return view('shop::home.index', compact('products'));
    }

    /**
     * مثال 2: عرض المنتجات في فئة
     */
    public function categoryProducts($categoryId)
    {
        $products = Product::forShop()
            ->whereHas('categories', function($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->with(['images', 'price_indices'])
            ->paginate(20);

        return view('shop::categories.view', compact('products'));
    }

    /**
     * مثال 3: البحث عن المنتجات
     */
    public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        $products = Product::forShop()
            ->where('name', 'like', "%{$query}%")
            ->with(['images', 'price_indices'])
            ->paginate(20);

        return view('shop::search.index', compact('products', 'query'));
    }

    /**
     * مثال 4: عرض منتج واحد مع التحقق من الرؤية
     */
    public function showProduct($slug)
    {
        $product = Product::where('url_key', $slug)->first();

        if (!$product) {
            abort(404);
        }

        $service = new ProductVisibilityService();
        
        if (!$service->isVisibleInFrontend($product)) {
            abort(404);
        }

        return view('shop::products.view', compact('product'));
    }

    /**
     * مثال 5: تشخيص منتج
     */
    public function diagnoseProduct($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'المنتج غير موجود'], 404);
        }

        $service = new ProductVisibilityService();

        return response()->json([
            'product_id' => $product->id,
            'sku' => $product->sku,
            'is_visible' => $service->isVisibleInFrontend($product),
            'requirements' => $service->getVisibilityRequirements($product),
            'missing' => $service->getMissingRequirements($product),
        ]);
    }
}
