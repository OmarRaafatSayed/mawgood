<?php

namespace Mawgood\Company\Services;

use App\Job;
use Illuminate\Support\Str;

class JobPostingService
{
    public function create($user, array $data)
    {
        return Job::create([
            'company_id' => $user->id,
            'customer_id' => $user->id,
            'title' => $data['title'],
            'slug' => Str::slug($data['title']) . '-' . time(),
            'description' => $data['description'],
            'location' => $data['location'],
            'job_type' => $data['job_type'] ?? null,
            'salary_range' => $data['salary_range'] ?? null,
            'experience_level' => $data['experience_level'] ?? null,
            'status' => 'published',
        ]);
    }

    public function update(Job $job, array $data)
    {
        $job->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'location' => $data['location'],
            'job_type' => $data['job_type'] ?? null,
            'salary_range' => $data['salary_range'] ?? null,
            'experience_level' => $data['experience_level'] ?? null,
        ]);

        return $job;
    }

    public function getCompanyJobs($companyId)
    {
        return Job::where('company_id', $companyId)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }
}
