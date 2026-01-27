<?php

namespace Webkul\Payment\Services;

use Webkul\Sales\Models\Order;
use Mawgood\Vendor\Services\VendorWalletUpdater;

class WebhookHandler
{
    public function __construct(
        protected PaymentTransactionLogger $logger,
        protected VendorWalletUpdater $walletUpdater
    ) {}

    public function handle(string $gateway, array $payload)
    {
        $orderId = $payload['metadata']['order_id'] ?? null;
        $transactionId = $payload['id'] ?? null;
        $status = $payload['status'] ?? 'pending';

        if (!$orderId || !$transactionId) return;

        $this->logger->updateStatus($transactionId, $status, $payload);

        if ($status === 'paid') {
            $order = Order::find($orderId);
            $order->update(['payment_status' => 'paid']);
            
            foreach ($order->vendorOrders as $vendorOrder) {
                $this->walletUpdater->onOrderPaid($vendorOrder);
            }
        }
    }
}
