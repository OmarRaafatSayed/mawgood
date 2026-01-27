<?php

namespace Webkul\Sales\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = [
        'order_id',
        'payment_method',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'gateway_response',
        'metadata'
    ];

    protected $casts = [
        'gateway_response' => 'array',
        'metadata' => 'array',
        'amount' => 'decimal:4'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
