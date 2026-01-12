<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class WalletCalculationTest extends TestCase
{
    use RefreshDatabase;

    public function test_available_balance_formula()
    {
        // Create vendor
        $vendorId = DB::table('vendors')->insertGetId([
            'customer_id' => null,
            'store_name' => 'Wallet Vendor',
            'commission_rate' => 10.00,
            'status' => 'approved',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create completed vendor_orders
        DB::table('vendor_orders')->insert([
            'vendor_id' => $vendorId,
            'order_id' => 1,
            'sub_total' => 100,
            'commission_amount' => 10,
            'vendor_amount' => 90,
            'status' => 'completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Completed payout of 20
        DB::table('vendor_payouts')->insert([
            'vendor_id' => $vendorId,
            'amount' => 20,
            'status' => 'completed',
            'requested_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Pending payout of 10
        DB::table('vendor_payouts')->insert([
            'vendor_id' => $vendorId,
            'amount' => 10,
            'status' => 'pending',
            'requested_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $totalEarnings = DB::table('vendor_orders')
            ->where('vendor_id', $vendorId)
            ->where('status', 'completed')
            ->sum('vendor_amount');

        $totalPayouts = DB::table('vendor_payouts')
            ->where('vendor_id', $vendorId)
            ->where('status', 'completed')
            ->sum('amount');

        $pendingPayouts = DB::table('vendor_payouts')
            ->where('vendor_id', $vendorId)
            ->where('status', 'pending')
            ->sum('amount');

        $availableBalance = $totalEarnings - $totalPayouts - $pendingPayouts;

        $this->assertEquals(90 - 20 - 10, $availableBalance);
    }
}
