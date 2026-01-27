<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'company_id')) {
                $table->unsignedInteger('company_id')->after('id')->nullable();
                $table->foreign('company_id')->references('id')->on('customers')->onDelete('cascade');
            }
            if (!Schema::hasColumn('jobs', 'type')) {
                $table->string('type')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'status')) {
                $table->enum('status', ['draft', 'published', 'closed'])->default('published');
            }
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn(['company_id', 'type', 'status']);
        });
    }
};
