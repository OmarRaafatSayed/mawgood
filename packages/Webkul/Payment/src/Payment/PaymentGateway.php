<?php

namespace Webkul\Payment\Payment;

abstract class PaymentGateway extends Payment
{
    protected $isLocal = false;
    
    abstract public function initiatePayment($order);
    abstract public function verifyPayment($transactionId);
    abstract public function handleWebhook($payload);
    
    public function isLocal(): bool
    {
        return $this->isLocal;
    }
    
    public function getCurrency()
    {
        return $this->isLocal ? 'SAR' : core()->getCurrentCurrencyCode();
    }
}
