<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['category', 'customer'])->where('status', 1);

        // Filter by category
        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by location
        if ($request->location) {
            $query->where('city', 'like', '%' . $request->location . '%');
        }

        // Filter by job type
        if ($request->job_type) {
            $query->where('job_type', $request->job_type);
        }

        // Search by title
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('title_ar', 'like', '%' . $request->search . '%')
                  ->orWhere('company_name', 'like', '%' . $request->search . '%');
            });
        }

        $jobs = $query->latest()->paginate(12);
        $categories = JobCategory::where('status', 1)->get();
        $cities = Job::select('city')->distinct()->pluck('city');
        $jobTypes = ['full-time', 'part-time', 'contract', 'freelance'];

        return view('jobs.index', compact('jobs', 'categories', 'cities', 'jobTypes'));
    }

    public function show($slug)
    {
        $job = Job::with(['category', 'customer'])->where('slug', $slug)->where('status', 1)->firstOrFail();
        
        return view('jobs.show', compact('job'));
    }

    public function apply(Request $request, $id)
    {
        // Handle job application
        $job = Job::findOrFail($id);
        
        // Redirect to external application URL
        return redirect($job->application_url);
    }
}