<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendor_wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->enum('type', ['credit', 'debit']);
            $table->decimal('amount', 15, 4);
            $table->decimal('balance_after', 15, 4)->nullable();
            $table->enum('availability', ['available', 'unavailable'])->default('available');
            $table->string('reference_type')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendor_wallet_transactions');
    }
};
