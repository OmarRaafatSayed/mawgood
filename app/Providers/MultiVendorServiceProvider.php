<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Webkul\Sales\Models\Order;
use App\Models\Seller;
use App\Models\SellerOrder;
use App\Services\OrderSplittingService;
use App\Services\WalletService;

class MultiVendorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(OrderSplittingService::class);
        $this->app->singleton(WalletService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register Blade components
        Blade::component('vendor-layout', \App\View\Components\VendorLayout::class);

        // Listen to order events
        Event::listen('sales.order.save.after', function ($order) {
            $this->handleOrderCreated($order);
        });

        Event::listen('sales.order.update.after', function ($order) {
            $this->handleOrderUpdated($order);
        });

        Event::listen('sales.invoice.save.after', function ($invoice) {
            $this->handleInvoiceCreated($invoice);
        });

        Event::listen('sales.shipment.save.after', function ($shipment) {
            $this->handleShipmentCreated($shipment);
        });
    }

    /**
     * Handle order created event.
     */
    private function handleOrderCreated($order)
    {
        $orderSplittingService = app(OrderSplittingService::class);
        $orderSplittingService->splitOrder($order);
    }

    /**
     * Handle order updated event.
     */
    private function handleOrderUpdated($order)
    {
        // Update seller orders status based on parent order
        SellerOrder::where('order_id', $order->id)->each(function ($sellerOrder) use ($order) {
            if ($order->status === 'canceled') {
                $sellerOrder->update(['status' => 'cancelled']);
            }
        });
    }

    /**
     * Handle invoice created event.
     */
    private function handleInvoiceCreated($invoice)
    {
        $walletService = app(WalletService::class);
        $walletService->processInvoicePayment($invoice);
    }

    /**
     * Handle shipment created event.
     */
    private function handleShipmentCreated($shipment)
    {
        // Update seller orders to shipped status
        $order = $shipment->order;
        
        SellerOrder::where('order_id', $order->id)
            ->where('status', 'processing')
            ->update(['status' => 'shipped']);
    }
}