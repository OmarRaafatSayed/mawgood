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
            if (!Schema::hasColumn('vendors', 'business_name')) {
                $table->string('business_name')->nullable()->after('store_description');
            }
            if (!Schema::hasColumn('vendors', 'tax_id')) {
                $table->string('tax_id')->nullable()->after('business_name');
            }
            if (!Schema::hasColumn('vendors', 'business_email')) {
                $table->string('business_email')->nullable()->after('tax_id');
            }
            if (!Schema::hasColumn('vendors', 'business_phone')) {
                $table->string('business_phone')->nullable()->after('business_email');
            }
            if (!Schema::hasColumn('vendors', 'business_address')) {
                $table->text('business_address')->nullable()->after('business_phone');
            }
            if (!Schema::hasColumn('vendors', 'facebook_url')) {
                $table->string('facebook_url')->nullable()->after('business_address');
            }
            if (!Schema::hasColumn('vendors', 'instagram_url')) {
                $table->string('instagram_url')->nullable()->after('facebook_url');
            }
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