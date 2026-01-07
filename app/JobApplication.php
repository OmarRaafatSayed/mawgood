<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Customer\Models\Customer;

class JobApplication extends Model
{
    protected $fillable = [
        'job_listing_id',
        'customer_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'cover_letter',
        'resume_path',
        'status'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_listing_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}