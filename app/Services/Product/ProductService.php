<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\Event;
use Webkul\Product\Repositories\ProductRepository;

class ProductService
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function create(array $data)
    {
        Event::dispatch('catalog.product.create.before');

        $product = $this->productRepository->create($data);

        Event::dispatch('catalog.product.create.after', $product);

        return $product;
    }

    public function update(array $data, int $id)
    {
        Event::dispatch('catalog.product.update.before', $id);

        $product = $this->productRepository->update($data, $id);

        Event::dispatch('catalog.product.update.after', $product);

        return $product;
    }
}
