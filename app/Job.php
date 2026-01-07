<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Customer\Models\Customer;

class Job extends Model
{
    protected $table = 'job_listings';
    protected $fillable = [
        'title',
        'title_ar',
        'slug',
        'description',
        'description_ar',
        'requirements',
        'requirements_ar',
        'company_name',
        'company_logo',
        'location',
        'city',
        'country',
        'job_type',
        'salary_range',
        'experience_level',
        'application_url',
        'job_category_id',
        'customer_id',
        'status',
        'expires_at'
    ];

    protected $casts = [
        'status' => 'boolean',
        'expires_at' => 'date'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'job_listing_id');
    }

    public function getTitleAttribute($value)
    {
        return app()->getLocale() === 'ar' && $this->title_ar ? $this->title_ar : $value;
    }

    public function getDescriptionAttribute($value)
    {
        return app()->getLocale() === 'ar' && $this->description_ar ? $this->description_ar : $value;
    }

    public function getRequirementsAttribute($value)
    {
        return app()->getLocale() === 'ar' && $this->requirements_ar ? $this->requirements_ar : $value;
    }
}