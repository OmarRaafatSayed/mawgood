<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('job_applications', 'job_id')) {
                $table->unsignedBigInteger('job_id')->after('id');
                $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade');
            }
            if (!Schema::hasColumn('job_applications', 'user_id')) {
                $table->unsignedInteger('user_id')->after('job_id');
                $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
