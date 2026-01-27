<?php

namespace Mawgood\Vendor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'vendor_id', 'sub_total', 'tax_amount', 'shipping_amount',
        'discount_amount', 'grand_total', 'commission_amount', 'vendor_amount', 'status'
    ];

    protected $casts = [
        'sub_total' => 'decimal:4',
        'tax_amount' => 'decimal:4',
        'shipping_amount' => 'decimal:4',
        'discount_amount' => 'decimal:4',
        'grand_total' => 'decimal:4',
        'commission_amount' => 'decimal:4',
        'vendor_amount' => 'decimal:4',
    ];

    public function order()
    {
        return $this->belongsTo(\Webkul\Sales\Models\Order::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
}