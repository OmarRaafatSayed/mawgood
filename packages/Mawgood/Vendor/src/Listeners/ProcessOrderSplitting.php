<?php

namespace Mawgood\Vendor\Listeners;

use Mawgood\Vendor\Services\OrderSplittingService;
use Mawgood\Vendor\Services\VendorWalletService;

class ProcessOrderSplitting
{
    public function __construct(
        protected OrderSplittingService $orderSplittingService,
        protected VendorWalletService $walletService
    ) {}

    public function handle($order)
    {
        $this->orderSplittingService->splitOrder($order);

        if ($order->payment_status === 'paid') {
            $this->createWalletTransactions($order);
        }
    }

    protected function createWalletTransactions($order)
    {
        foreach ($order->vendorOrders as $vendorOrder) {
            $this->walletService->createTransaction([
                'vendor_id' => $vendorOrder->vendor_id,
                'order_id' => $order->id,
                'vendor_order_id' => $vendorOrder->id,
                'amount' => $vendorOrder->vendor_amount,
                'commission' => $vendorOrder->commission_amount,
                'type' => 'order_payment',
                'status' => 'pending',
                'description' => "Order #{$order->increment_id}"
            ]);
        }
    }
}
