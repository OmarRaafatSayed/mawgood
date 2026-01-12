<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;

class SellerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'order_id',
        'seller_order_number',
        'status',
        'sub_total',
        'tax_amount',
        'shipping_amount',
        'discount_amount',
        'grand_total',
        'commission_amount',
        'seller_amount',
        'shipping_info',
        'notes'
    ];

    protected $casts = [
        'sub_total' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'shipping_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'commission_amount' => 'decimal:2',
        'seller_amount' => 'decimal:2',
        'shipping_info' => 'array',
    ];

    /**
     * Get the seller that owns the order.
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * Get the parent order.
     */
    public function parentOrder(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Get the order items for this seller.
     */
    public function items()
    {
        return $this->parentOrder->items()->whereHas('product', function ($query) {
            $query->where('seller_id', $this->seller_id);
        });
    }

    /**
     * Generate unique seller order number.
     */
    public static function generateOrderNumber(): string
    {
        $prefix = 'SO-';
        $timestamp = now()->format('YmdHis');
        $random = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        
        return $prefix . $timestamp . $random;
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sellerOrder) {
            if (empty($sellerOrder->seller_order_number)) {
                $sellerOrder->seller_order_number = self::generateOrderNumber();
            }
        });
    }

    /**
     * Get status badge class.
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'pending' => 'label-pending',
            'processing' => 'label-info',
            'shipped' => 'label-active',
            'delivered' => 'label-active',
            'cancelled' => 'label-canceled',
            'refunded' => 'label-canceled',
            default => 'label-pending'
        };
    }

    /**
     * Get status in Arabic.
     */
    public function getStatusInArabicAttribute(): string
    {
        return match($this->status) {
            'pending' => 'في الانتظار',
            'processing' => 'قيد المعالجة',
            'shipped' => 'تم الشحن',
            'delivered' => 'تم التسليم',
            'cancelled' => 'ملغي',
            'refunded' => 'مسترد',
            default => 'في الانتظار'
        };
    }
}