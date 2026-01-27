<?php

namespace Webkul\Payment\Services;

use Webkul\Sales\Models\PaymentTransaction;

class PaymentTransactionLogger
{
    public function log($orderId, string $method, string $transactionId, float $amount, string $currency, string $status, array $response = [])
    {
        return PaymentTransaction::create([
            'order_id' => $orderId,
            'payment_method' => $method,
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'currency' => $currency,
            'status' => $status,
            'gateway_response' => $response
        ]);
    }

    public function updateStatus($transactionId, string $status, array $response = [])
    {
        PaymentTransaction::where('transaction_id', $transactionId)->update([
            'status' => $status,
            'gateway_response' => $response
        ]);
    }
}
