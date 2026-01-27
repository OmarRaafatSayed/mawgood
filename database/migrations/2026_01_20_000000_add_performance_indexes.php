<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Only add indexes for existing columns and tables
        try {
            Schema::table('products', function (Blueprint $table) {
                $table->index('vendor_id', 'idx_products_vendor');
            });
        } catch (\Exception $e) {}

        try {
            Schema::table('orders', function (Blueprint $table) {
                $table->index('created_at', 'idx_orders_created_at');
            });
        } catch (\Exception $e) {}
    }

    public function down()
    {
        try {
            Schema::table('products', function (Blueprint $table) {
                $table->dropIndex('idx_products_vendor');
            });
        } catch (\Exception $e) {}

        try {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropIndex('idx_orders_created_at');
            });
        } catch (\Exception $e) {}
    }
};