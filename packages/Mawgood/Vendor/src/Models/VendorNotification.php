<?php

namespace Mawgood\Vendor\Models;

use Illuminate\Database\Eloquent\Model;

class VendorNotification extends Model
{
    protected $table = 'vendor_notifications';

    protected $fillable = [
        'vendor_id',
        'type',
        'title',
        'message',
        'data',
        'read_at'
    ];

    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function isRead()
    {
        return !is_null($this->read_at);
    }

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }
}
