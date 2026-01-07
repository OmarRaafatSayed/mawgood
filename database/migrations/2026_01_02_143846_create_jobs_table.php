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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ar')->nullable();
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('description_ar')->nullable();
            $table->text('requirements')->nullable();
            $table->text('requirements_ar')->nullable();
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('location');
            $table->string('city');
            $table->string('country')->default('Egypt');
            $table->enum('job_type', ['full-time', 'part-time', 'contract', 'freelance']);
            $table->string('salary_range')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('application_url');
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('customer_id');
            $table->boolean('status')->default(1);
            $table->date('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
