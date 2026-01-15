<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('vendors', 'store_name')) {
                $table->string('store_name')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'store_slug')) {
                $table->string('store_slug')->unique()->nullable();
            }
            if (!Schema::hasColumn('vendors', 'store_description')) {
                $table->text('store_description')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'store_logo')) {
                $table->string('store_logo')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'status')) {
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            }
            if (!Schema::hasColumn('vendors', 'commission_rate')) {
                $table->decimal('commission_rate', 8, 2)->default(10.00);
            }
        });
    }

    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $columns = ['store_name', 'store_slug', 'store_description', 'store_logo', 'category_id', 'status', 'commission_rate'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('vendors', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};