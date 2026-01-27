<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('store_name')->nullable()->after('shop_name');
            $table->string('store_slug')->unique()->nullable()->after('store_name');
            $table->text('store_description')->nullable()->after('store_slug');
            $table->string('store_logo')->nullable()->after('store_description');
            $table->unsignedBigInteger('category_id')->nullable()->after('store_logo');
            $table->string('business_name')->nullable()->after('category_id');
            $table->string('tax_id')->nullable()->after('business_name');
            $table->string('business_email')->nullable()->after('tax_id');
            $table->string('business_phone')->nullable()->after('business_email');
            $table->text('business_address')->nullable()->after('business_phone');
            $table->string('facebook_url')->nullable()->after('business_address');
            $table->string('instagram_url')->nullable()->after('facebook_url');
        });
    }

    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn([
                'store_name', 'store_slug', 'store_description', 'store_logo',
                'category_id', 'business_name', 'tax_id', 'business_email',
                'business_phone', 'business_address', 'facebook_url', 'instagram_url'
            ]);
        });
    }
};
