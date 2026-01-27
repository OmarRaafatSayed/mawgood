<?php

namespace Webkul\Payment\Payment;

use Illuminate\Support\Facades\Http;
use Webkul\Payment\Services\PaymentTransactionLogger;

class Moyasar extends PaymentGateway
{
    protected $code = 'moyasar';
    protected $isLocal = true;

    public function getRedirectUrl()
    {
        return route('shop.payment.moyasar.redirect');
    }

    public function initiatePayment($order)
    {
        $response = Http::withBasicAuth(
            config('services.moyasar.api_key'), 
            ''
        )->post('https://api.moyasar.com/v1/payments', [
            'amount' => $order->grand_total * 100,
            'currency' => 'SAR',
            'description' => "Order #{$order->increment_id}",
            'callback_url' => route('shop.payment.moyasar.callback'),
            'source' => ['type' => 'creditcard'],
            'metadata' => ['order_id' => $order->id]
        ]);

        $data = $response->json();
        
        app(PaymentTransactionLogger::class)->log(
            $order->id, 'moyasar', $data['id'], 
            $order->grand_total, 'SAR', 'pending', $data
        );

        return $data;
    }

    public function verifyPayment($transactionId)
    {
        $response = Http::withBasicAuth(
            config('services.moyasar.api_key'), 
            ''
        )->get("https://api.moyasar.com/v1/payments/{$transactionId}");

        return $response->json();
    }

    public function handleWebhook($payload)
    {
        app(\Webkul\Payment\Services\WebhookHandler::class)->handle('moyasar', $payload);
    }
}
