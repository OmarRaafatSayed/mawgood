<?php

namespace Mawgood\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use Mawgood\Shop\Services\VendorStoreService;

class VendorStoreProductController extends Controller
{
    public function __construct(
        private VendorStoreService $storeService
    ) {}

    public function index($slug)
    {
        $vendor = $this->storeService->getBySlug($slug);
        $products = $this->storeService->getProducts($vendor->id, 24);

        return view('mawgood-shop::store.products', compact('vendor', 'products'));
    }
}
