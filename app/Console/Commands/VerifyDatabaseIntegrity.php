<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Vendor;
use App\Models\VendorOrder;
use Webkul\Product\Models\Product;
use Webkul\Customer\Models\Customer;

class VerifyDatabaseIntegrity extends Command
{
    protected $signature = 'db:verify-integrity';
    protected $description = 'Verify database integrity for products, vendors, and customers';

    public function handle()
    {
        $this->info('🔍 Starting database integrity check...');
        $this->newLine();

        // Check 1: Products without vendor_id
        $this->checkProductVendorRelationship();

        // Check 2: Vendor-Product consistency
        $this->checkVendorProductConsistency();

        // Check 3: Orders consistency
        $this->checkOrderConsistency();

        // Check 4: Customer-Vendor relationship
        $this->checkCustomerVendorRelationship();

        // Check 5: Table structure
        $this->checkTableStructure();

        $this->info('✅ Database integrity check completed!');
        $this->newLine();
    }

    /**
     * Check products have valid vendor_id
     */
    private function checkProductVendorRelationship()
    {
        $this->info('📦 Checking Product-Vendor relationship...');

        $orphanProducts = DB::table('products')
            ->whereNull('vendor_id')
            ->count();

        if ($orphanProducts > 0) {
            $this->warn("⚠️  Found {$orphanProducts} products without vendor_id");
        } else {
            $this->line('✓ All products have valid vendor_id');
        }

        $invalidVendorProducts = DB::table('products')
            ->leftJoin('vendors', 'products.vendor_id', '=', 'vendors.id')
            ->whereNotNull('products.vendor_id')
            ->whereNull('vendors.id')
            ->count();

        if ($invalidVendorProducts > 0) {
            $this->warn("⚠️  Found {$invalidVendorProducts} products with non-existent vendor_id");
        } else {
            $this->line('✓ All product vendors exist');
        }
    }

    /**
     * Check vendor-product data consistency
     */
    private function checkVendorProductConsistency()
    {
        $this->info('🏪 Checking Vendor-Product consistency...');

        $vendors = Vendor::all();

        foreach ($vendors as $vendor) {
            $productCount = $vendor->products()->count();
            $this->line("  Vendor: {$vendor->store_name} - Products: {$productCount}");

            // Check if vendor has valid customer
            if (!$vendor->customer) {
                $this->warn("    ⚠️  Vendor has invalid customer_id");
            }
        }
    }

    /**
     * Check orders consistency
     */
    private function checkOrderConsistency()
    {
        $this->info('📋 Checking Order consistency...');

        $orphanOrders = DB::table('vendor_orders')
            ->leftJoin('vendors', 'vendor_orders.vendor_id', '=', 'vendors.id')
            ->whereNull('vendors.id')
            ->count();

        if ($orphanOrders > 0) {
            $this->warn("⚠️  Found {$orphanOrders} vendor_orders with non-existent vendor");
        } else {
            $this->line('✓ All vendor_orders have valid vendors');
        }

        $orphanOrderItems = DB::table('vendor_order_items')
            ->leftJoin('vendor_orders', 'vendor_order_items.vendor_order_id', '=', 'vendor_orders.id')
            ->whereNull('vendor_orders.id')
            ->count();

        if ($orphanOrderItems > 0) {
            $this->warn("⚠️  Found {$orphanOrderItems} vendor_order_items with non-existent vendor_orders");
        } else {
            $this->line('✓ All vendor_order_items have valid vendor_orders');
        }
    }

    /**
     * Check customer-vendor relationship
     */
    private function checkCustomerVendorRelationship()
    {
        $this->info('👥 Checking Customer-Vendor relationship...');

        $orphanVendors = DB::table('vendors')
            ->leftJoin('customers', 'vendors.customer_id', '=', 'customers.id')
            ->whereNull('customers.id')
            ->count();

        if ($orphanVendors > 0) {
            $this->warn("⚠️  Found {$orphanVendors} vendors with non-existent customer");
        } else {
            $this->line('✓ All vendors have valid customers');
        }
    }

    /**
     * Check table structure
     */
    private function checkTableStructure()
    {
        $this->info('📊 Checking table structure...');

        $tables = [
            'products' => ['vendor_id', 'sku', 'type'],
            'product_flat' => ['name', 'status', 'product_id'],
            'vendors' => ['customer_id', 'store_name', 'status'],
            'vendor_orders' => ['vendor_id', 'order_id', 'status'],
            'vendor_order_items' => ['vendor_order_id', 'order_item_id'],
        ];

        foreach ($tables as $table => $columns) {
            if (!Schema::hasTable($table)) {
                $this->warn("⚠️  Table '{$table}' does not exist");
                continue;
            }

            foreach ($columns as $column) {
                if (!Schema::hasColumn($table, $column)) {
                    $this->warn("⚠️  Table '{$table}' missing column '{$column}'");
                } else {
                    $this->line("  ✓ {$table}.{$column}");
                }
            }
        }
    }
}
