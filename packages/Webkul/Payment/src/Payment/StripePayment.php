<?php

namespace Webkul\Payment\Payment;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePayment extends PaymentGateway
{
    protected $code = 'stripe';
    protected $isLocal = false;

    public function getRedirectUrl()
    {
        return route('shop.payment.stripe.redirect');
    }

    public function initiatePayment($order)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => strtolower($order->order_currency_code),
                    'product_data' => [
                        'name' => "Order #{$order->increment_id}",
                    ],
                    'unit_amount' => $order->grand_total * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('shop.payment.stripe.success'),
            'cancel_url' => route('shop.payment.stripe.cancel'),
            'metadata' => [
                'order_id' => $order->id
            ]
        ]);

        return $session;
    }

    public function verifyPayment($transactionId)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        return Session::retrieve($transactionId);
    }

    public function handleWebhook($payload)
    {
        // Verify webhook signature
        // Update order status
        // Create transaction record
    }
}
