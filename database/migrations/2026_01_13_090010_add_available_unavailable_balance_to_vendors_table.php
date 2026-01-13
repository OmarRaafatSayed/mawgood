<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('vendors', 'available_balance')) {
                $table->decimal('available_balance', 15, 4)->default(0.0000)->after('commission_rate');
            }

            if (!Schema::hasColumn('vendors', 'unavailable_balance')) {
                $table->decimal('unavailable_balance', 15, 4)->default(0.0000)->after('available_balance');
            }
        });

        // Backfill existing wallet_balance into available_balance when present
        try {
            if (Schema::hasColumn('vendors', 'wallet_balance')) {
                DB::statement('UPDATE vendors SET available_balance = COALESCE(wallet_balance, 0)');
            }
        } catch (\Exception $e) {
            // Ignore if operation fails on older DBs
            \Log::warning('Vendor balance backfill failed: ' . $e->getMessage());
        }
    }

    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (Schema::hasColumn('vendors', 'available_balance')) {
                $table->dropColumn('available_balance');
            }

            if (Schema::hasColumn('vendors', 'unavailable_balance')) {
                $table->dropColumn('unavailable_balance');
            }
        });
    }
};
