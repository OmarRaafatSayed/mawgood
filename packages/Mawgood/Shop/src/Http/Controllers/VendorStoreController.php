<?php

namespace Mawgood\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use Mawgood\Shop\Services\VendorStoreService;

class VendorStoreController extends Controller
{
    public function __construct(
        private VendorStoreService $storeService
    ) {}

    public function show($slug)
    {
        $vendor = $this->storeService->getBySlug($slug);
        $products = $this->storeService->getProducts($vendor->id, 12);
        $averageRating = $this->storeService->getAverageRating($vendor->id);

        return view('mawgood-shop::store.show', compact('vendor', 'products', 'averageRating'));
    }

    public function about($slug)
    {
        $vendor = $this->storeService->getBySlug($slug);

        return view('mawgood-shop::store.about', compact('vendor'));
    }
}
