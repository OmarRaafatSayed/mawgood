<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobCategory extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'slug',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function getNameAttribute($value)
    {
        return app()->getLocale() === 'ar' && $this->name_ar ? $this->name_ar : $value;
    }
}