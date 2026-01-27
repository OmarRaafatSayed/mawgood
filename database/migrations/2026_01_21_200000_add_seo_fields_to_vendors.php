<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('vendors', 'store_banner')) {
                $table->string('store_banner')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn(['store_banner', 'meta_title', 'meta_description']);
        });
    }
};
