<?php

namespace Mawgood\Company\Services;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Notification;

class ApplicationReviewService
{
    public function accept($applicationId, $companyUser)
    {
        $application = JobApplication::findOrFail($applicationId);
        
        if ($application->job->company_id !== $companyUser->id) {
            throw new \Exception('Unauthorized');
        }

        $application->update(['status' => 'accepted']);

        // TODO: Send notification to applicant
        
        return $application;
    }

    public function reject($applicationId, $companyUser)
    {
        $application = JobApplication::findOrFail($applicationId);
        
        if ($application->job->company_id !== $companyUser->id) {
            throw new \Exception('Unauthorized');
        }

        $application->update(['status' => 'rejected']);

        // TODO: Send notification to applicant
        
        return $application;
    }

    public function getJobApplications($jobId, $companyUser)
    {
        $job = \App\Job::where('id', $jobId)
            ->where('company_id', $companyUser->id)
            ->firstOrFail();

        return JobApplication::where('job_listing_id', $jobId)
            ->with('customer')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }
}
