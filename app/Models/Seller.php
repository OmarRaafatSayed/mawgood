<?php

namespace App\Models;

use Webkul\Customer\Models\Customer;
use Webkul\Product\Models\Product;
use Webkul\Sales\Models\Order;

class Seller extends Customer
{
    protected $table = 'customers';
    
    protected $fillable = [
        'first_name',
        'last_name', 
        'email',
        'password',
        'phone',
        'user_type',
        'shop_name',
        'shop_description',
        'logo',
        'commission_rate',
        'status',
        'is_approved'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'commission_rate' => 'decimal:2'
    ];

    // Boot method to set default user_type
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($seller) {
            $seller->user_type = 'seller';
        });
    }

    // Scope to get only sellers
    public function scopeSellers($query)
    {
        return $query->where('user_type', 'seller');
    }

    // Relationship with products
    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id');
    }

    // Get orders through products
    public function orders()
    {
        return $this->hasManyThrough(
            Order::class,
            Product::class,
            'vendor_id', // Foreign key on products table
            'id', // Foreign key on orders table
            'id', // Local key on sellers table
            'id' // Local key on products table
        )->join('order_items', 'orders.id', '=', 'order_items.order_id')
         ->where('order_items.product_id', '=', 'products.id');
    }

    // Calculate total earnings
    public function getTotalEarningsAttribute()
    {
        return $this->products()
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->sum('order_items.total');
    }

    // Calculate current balance (after commission)
    public function getCurrentBalanceAttribute()
    {
        $totalEarnings = $this->total_earnings;
        $commission = ($totalEarnings * $this->commission_rate) / 100;
        return $totalEarnings - $commission;
    }

    // Get pending orders count
    public function getPendingOrdersCountAttribute()
    {
        return $this->products()
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereIn('orders.status', ['pending', 'processing'])
            ->distinct('orders.id')
            ->count('orders.id');
    }

    // Get completed orders count
    public function getCompletedOrdersCountAttribute()
    {
        return $this->products()
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->distinct('orders.id')
            ->count('orders.id');
    }
}