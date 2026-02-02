<?php

/**
 * Script سريع لإصلاح جميع المنتجات الموجودة
 * 
 * الاستخدام:
 * php fix-all-products.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Services\ProductApprovalService;
use Webkul\Product\Repositories\ProductRepository;

echo "🚀 بدء إصلاح جميع المنتجات...\n\n";

$approvalService = app(ProductApprovalService::class);
$productRepository = app(ProductRepository::class);

// جلب جميع المنتجات بانتظار الموافقة
$pendingProducts = $productRepository
    ->where('approved_by_admin', false)
    ->whereNotNull('vendor_id')
    ->get();

echo "📦 تم العثور على {$pendingProducts->count()} منتج بانتظار الموافقة\n\n";

if ($pendingProducts->isEmpty()) {
    echo "✅ لا توجد منتجات تحتاج إصلاح\n";
    exit(0);
}

$approved = 0;
$failed = 0;

foreach ($pendingProducts as $product) {
    try {
        echo "⏳ معالجة المنتج #{$product->id} ({$product->sku})... ";
        $approvalService->approveProduct($product->id);
        echo "✅\n";
        $approved++;
    } catch (\Exception $e) {
        echo "❌ خطأ: {$e->getMessage()}\n";
        $failed++;
    }
}

echo "\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "✅ تمت الموافقة على: {$approved} منتج\n";

if ($failed > 0) {
    echo "❌ فشل: {$failed} منتج\n";
}

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "\n🎉 تم! جميع المنتجات الآن مرئية في الموقع\n";
echo "\n💡 نصيحة: امسح الـ Cache:\n";
echo "   php artisan cache:clear\n";
echo "   php artisan config:clear\n";
