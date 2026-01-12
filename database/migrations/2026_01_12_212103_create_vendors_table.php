<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('shop_name');
            $table->text('shop_description')->nullable();
            $table->string('shop_logo')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('commercial_register')->nullable();
            $table->decimal('commission_rate', 5, 2)->default(10.00);
            $table->decimal('wallet_balance', 15, 2)->default(0.00);
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};