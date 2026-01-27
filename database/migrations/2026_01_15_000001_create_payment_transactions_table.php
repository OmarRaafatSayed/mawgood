<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->string('payment_method', 50);
            $table->string('transaction_id')->nullable();
            $table->decimal('amount', 12, 4);
            $table->string('currency', 3);
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'refunded'])->default('pending');
            $table->json('gateway_response')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->index(['transaction_id', 'payment_method']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
};
