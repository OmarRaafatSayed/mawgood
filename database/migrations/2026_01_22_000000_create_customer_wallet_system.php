<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customer_wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id');
            $table->enum('type', ['charge', 'refund', 'payment']);
            $table->decimal('amount', 12, 4);
            $table->string('currency', 3)->default('SAR');
            $table->json('metadata')->nullable();
            $table->timestamp('created_at');
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'wallet_balance')) {
                $table->decimal('wallet_balance', 12, 4)->default(0);
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_wallet_transactions');
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('wallet_balance');
        });
    }
};
