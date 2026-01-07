<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use App\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('customer_id', auth('customer')->id())
                   ->with(['category', 'applications'])
                   ->latest()
                   ->paginate(10);

        return view('shop::customers.account.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = JobCategory::where('status', 1)->get();
        
        return view('shop::customers.account.jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_ar' => 'nullable|string',
            'requirements' => 'nullable|string',
            'requirements_ar' => 'nullable|string',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|url',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,freelance',
            'salary_range' => 'nullable|string|max:255',
            'experience_level' => 'nullable|string|max:255',
            'application_url' => 'required|url',
            'job_category_id' => 'required|exists:job_categories,id',
            'expires_at' => 'nullable|date|after:today'
        ]);

        $data = $request->all();
        $data['customer_id'] = auth('customer')->id();
        $data['slug'] = Str::slug($request->title . '-' . time());
        $data['status'] = 1;

        Job::create($data);

        session()->flash('success', app()->getLocale() === 'ar' ? 'تم إنشاء الوظيفة بنجاح' : 'Job created successfully');

        return redirect()->route('shop.customers.account.jobs.index');
    }

    public function edit($id)
    {
        $job = Job::where('customer_id', auth('customer')->id())->findOrFail($id);
        $categories = JobCategory::where('status', 1)->get();
        
        return view('shop::customers.account.jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::where('customer_id', auth('customer')->id())->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_ar' => 'nullable|string',
            'requirements' => 'nullable|string',
            'requirements_ar' => 'nullable|string',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|url',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,freelance',
            'salary_range' => 'nullable|string|max:255',
            'experience_level' => 'nullable|string|max:255',
            'application_url' => 'required|url',
            'job_category_id' => 'required|exists:job_categories,id',
            'expires_at' => 'nullable|date|after:today'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title . '-' . $job->id);

        $job->update($data);

        session()->flash('success', app()->getLocale() === 'ar' ? 'تم تحديث الوظيفة بنجاح' : 'Job updated successfully');

        return redirect()->route('shop.customers.account.jobs.index');
    }

    public function destroy($id)
    {
        $job = Job::where('customer_id', auth('customer')->id())->findOrFail($id);
        $job->delete();

        session()->flash('success', app()->getLocale() === 'ar' ? 'تم حذف الوظيفة بنجاح' : 'Job deleted successfully');

        return redirect()->route('shop.customers.account.jobs.index');
    }

    public function applications($id)
    {
        $job = Job::where('customer_id', auth('customer')->id())->findOrFail($id);
        $applications = JobApplication::where('job_listing_id', $id)
                                    ->with('customer')
                                    ->latest()
                                    ->paginate(10);

        return view('shop::customers.account.jobs.applications', compact('job', 'applications'));
    }
}