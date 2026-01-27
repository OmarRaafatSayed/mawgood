<?php

namespace Mawgood\Company\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Mawgood\Company\Http\Requests\StoreJobRequest;
use Mawgood\Company\Services\JobPostingService;
use App\Job;

class JobController extends Controller
{
    public function __construct(
        private JobPostingService $jobService
    ) {}

    public function index()
    {
        $user = auth()->guard('customer')->user();
        $jobs = $this->jobService->getCompanyJobs($user->id);

        return view('mawgood-company::jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('mawgood-company::jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        $user = auth()->guard('customer')->user();
        $this->jobService->create($user, $request->validated());

        return redirect()->route('company.jobs.index')
            ->with('success', 'تم نشر الوظيفة بنجاح');
    }

    public function edit($id)
    {
        $user = auth()->guard('customer')->user();
        $job = Job::where('id', $id)->where('company_id', $user->id)->firstOrFail();

        return view('mawgood-company::jobs.edit', compact('job'));
    }

    public function update(StoreJobRequest $request, $id)
    {
        $user = auth()->guard('customer')->user();
        $job = Job::where('id', $id)->where('company_id', $user->id)->firstOrFail();
        
        $this->jobService->update($job, $request->validated());

        return redirect()->route('company.jobs.index')
            ->with('success', 'تم تحديث الوظيفة بنجاح');
    }

    public function destroy($id)
    {
        $user = auth()->guard('customer')->user();
        $job = Job::where('id', $id)->where('company_id', $user->id)->firstOrFail();
        $job->delete();

        return redirect()->route('company.jobs.index')
            ->with('success', 'تم حذف الوظيفة بنجاح');
    }
}
