<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('company_profiles')) {
            Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('company_name');
            $table->string('industry')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');
        });
        }
    }

    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
};
