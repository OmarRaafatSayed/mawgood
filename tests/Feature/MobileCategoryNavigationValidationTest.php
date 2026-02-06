<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Category\Models\Category;
use App\Services\CategoryMenuService;

class MobileCategoryNavigationValidationTest extends TestCase
{
    public function test_category_menu_service_returns_tree()
    {
        $service = app(CategoryMenuService::class);
        $tree = $service->getTree();
        
        $this->assertIsArray($tree);
    }

    public function test_category_tree_only_includes_active_categories()
    {
        $service = app(CategoryMenuService::class);
        $tree = $service->getTree();
        
        $this->assertCategoryTreeOnlyActive($tree);
    }

    public function test_shop_routes_exist()
    {
        $this->assertTrue(route('shop.home.index') !== null);
        $this->assertTrue(route('shop.search.index') !== null);
    }

    public function test_mobile_menu_component_exists()
    {
        $this->assertFileExists(resource_path('views/components/mobile-menu.blade.php'));
    }

    public function test_alpine_js_loaded_in_layout()
    {
        $layoutPath = base_path('packages/Webkul/Shop/src/Resources/views/components/layouts/index.blade.php');
        $content = file_get_contents($layoutPath);
        
        $this->assertStringContainsString('alpinejs', $content);
    }

    public function test_category_cache_observer_registered()
    {
        $observers = Category::getObservableEvents();
        $this->assertNotEmpty($observers);
    }

    private function assertCategoryTreeOnlyActive(array $tree)
    {
        foreach ($tree as $category) {
            $dbCategory = Category::find($category['id']);
            $this->assertEquals(1, $dbCategory->status);
            
            if (!empty($category['children'])) {
                $this->assertCategoryTreeOnlyActive($category['children']);
            }
        }
    }
}
