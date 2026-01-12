<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Models\Customer;
use Webkul\Product\Models\Product;

class Vendor extends Model
{
    protected $table = 'sellers';

    protected $fillable = [
        'customer_id',
        'store_name',
        'store_description',
        'store_logo',
        'store_banner',
        'commission_rate',
        'status',
        'total_earnings',
        'current_balance',
        'bank_details'
    ];

    protected $casts = [
        'commission_rate' => 'decimal:2',
        'total_earnings' => 'decimal:2',
        'current_balance' => 'decimal:2',
        'bank_details' => 'array'
    ];

    /**
     * Get the customer that owns the vendor
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the products for the vendor
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
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
}