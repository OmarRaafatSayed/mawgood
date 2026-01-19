<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Models\Customer;
use Webkul\Product\Models\Product;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'password',
        'store_name',
        'store_slug',
        'store_description',
        'store_logo',
        'category_id',
        'phone',
        'address',
        'commercial_register',
        'commission_rate',
        'wallet_balance',
        'available_balance',
        'unavailable_balance',
        'status',
        'rejection_reason',
        'business_name',
        'tax_id',
        'business_email',
        'business_phone',
        'business_address',
        'facebook_url',
        'instagram_url'
    ];

    protected $casts = [
        'commission_rate' => 'decimal:2',
        'wallet_balance' => 'decimal:2',
        'available_balance' => 'decimal:4',
        'unavailable_balance' => 'decimal:4',
        'email_verified_at' => 'timestamp'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the customer that owns the vendor
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Get the category for the vendor
     */
    public function category()
    {
        return $this->belongsTo(\Webkul\Category\Models\Category::class, 'category_id');
    }

    /**
     * Get vendor orders
     */
    public function vendorOrders()
    {
        return $this->hasMany(\App\VendorOrder::class, 'vendor_id');
    }

    /**
     * Get the products for the vendor
     */
    public function products()
    {
        return $this->hasMany(\Webkul\Product\Models\Product::class, 'vendor_id');
    }

    public function orders()
    {
        return $this->hasMany(\Webkul\Sales\Models\Order::class, 'vendor_id');
    }
    /**
     * Check if vendor is approved
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if vendor is pending
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if vendor is suspended
     */
    public function isSuspended()
    {
        return $this->status === 'suspended';
    }

    /**
     * Get vendor's commission amount for a given sale
     */
    public function getCommissionAmount($saleAmount)
    {
        return ($saleAmount * $this->commission_rate) / 100;
    }

    /**
     * Get vendor's earning amount for a given sale
     */
    public function getEarningAmount($saleAmount)
    {
        return $saleAmount - $this->getCommissionAmount($saleAmount);
    }

    /**
     * Get total balance (available + unavailable)
     */
    public function getTotalBalanceAttribute()
    {
        return ($this->available_balance ?? 0) + ($this->unavailable_balance ?? 0);
    }
}