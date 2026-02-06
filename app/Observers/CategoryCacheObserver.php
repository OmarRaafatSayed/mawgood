<?php

namespace App\Observers;

use App\Services\CategoryMenuService;
use Webkul\Category\Models\Category;

class CategoryCacheObserver
{
    public function __construct(private CategoryMenuService $service) {}

    public function saved(Category $category): void
    {
        $this->service->clearCache();
    }

    public function deleted(Category $category): void
    {
        $this->service->clearCache();
    }
}
