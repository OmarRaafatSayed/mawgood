<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vendor_orders', function (Blueprint $table) {
            $table->decimal('tax_amount', 12, 4)->default(0)->after('sub_total');
            $table->decimal('shipping_amount', 12, 4)->default(0)->after('tax_amount');
            $table->decimal('discount_amount', 12, 4)->default(0)->after('shipping_amount');
            $table->decimal('grand_total', 12, 4)->default(0)->after('discount_amount');
        });
    }

    public function down()
    {
        Schema::table('vendor_orders', function (Blueprint $table) {
            $table->dropColumn(['tax_amount', 'shipping_amount', 'discount_amount', 'grand_total']);
        });
    }
};
