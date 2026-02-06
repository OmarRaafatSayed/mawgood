#!/usr/bin/env php
<?php

/**
 * Mobile Category Navigation - Quick Validation Script
 * Run: php validate-mobile-nav.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "\n=== Mobile Category Navigation Validation ===\n\n";

// Test 1: Category Service
echo "1. Testing CategoryMenuService...\n";
try {
    $service = app(\App\Services\CategoryMenuService::class);
    $tree = $service->getTree();
    echo "   ✓ Service instantiated\n";
    echo "   ✓ Tree generated: " . count($tree) . " root categories\n";
} catch (Exception $e) {
    echo "   ✗ ERROR: " . $e->getMessage() . "\n";
}

// Test 2: Routes
echo "\n2. Testing Routes...\n";
$routes = [
    'shop.home.index',
    'shop.search.index',
    'shop.customer.session.index',
    'shop.customers.account.orders.index',
];
foreach ($routes as $route) {
    try {
        route($route);
        echo "   ✓ $route\n";
    } catch (Exception $e) {
        echo "   ✗ $route - MISSING\n";
    }
}

// Test 3: Files
echo "\n3. Testing Files...\n";
$files = [
    'resources/views/components/mobile-menu.blade.php',
    'app/Services/CategoryMenuService.php',
    'app/Observers/CategoryCacheObserver.php',
];
foreach ($files as $file) {
    if (file_exists(base_path($file))) {
        echo "   ✓ $file\n";
    } else {
        echo "   ✗ $file - MISSING\n";
    }
}

// Test 4: Alpine.js in Layout
echo "\n4. Testing Alpine.js Integration...\n";
$layoutPath = base_path('packages/Webkul/Shop/src/Resources/views/components/layouts/index.blade.php');
if (file_exists($layoutPath)) {
    $content = file_get_contents($layoutPath);
    if (strpos($content, 'alpinejs') !== false) {
        echo "   ✓ Alpine.js loaded in layout\n";
    } else {
        echo "   ✗ Alpine.js NOT found in layout\n";
    }
} else {
    echo "   ✗ Layout file not found\n";
}

// Test 5: Cache
echo "\n5. Testing Cache...\n";
try {
    $cached = Cache::has('mobile_category_tree');
    if ($cached) {
        echo "   ✓ Category tree cached\n";
    } else {
        echo "   ℹ Category tree not cached (will be generated on first request)\n";
    }
} catch (Exception $e) {
    echo "   ✗ Cache error: " . $e->getMessage() . "\n";
}

// Test 6: Database
echo "\n6. Testing Database...\n";
try {
    $count = \Webkul\Category\Models\Category::where('status', 1)->count();
    echo "   ✓ Active categories: $count\n";
} catch (Exception $e) {
    echo "   ✗ Database error: " . $e->getMessage() . "\n";
}

echo "\n=== Validation Complete ===\n";
echo "\nNext Steps:\n";
echo "1. Start server: php artisan serve\n";
echo "2. Open: http://127.0.0.1:8000\n";
echo "3. Resize to mobile viewport (375px)\n";
echo "4. Click hamburger menu icon\n";
echo "5. Test category navigation\n\n";
