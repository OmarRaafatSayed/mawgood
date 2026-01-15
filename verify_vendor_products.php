<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Vendor;

echo "=== Vendor Products Verification ===\n\n";

$vendor = Vendor::find(2);
if (!$vendor) {
    echo "❌ Vendor not found\n";
    exit(1);
}

echo "✓ Vendor: {$vendor->store_name} (ID: {$vendor->id})\n";
echo "✓ Product Count: {$vendor->products()->count()}\n\n";

echo "Product List:\n";
echo str_repeat("-", 60) . "\n";

$products = $vendor->products()->get();
if ($products->isEmpty()) {
    echo "ℹ️  No products found for this vendor yet.\n";
} else {
    foreach ($products as $index => $product) {
        echo ($index + 1) . ". ";
        echo "ID: {$product->id} | ";
        echo "SKU: {$product->sku} | ";
        echo "Type: {$product->type}\n";
    }
}

echo "\n" . str_repeat("-", 60) . "\n";
echo "✅ Verification Complete!\n";
