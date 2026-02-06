<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Webkul\Category\Models\Category;

class CategoryMenuService
{
    public function getTree(): array
    {
        $cached = Cache::get('mobile_category_tree');
        if ($cached !== null) {
            return $cached;
        }

        $models = Category::where('status', 1)->orderBy('position')->get();
        
        $categories = [];
        foreach ($models as $cat) {
            $categories[$cat->id] = [
                'id' => $cat->id,
                'parent_id' => $cat->parent_id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'url_path' => $cat->url_path ?: $cat->slug,
            ];
        }
        
        $tree = $this->buildTree($categories, null);
        
        Cache::put('mobile_category_tree', $tree, 3600);
        
        return $tree;
    }

    private function buildTree(array $categories, $parentId): array
    {
        $result = [];
        
        foreach ($categories as $cat) {
            if ($cat['parent_id'] == $parentId) {
                $url = $cat['url_path'] ?: $cat['slug'];
                $result[] = [
                    'id' => $cat['id'],
                    'name' => $cat['name'],
                    'slug' => $cat['slug'],
                    'url' => '/' . ltrim($url, '/'),
                    'children' => $this->buildTree($categories, $cat['id'])
                ];
            }
        }
        
        return $result;
    }

    public function clearCache(): void
    {
        Cache::forget('mobile_category_tree');
    }
}
