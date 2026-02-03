#!/usr/bin/env php
<?php

/**
 * Phase 1 Performance Optimization Verification Script
 * 
 * This script verifies that all Phase 1 optimizations are properly deployed
 * and functioning as expected.
 * 
 * Usage: php verify-phase1.php
 */

echo "\n";
echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║  PHASE 1 PERFORMANCE OPTIMIZATION VERIFICATION SCRIPT      ║\n";
echo "║  Mawgood E-Commerce Platform                               ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n";
echo "\n";

$passed = 0;
$failed = 0;
$warnings = 0;

// Test 1: Check Redis Connection
echo "🔍 Test 1: Redis Connection\n";
try {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    $pong = $redis->ping();
    if ($pong) {
        echo "   ✅ PASS: Redis is running and responding\n";
        $passed++;
    } else {
        echo "   ❌ FAIL: Redis not responding\n";
        $failed++;
    }
} catch (Exception $e) {
    echo "   ❌ FAIL: Cannot connect to Redis - " . $e->getMessage() . "\n";
    $failed++;
}
echo "\n";

// Test 2: Check Database Indexes
echo "🔍 Test 2: Database Indexes\n";
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$indexes = [
    'products' => ['idx_prod_status_visibility', 'idx_prod_created_at', 'idx_prod_vendor_status'],
    'categories' => ['idx_cat_status_parent', 'idx_cat_position_status'],
    'cart' => ['idx_cart_customer_active', 'idx_cart_created_at'],
];

foreach ($indexes as $table => $indexList) {
    foreach ($indexList as $index) {
        $result = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = ?", [$index]);
        if (!empty($result)) {
            echo "   ✅ PASS: Index '{$index}' exists on '{$table}'\n";
            $passed++;
        } else {
            echo "   ❌ FAIL: Index '{$index}' missing on '{$table}'\n";
            $failed++;
        }
    }
}
echo "\n";

// Test 3: Check Cache Driver Configuration
echo "🔍 Test 3: Cache Configuration\n";
$cacheDriver = config('cache.default');
if ($cacheDriver === 'redis') {
    echo "   ✅ PASS: Cache driver is set to Redis\n";
    $passed++;
} else {
    echo "   ⚠️  WARNING: Cache driver is '{$cacheDriver}' (expected: redis)\n";
    $warnings++;
}

$sessionDriver = config('session.driver');
if ($sessionDriver === 'redis') {
    echo "   ✅ PASS: Session driver is set to Redis\n";
    $passed++;
} else {
    echo "   ⚠️  WARNING: Session driver is '{$sessionDriver}' (expected: redis)\n";
    $warnings++;
}
echo "\n";

// Test 4: Check Production Caches
echo "🔍 Test 4: Production Caches\n";
$configCached = file_exists(base_path('bootstrap/cache/config.php'));
$routesCached = file_exists(base_path('bootstrap/cache/routes-v7.php'));
$viewsCached = is_dir(storage_path('framework/views')) && count(glob(storage_path('framework/views/*.php'))) > 0;

if ($configCached) {
    echo "   ✅ PASS: Configuration is cached\n";
    $passed++;
} else {
    echo "   ⚠️  WARNING: Configuration not cached (run: php artisan config:cache)\n";
    $warnings++;
}

if ($routesCached) {
    echo "   ✅ PASS: Routes are cached\n";
    $passed++;
} else {
    echo "   ⚠️  WARNING: Routes not cached (run: php artisan route:cache)\n";
    $warnings++;
}

if ($viewsCached) {
    echo "   ✅ PASS: Views are cached\n";
    $passed++;
} else {
    echo "   ⚠️  WARNING: Views not cached (run: php artisan view:cache)\n";
    $warnings++;
}
echo "\n";

// Test 5: Check Cache Functionality
echo "🔍 Test 5: Cache Functionality\n";
try {
    $testKey = 'phase1_verification_test_' . time();
    $testValue = 'working';
    
    Cache::put($testKey, $testValue, 60);
    $retrieved = Cache::get($testKey);
    
    if ($retrieved === $testValue) {
        echo "   ✅ PASS: Cache write/read working correctly\n";
        $passed++;
        Cache::forget($testKey);
    } else {
        echo "   ❌ FAIL: Cache not working properly\n";
        $failed++;
    }
} catch (Exception $e) {
    echo "   ❌ FAIL: Cache error - " . $e->getMessage() . "\n";
    $failed++;
}
echo "\n";

// Test 6: Check Category Cache
echo "🔍 Test 6: Category Cache Implementation\n";
$channelId = core()->getCurrentChannel()->id;
$locale = app()->getLocale();
$cacheKey = "category_tree_{$channelId}_{$locale}";

if (Cache::has($cacheKey)) {
    echo "   ✅ PASS: Category cache exists\n";
    $passed++;
} else {
    echo "   ⚠️  INFO: Category cache not populated yet (will be created on first request)\n";
    $warnings++;
}
echo "\n";

// Test 7: Check Migration Status
echo "🔍 Test 7: Migration Status\n";
$migrations = DB::table('migrations')
    ->where('migration', 'like', '%add_performance_indexes_to_core_tables%')
    ->count();

if ($migrations > 0) {
    echo "   ✅ PASS: Performance indexes migration has been run\n";
    $passed++;
} else {
    echo "   ❌ FAIL: Performance indexes migration not found (run: php artisan migrate)\n";
    $failed++;
}
echo "\n";

// Test 8: Performance Benchmark
echo "🔍 Test 8: Quick Performance Benchmark\n";
try {
    $start = microtime(true);
    $categories = app(\Webkul\Category\Repositories\CategoryRepository::class)
        ->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);
    $duration = (microtime(true) - $start) * 1000;
    
    if ($duration < 100) {
        echo "   ✅ PASS: Category tree loaded in {$duration}ms (excellent)\n";
        $passed++;
    } elseif ($duration < 300) {
        echo "   ✅ PASS: Category tree loaded in {$duration}ms (good)\n";
        $passed++;
    } else {
        echo "   ⚠️  WARNING: Category tree loaded in {$duration}ms (slower than expected)\n";
        $warnings++;
    }
} catch (Exception $e) {
    echo "   ❌ FAIL: Error loading categories - " . $e->getMessage() . "\n";
    $failed++;
}
echo "\n";

// Summary
echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║  VERIFICATION SUMMARY                                      ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n";
echo "\n";
echo "✅ Passed:   {$passed}\n";
echo "❌ Failed:   {$failed}\n";
echo "⚠️  Warnings: {$warnings}\n";
echo "\n";

if ($failed === 0 && $warnings === 0) {
    echo "🎉 EXCELLENT! All Phase 1 optimizations are properly deployed and working.\n";
    echo "   Your system is ready for production use.\n";
    exit(0);
} elseif ($failed === 0) {
    echo "✅ GOOD! All critical tests passed. Some warnings need attention.\n";
    echo "   Review warnings above and optimize as needed.\n";
    exit(0);
} else {
    echo "❌ ISSUES DETECTED! Please fix the failed tests before deploying to production.\n";
    echo "   Review the failures above and follow the deployment guide.\n";
    exit(1);
}
