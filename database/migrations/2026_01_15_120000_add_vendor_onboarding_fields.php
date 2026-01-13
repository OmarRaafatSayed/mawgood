<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table) {
            if (!Schema::hasColumn('sellers', 'store_slug')) {
                $table->string('store_slug')->unique()->after('store_name');
            }
            if (!Schema::hasColumn('sellers', 'category_id')) {
                $table->unsignedInteger('category_id')->nullable()->after('store_description');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            if (Schema::hasColumn('sellers', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
            if (Schema::hasColumn('sellers', 'store_slug')) {
                $table->dropColumn('store_slug');
            }
        });
    }
};