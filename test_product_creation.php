<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Vendor;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Product\Models\Product;

// Get test vendor
$vendor = Vendor::where('store_name', 'Test Store')->first();
if (!$vendor) {
    echo "❌ Test vendor not found\n";
    exit(1);
}

echo "✅ Found test vendor: {$vendor->store_name} (ID: {$vendor->id})\n";

// Create test product
try {
    // Get default attribute family
    $attrFamily = AttributeFamily::first();
    if (!$attrFamily) {
        echo "❌ No attribute family found\n";
        exit(1);
    }

    // Generate SKU
    $sku = 'SKU-TEST-' . strtoupper(substr(md5(microtime()), 0, 8));
    
    echo "\n📝 Creating product...\n";
    echo "   Vendor ID: {$vendor->id}\n";
    echo "   SKU: $sku\n";
    echo "   Attribute Family ID: {$attrFamily->id}\n";
    
    // Create product
    $product = Product::create([
        'sku' => $sku,
        'type' => 'simple',
        'attribute_family_id' => $attrFamily->id,
        'vendor_id' => $vendor->id,
    ]);

    echo "   Product ID: {$product->id}\n";
    echo "\n✅ Product created successfully!\n";

    // Verify product
    $createdProduct = Product::findOrFail($product->id);
    echo "\n✓ Verification:\n";
    echo "   SKU: {$createdProduct->sku}\n";
    echo "   Vendor ID: {$createdProduct->vendor_id}\n";
    echo "   Type: {$createdProduct->type}\n";
    echo "   Created at: {$createdProduct->created_at}\n";

    // Check in vendor's products
    $vendorProducts = $vendor->products()->count();
    echo "\n✓ Vendor products count: $vendorProducts\n";

} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack: " . $e->getTraceAsString() . "\n";
    exit(1);
}

echo "\n✅ All tests passed!\n";
