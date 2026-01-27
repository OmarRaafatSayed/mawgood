<?php

namespace Mawgood\Company\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Job;
use App\Models\JobApplication;
use App\Helpers\ContextValidator;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        ContextValidator::validateCompanyContext($user->id);
        
        $stats = [
            'total_jobs' => Job::where('company_id', $user->id)->count(),
            'active_jobs' => Job::where('company_id', $user->id)->where('status', 'published')->count(),
            'total_applications' => JobApplication::whereHas('job', function($q) use ($user) {
                $q->where('company_id', $user->id);
            })->count(),
            'pending_applications' => JobApplication::whereHas('job', function($q) use ($user) {
                $q->where('company_id', $user->id);
            })->where('status', 'pending')->count(),
        ];

        $recentApplications = JobApplication::whereHas('job', function($q) use ($user) {
            $q->where('company_id', $user->id);
        })->with(['job', 'customer'])->latest()->take(5)->get();

        return view('mawgood-company::dashboard.index', compact('user', 'stats', 'recentApplications'));
    }
}
