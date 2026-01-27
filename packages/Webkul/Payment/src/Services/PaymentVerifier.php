<?php

namespace Webkul\Payment\Services;

class PaymentVerifier
{
    public function verify(string $gateway, string $transactionId): array
    {
        $gatewayClass = config("payment_methods.{$gateway}.class");
        $instance = app($gatewayClass);
        
        return $instance->verifyPayment($transactionId);
    }

    public function isValid(array $response): bool
    {
        return isset($response['status']) && in_array($response['status'], ['paid', 'completed', 'success']);
    }
}
