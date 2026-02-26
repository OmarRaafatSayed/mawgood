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
        $categories = $this->categoryRepository
            ->where('status', 1)
            ->whereNull('parent_id')
            ->orderBy('position')
            ->get();

        return view('shop::categories.index', compact('categories'));
    }

    /**
     * Display category with sub-categories or products
     */
    public function view($id)
    {
        $category = $this->categoryRepository->findOrFail($id);

        if ($category->status != 1) {
            abort(404);
        }

        // Get sub-categories
        $subCategories = $category->children()->where('status', 1)->get();

        // Get products for this category
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
