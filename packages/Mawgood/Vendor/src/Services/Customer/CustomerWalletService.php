<?php

namespace Mawgood\Vendor\Services\Customer;

use Webkul\Customer\Models\Customer;

class CustomerWalletService
{
    public function charge(Customer $customer, float $amount, string $currency = 'SAR', array $metadata = [])
    {
        $amountInBase = $this->convertToBase($amount, $currency);
        
        $customer->increment('wallet_balance', $amountInBase);
        
        $this->logTransaction($customer, 'charge', $amountInBase, $currency, $metadata);
    }

    public function refund(Customer $customer, float $amount, string $currency = 'SAR', array $metadata = [])
    {
        $amountInBase = $this->convertToBase($amount, $currency);
        
        if ($customer->wallet_balance < $amountInBase) {
            throw new \Exception('Insufficient balance');
        }
        
        $customer->decrement('wallet_balance', $amountInBase);
        
        $this->logTransaction($customer, 'refund', $amountInBase, $currency, $metadata);
    }

    private function convertToBase(float $amount, string $currency): float
    {
        if ($currency === 'SAR') return $amount;
        
        $rates = cache()->remember('exchange_rates', 3600, fn() => [
            'USD' => 3.75, 'EUR' => 4.10, 'SAR' => 1
        ]);
        
        return $amount * $rates[$currency];
    }

    private function logTransaction(Customer $customer, string $type, float $amount, string $currency, array $metadata)
    {
        \DB::table('customer_wallet_transactions')->insert([
            'customer_id' => $customer->id,
            'type' => $type,
            'amount' => $amount,
            'currency' => $currency,
            'metadata' => json_encode($metadata),
            'created_at' => now()
        ]);
    }
}
