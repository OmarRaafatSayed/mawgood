<?php

namespace Mawgood\Vendor\Services;

use Mawgood\Vendor\Models\Vendor;

class VendorWalletService
{
    public function getBalance(Vendor $vendor)
    {
        // Validate active role
        if (session('active_role') !== 'vendor') {
            throw new \Exception('Unauthorized: Invalid active role');
        }

        return [
            'available_balance' => $vendor->available_balance ?? 0,
            'unavailable_balance' => $vendor->unavailable_balance ?? 0,
            'total_balance' => $vendor->total_balance ?? 0,
        ];
    }

    public function requestWithdrawal(Vendor $vendor, float $amount)
    {
        // Validate active role
        if (session('active_role') !== 'vendor') {
            throw new \Exception('Unauthorized: Invalid active role');
        }

        if ($amount > $vendor->available_balance) {
            throw new \Exception('Insufficient balance');
        }

        // Process withdrawal logic
        $vendor->decrement('available_balance', $amount);

        return true;
    }

    public function getTransactions(Vendor $vendor)
    {
        // Validate active role
        if (session('active_role') !== 'vendor') {
            throw new \Exception('Unauthorized: Invalid active role');
        }

        // Return vendor-specific transactions only
        return collect(); // TODO: Implement transactions table
    }
}
