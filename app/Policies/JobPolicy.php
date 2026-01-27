<?php

namespace App\Policies;

use Webkul\Customer\Models\Customer;
use App\Job;

class JobPolicy
{
    public function update(Customer $user, Job $job)
    {
        return $job->company_id === $user->id 
            && session('active_role') === 'company';
    }

    public function delete(Customer $user, Job $job)
    {
        return $job->company_id === $user->id 
            && session('active_role') === 'company';
    }

    public function viewApplications(Customer $user, Job $job)
    {
        return $job->company_id === $user->id 
            && session('active_role') === 'company';
    }
}
