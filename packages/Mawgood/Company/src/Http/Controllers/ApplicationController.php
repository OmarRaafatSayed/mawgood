<?php

namespace Mawgood\Company\Http\Controllers;

use Illuminate\Routing\Controller;
use Mawgood\Company\Services\ApplicationReviewService;

class ApplicationController extends Controller
{
    public function __construct(
        private ApplicationReviewService $reviewService
    ) {}

    public function index($jobId)
    {
        $user = auth()->guard('customer')->user();
        $applications = $this->reviewService->getJobApplications($jobId, $user);
        $job = \App\Job::findOrFail($jobId);

        return view('mawgood-company::applications.index', compact('applications', 'job'));
    }

    public function accept($id)
    {
        $user = auth()->guard('customer')->user();
        
        try {
            $this->reviewService->accept($id, $user);
            return back()->with('success', 'تم قبول الطلب بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ');
        }
    }

    public function reject($id)
    {
        $user = auth()->guard('customer')->user();
        
        try {
            $this->reviewService->reject($id, $user);
            return back()->with('success', 'تم رفض الطلب');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ');
        }
    }
}
