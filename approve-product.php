<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Services\ProductApprovalService;

$productId = $argv[1] ?? null;

if (!$productId) {
    echo "Usage: php approve-product.php [PRODUCT_ID]\n";
    exit(1);
}

echo "🔄 Approving product #{$productId}...\n";

try {
    $service = app(ProductApprovalService::class);
    $service->approveProduct($productId);
    
    echo "✅ Product #{$productId} approved successfully!\n";
    echo "🎉 Product is now visible on the website\n";
    
} catch (\Exception $e) {
    echo "❌ Error: {$e->getMessage()}\n";
    exit(1);
}
