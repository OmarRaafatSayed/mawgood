<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository
    ) {}

    /**
     * Display all categories
     */
    public function index()
    {
        $categories = collect([
            (object)['id' => 2, 'name' => 'إلكترونيات'],
            (object)['id' => 3, 'name' => 'أزياء'],
            (object)['id' => 5, 'name' => 'جمال'],
            (object)['id' => 6, 'name' => 'رياضة'],
            (object)['id' => 7, 'name' => 'كتب'],
            (object)['id' => 9, 'name' => 'الاثاث المنزلي'],
        ]);

        return view('shop::categories.index', compact('categories'));
    }

    /**
     * Display category with sub-categories or products
     */
    public function view($id)
    {
        $category = $this->categoryRepository
            ->with(['children' => function($query) {
                $query->where('status', 1)->orderBy('position');
            }])
            ->findOrFail($id);

        if ($category->status != 1) {
            abort(404);
        }

        $products = $this->productRepository
            ->whereHas('categories', function ($query) use ($id) {
                $query->where('category_id', $id);
            })
            ->where('status', 1)
            ->where('visible_individually', 1)
            ->paginate(12);

        return view('shop::categories.view', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
