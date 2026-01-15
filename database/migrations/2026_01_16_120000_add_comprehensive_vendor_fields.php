<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('store_description');
            $table->string('tax_id')->nullable()->after('business_name');
            $table->string('business_email')->nullable()->after('tax_id');
            $table->string('business_phone')->nullable()->after('business_email');
            $table->text('business_address')->nullable()->after('business_phone');
            $table->string('facebook_url')->nullable()->after('business_address');
            $table->string('instagram_url')->nullable()->after('facebook_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn([
                'business_name',
                'tax_id', 
                'business_email',
                'business_phone',
                'business_address',
                'facebook_url',
                'instagram_url'
            ]);
        });
    }
};