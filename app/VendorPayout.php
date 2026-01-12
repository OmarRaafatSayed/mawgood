<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 'amount', 'status', 'notes', 'requested_at', 'processed_at'
    ];

    protected $casts = [
        'amount' => 'decimal:4',
        'requested_at' => 'datetime',
        'processed_at' => 'datetime',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}