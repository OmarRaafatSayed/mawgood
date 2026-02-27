<?php

namespace App\Http\Controllers;

use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;

class CategoryProductController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository
    ) {}

    public function index($id)
    {
        $category = $this->categoryRepository->with('children')->findOrFail($id);
        $categoryIds = $category->children->pluck('id')->push($id);
        
        $locale = app()->getLocale();
        $channel = core()->getCurrentChannel()->code;
        
        $products = \DB::table('product_flat')
            ->join('product_categories', 'product_flat.product_id', '=', 'product_categories.product_id')
            ->join('products', 'product_flat.product_id', '=', 'products.id')
            ->whereIn('product_categories.category_id', $categoryIds)
            ->where('product_flat.locale', $locale)
            ->where('product_flat.channel', $channel)
            ->where('product_flat.status', 1)
            ->where('product_flat.visible_individually', 1)
            ->select('product_flat.*')
            ->distinct()
            ->get();

        $productIds = $products->pluck('product_id');
        $images = \DB::table('product_images')
            ->whereIn('product_id', $productIds)
            ->orderBy('position')
            ->get()
            ->groupBy('product_id');
        
        $inventories = \DB::table('product_inventories')
            ->whereIn('product_id', $productIds)
            ->get()
            ->groupBy('product_id');

        return response()->json([
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'children' => $category->children->map(fn($c) => ['id' => $c->id, 'name' => $c->name])
            ],
            'products' => $products->map(function($p) use ($images, $inventories) {
                $productImages = $images->get($p->product_id, collect());
                $productInventory = $inventories->get($p->product_id, collect());
                
                return [
                    'id' => $p->product_id,
                    'name' => $p->name,
                    'price' => $p->price,
                    'images' => $productImages->map(fn($i) => ['url' => asset('storage/' . $i->path)]),
                    'in_stock' => $productInventory->sum('qty') > 0
                ];
            })
        ]);
    }

    public function filterBySubCategory()
    {
        $subCategoryId = request('sub_category_id');
        
        $locale = app()->getLocale();
        $channel = core()->getCurrentChannel()->code;
        
        $products = \DB::table('product_flat')
            ->join('product_categories', 'product_flat.product_id', '=', 'product_categories.product_id')
            ->where('product_categories.category_id', $subCategoryId)
            ->where('product_flat.locale', $locale)
            ->where('product_flat.channel', $channel)
            ->where('product_flat.status', 1)
            ->where('product_flat.visible_individually', 1)
            ->select('product_flat.*')
            ->distinct()
            ->get();

        $productIds = $products->pluck('product_id');
        $images = \DB::table('product_images')
            ->whereIn('product_id', $productIds)
            ->orderBy('position')
            ->get()
            ->groupBy('product_id');
        
        $inventories = \DB::table('product_inventories')
            ->whereIn('product_id', $productIds)
            ->get()
            ->groupBy('product_id');

        return response()->json([
            'products' => $products->map(function($p) use ($images, $inventories) {
                $productImages = $images->get($p->product_id, collect());
                $productInventory = $inventories->get($p->product_id, collect());
                
                return [
                    'id' => $p->product_id,
                    'name' => $p->name,
                    'price' => $p->price,
                    'images' => $productImages->map(fn($i) => ['url' => asset('storage/' . $i->path)]),
                    'in_stock' => $productInventory->sum('qty') > 0
                ];
            })
        ]);
    }
}
