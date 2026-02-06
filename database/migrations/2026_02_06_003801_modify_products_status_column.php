<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing products with status = 1 to keep them active
        // Update existing products with status = 0 to pending (awaiting approval)
        DB::statement("UPDATE products SET status = 0 WHERE vendor_id IS NOT NULL AND approved_by_admin = 0");
    }

    public function down(): void
    {
        // No rollback needed
    }
};
