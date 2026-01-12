<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webkul\User\Models\Admin;
use Webkul\Product\Models\Product;
use Webkul\Sales\Models\Order;

class Vendor extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'status', 'commission_rate', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Product::class);
    }
}