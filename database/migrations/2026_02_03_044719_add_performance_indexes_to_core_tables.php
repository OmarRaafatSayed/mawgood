<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Products table indexes
        if (!$this->indexExists('products', 'idx_prod_status_visibility')) {
            Schema::table('products', function (Blueprint $table) {
                $table->index(['status', 'visibility'], 'idx_prod_status_visibility');
            });
        }
        
        if (!$this->indexExists('products', 'idx_prod_created_at')) {
            Schema::table('products', function (Blueprint $table) {
                $table->index('created_at', 'idx_prod_created_at');
            });
        }
        
        if (!$this->indexExists('products', 'idx_prod_vendor_status')) {
            Schema::table('products', function (Blueprint $table) {
                $table->index(['vendor_id', 'status'], 'idx_prod_vendor_status');
            });
        }

        // Categories table indexes
        if (!$this->indexExists('categories', 'idx_cat_status_parent')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->index(['status', 'parent_id'], 'idx_cat_status_parent');
            });
        }
        
        if (!$this->indexExists('categories', 'idx_cat_position_status')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->index(['position', 'status'], 'idx_cat_position_status');
            });
        }

        // Cart table indexes
        if (!$this->indexExists('cart', 'idx_cart_customer_active')) {
            Schema::table('cart', function (Blueprint $table) {
                $table->index(['customer_id', 'is_active'], 'idx_cart_customer_active');
            });
        }
        
        if (!$this->indexExists('cart', 'idx_cart_created_at')) {
            Schema::table('cart', function (Blueprint $table) {
                $table->index('created_at', 'idx_cart_created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_prod_status_visibility');
            $table->dropIndex('idx_prod_created_at');
            $table->dropIndex('idx_prod_vendor_status');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('idx_cat_status_parent');
            $table->dropIndex('idx_cat_position_status');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropIndex('idx_cart_customer_active');
            $table->dropIndex('idx_cart_created_at');
        });
    }
    
    /**
     * Check if index exists
     */
    private function indexExists($table, $indexName)
    {
        $indexes = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = ?", [$indexName]);
        return !empty($indexes);
    }
};
