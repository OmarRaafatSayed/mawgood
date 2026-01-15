<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Webkul\Product\Models\Product;
use Webkul\Attribute\Models\AttributeFamily;

echo "\n╔════════════════════════════════════════════════════════════╗\n";
echo "║         Product Data Diagnosis - Database Check             ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n\n";

// Check products in core table
echo "1️⃣ Products Table (Core Data):\n";
echo "─────────────────────────────────────────────────────────────\n";
$products = Product::take(5)->get();
if ($products->isEmpty()) {
    echo "❌ No products found\n";
} else {
    foreach ($products as $p) {
        echo "ID: {$p->id} | SKU: {$p->sku} | Type: {$p->type} | Vendor: {$p->vendor_id}\n";
    }
}
echo "\n";

// Check product_flat table
echo "2️⃣ Product Flat Table (Display Data):\n";
echo "─────────────────────────────────────────────────────────────\n";
$flats = DB::table('product_flat')->take(5)->get();
if ($flats->isEmpty()) {
    echo "❌ No product_flat records found\n";
} else {
    foreach ($flats as $f) {
        echo "ID: {$f->id} | Product ID: {$f->product_id} | Name: {$f->name} | Status: {$f->status}\n";
        echo "   Channel: {$f->channel} | Locale: {$f->locale}\n";
    }
}
echo "\n";

// Check if products have product_flat data
echo "3️⃣ Product-ProductFlat Relationship:\n";
echo "─────────────────────────────────────────────────────────────\n";
foreach ($products as $product) {
    $flatCount = DB::table('product_flat')->where('product_id', $product->id)->count();
    $status = $flatCount > 0 ? "✓ Has {$flatCount} flat records" : "❌ No flat records";
    echo "Product {$product->id}: {$status}\n";
}
echo "\n";

// Check database structure
echo "4️⃣ Database Structure Check:\n";
echo "─────────────────────────────────────────────────────────────\n";
$hasProductFlatName = DB::getSchemaBuilder()->hasColumn('product_flat', 'name');
$hasProductFlatStatus = DB::getSchemaBuilder()->hasColumn('product_flat', 'status');
$hasProductFlatLocale = DB::getSchemaBuilder()->hasColumn('product_flat', 'locale');
$hasProductFlatChannel = DB::getSchemaBuilder()->hasColumn('product_flat', 'channel');

echo "product_flat.name: " . ($hasProductFlatName ? "✓" : "❌") . "\n";
echo "product_flat.status: " . ($hasProductFlatStatus ? "✓" : "❌") . "\n";
echo "product_flat.locale: " . ($hasProductFlatLocale ? "✓" : "❌") . "\n";
echo "product_flat.channel: " . ($hasProductFlatChannel ? "✓" : "❌") . "\n";
echo "\n";

// Check latest product creation
echo "5️⃣ Latest Product (Most Recent):\n";
echo "─────────────────────────────────────────────────────────────\n";
$latest = Product::latest('id')->first();
if ($latest) {
    echo "ID: {$latest->id}\n";
    echo "SKU: {$latest->sku}\n";
    echo "Type: {$latest->type}\n";
    echo "Vendor ID: {$latest->vendor_id}\n";
    echo "Created: {$latest->created_at}\n";
    
    $flatRecords = DB::table('product_flat')->where('product_id', $latest->id)->get();
    echo "\nFlat Records for this product:\n";
    if ($flatRecords->isEmpty()) {
        echo "❌ NO FLAT RECORDS - Product won't appear in search!\n";
    } else {
        foreach ($flatRecords as $flat) {
            echo "  - Channel: {$flat->channel}, Locale: {$flat->locale}, Name: {$flat->name}, Status: {$flat->status}\n";
        }
    }
}
echo "\n";

echo "✅ Diagnosis Complete!\n\n";
