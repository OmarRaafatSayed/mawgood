<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('profiles')) {
            Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['vendor', 'company']);
            $table->json('data')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'type']);
            
            $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');
        });
        }
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
