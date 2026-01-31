<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-product-view', function() {
    $productRepo = app(\Webkul\Product\Repositories\ProductRepository::class);
    $product = $productRepo->findBySlug('mntg-gdyd-1769725215');
    
    if (!$product) {
        return 'Product not found';
    }
    
    try {
        return view('shop::products.view', compact('product'));
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage() . '<br>File: ' . $e->getFile() . '<br>Line: ' . $e->getLine();
    }
});