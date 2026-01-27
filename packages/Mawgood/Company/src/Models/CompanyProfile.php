<?php

namespace Mawgood\Company\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'industry',
        'description',
        'website',
        'logo',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(\Webkul\Customer\Models\Customer::class, 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class, 'company_id', 'user_id');
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }
}
