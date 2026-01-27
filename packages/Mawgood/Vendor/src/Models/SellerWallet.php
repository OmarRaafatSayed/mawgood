<?php

namespace Mawgood\Vendor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellerWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'total_sales',
        'total_commission',
        'current_balance',
        'withdrawn_amount',
        'pending_amount'
    ];

    protected $casts = [
        'total_sales' => 'decimal:2',
        'total_commission' => 'decimal:2',
        'current_balance' => 'decimal:2',
        'withdrawn_amount' => 'decimal:2',
        'pending_amount' => 'decimal:2',
    ];

    /**
     * Get the seller that owns the wallet.
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * Add credit to wallet.
     */
    public function addCredit(float $amount, string $description, array $metadata = []): void
    {
        $this->increment('current_balance', $amount);
        $this->increment('total_sales', $amount);

        $this->seller->walletTransactions()->create([
            'type' => 'credit',
            'amount' => $amount,
            'description' => $description,
            'metadata' => $metadata,
        ]);
    }

    /**
     * Add debit to wallet.
     */
    public function addDebit(float $amount, string $description, array $metadata = []): void
    {
        $this->decrement('current_balance', $amount);
        $this->increment('total_commission', $amount);

        $this->seller->walletTransactions()->create([
            'type' => 'debit',
            'amount' => $amount,
            'description' => $description,
            'metadata' => $metadata,
        ]);
    }

    /**
     * Process withdrawal.
     */
    public function processWithdrawal(float $amount): bool
    {
        if ($this->current_balance >= $amount) {
            $this->decrement('current_balance', $amount);
            $this->increment('withdrawn_amount', $amount);

            $this->seller->walletTransactions()->create([
                'type' => 'debit',
                'amount' => $amount,
                'description' => 'Withdrawal request',
                'reference_type' => 'withdrawal',
            ]);

            return true;
        }

        return false;
    }
}