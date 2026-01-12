<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('sellers')) {
            Schema::create('sellers', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('customer_id');
                $table->string('store_name');
                $table->text('store_description')->nullable();
                $table->string('store_logo')->nullable();
                $table->string('store_banner')->nullable();
                $table->decimal('commission_rate', 5, 2)->default(10.00);
                $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
                $table->decimal('total_earnings', 12, 2)->default(0.00);
                $table->decimal('current_balance', 12, 2)->default(0.00);
                $table->json('bank_details')->nullable();
                $table->timestamps();
                
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->index(['customer_id', 'status']);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('sellers');
    }
};