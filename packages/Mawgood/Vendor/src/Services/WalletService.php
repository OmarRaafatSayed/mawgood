<?php

namespace Mawgood\Vendor\Services;

use App\Models\Seller;
use App\Models\SellerOrder;
use App\Models\SellerWallet;
use Mawgood\Vendor\Models\Vendor;
use Mawgood\Vendor\Models\VendorOrder;
use Webkul\Sales\Models\Invoice;
use Webkul\Sales\Models\Order;

class WalletService
{
    /**
     * Process invoice payment and update seller wallets.
     */
    public function processInvoicePayment(Invoice $invoice): void
    {
        $order = $invoice->order;

        // Process existing seller orders (backwards compatibility)
        $sellerOrders = SellerOrder::where('order_id', $order->id)->get();

        foreach ($sellerOrders as $sellerOrder) {
            $this->creditSellerWallet($sellerOrder, $invoice);
        }

        // Process vendor orders for vendor dashboard/wallet
        $vendorOrders = VendorOrder::where('order_id', $order->id)->get();

        foreach ($vendorOrders as $vendorOrder) {
            $this->creditVendorAccount($vendorOrder, $invoice);
        }
    }

    /**
     * Credit vendor account totals for vendor orders.
     */
    private function creditVendorAccount(VendorOrder $vendorOrder, Invoice $invoice): void
    {
        $vendor = Vendor::find($vendorOrder->vendor_id);

        if (! $vendor) {
            return;
        }

        // Increment vendor totals: vendor_amount already net of commission
        $vendor->increment('total_earnings', $vendorOrder->vendor_amount);
        $vendor->increment('current_balance', $vendorOrder->vendor_amount);

        // NOTE: In future we can add a vendor_wallet_transactions table for audit; for now we rely on vendor_payouts for payouts.
    }

    /**
     * Credit seller wallet.
     */
    private function creditSellerWallet(SellerOrder $sellerOrder, Invoice $invoice): void
    {
        $seller = $sellerOrder->seller;
        $wallet = $seller->wallet;

        if (!$wallet) {
            $wallet = SellerWallet::create([
                'seller_id' => $seller->id,
                'total_sales' => 0,
                'total_commission' => 0,
                'current_balance' => 0,
                'withdrawn_amount' => 0,
                'pending_amount' => 0,
            ]);
        }

        // Add credit for seller amount
        $wallet->addCredit(
            $sellerOrder->seller_amount,
            "مبيعات من الطلب #{$sellerOrder->seller_order_number}",
            [
                'order_id' => $sellerOrder->order_id,
                'seller_order_id' => $sellerOrder->id,
                'invoice_id' => $invoice->id,
                'type' => 'sale'
            ]
        );

        // Add debit for commission
        $wallet->addDebit(
            $sellerOrder->commission_amount,
            "عمولة من الطلب #{$sellerOrder->seller_order_number}",
            [
                'order_id' => $sellerOrder->order_id,
                'seller_order_id' => $sellerOrder->id,
                'invoice_id' => $invoice->id,
                'type' => 'commission'
            ]
        );
    }

    /**
     * Process refund and update seller wallet.
     */
    public function processRefund(SellerOrder $sellerOrder, float $refundAmount): void
    {
        $seller = $sellerOrder->seller;
        $wallet = $seller->wallet;

        if (!$wallet) {
            return;
        }

        // Calculate proportional amounts
        $refundProportion = $refundAmount / $sellerOrder->grand_total;
        $sellerRefund = $sellerOrder->seller_amount * $refundProportion;
        $commissionRefund = $sellerOrder->commission_amount * $refundProportion;

        // Debit seller amount
        $wallet->addDebit(
            $sellerRefund,
            "استرداد من الطلب #{$sellerOrder->seller_order_number}",
            [
                'order_id' => $sellerOrder->order_id,
                'seller_order_id' => $sellerOrder->id,
                'type' => 'refund'
            ]
        );

        // Credit back commission
        $wallet->addCredit(
            $commissionRefund,
            "استرداد عمولة من الطلب #{$sellerOrder->seller_order_number}",
            [
                'order_id' => $sellerOrder->order_id,
                'seller_order_id' => $sellerOrder->id,
                'type' => 'commission_refund'
            ]
        );
    }

    /**
     * Calculate seller earnings for a period.
     */
    public function calculateEarnings(Seller $seller, $startDate = null, $endDate = null): array
    {
        $query = $seller->walletTransactions();

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        $transactions = $query->get();

        return [
            'total_credits' => $transactions->where('type', 'credit')->sum('amount'),
            'total_debits' => $transactions->where('type', 'debit')->sum('amount'),
            'net_earnings' => $transactions->where('type', 'credit')->sum('amount') - 
                            $transactions->where('type', 'debit')->sum('amount'),
            'transaction_count' => $transactions->count(),
        ];
    }

    /**
     * Request payout for seller.
     */
    public function requestPayout(Seller $seller, float $amount, array $bankDetails): bool
    {
        $wallet = $seller->wallet;

        if (!$wallet || $wallet->current_balance < $amount) {
            return false;
        }

        // Process withdrawal
        if ($wallet->processWithdrawal($amount)) {
            // Here you would typically create a payout request record
            // and notify admin for approval
            
            // For now, we'll just log the transaction
            $seller->walletTransactions()->create([
                'type' => 'debit',
                'amount' => $amount,
                'description' => 'طلب سحب',
                'reference_type' => 'payout_request',
                'metadata' => [
                    'bank_details' => $bankDetails,
                    'status' => 'pending'
                ]
            ]);

            return true;
        }

        return false;
    }
}