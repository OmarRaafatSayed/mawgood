<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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

        $relatedJobs = Job::where('job_category_id', $job->job_category_id)
            ->where('id', '!=', $job->id)
            ->where('status', 1)
            ->latest()
            ->limit(4)
            ->get();
        
        return view('jobs.show', compact('job', 'relatedJobs'));
    }

    public function submitApplication(Request $request, $slug)
    {
        $job = Job::where('slug', $slug)->where('status', 1)->firstOrFail();

        $data = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'applicant_email' => 'required|email|max:255',
            'applicant_phone' => 'nullable|string|max:50',
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        $application = \App\JobApplication::create([
            'job_listing_id' => $job->id,
            'customer_id' => Auth::check() ? Auth::user()->id : null,
            'applicant_name' => $data['applicant_name'],
            'applicant_email' => $data['applicant_email'],
            'applicant_phone' => $data['applicant_phone'] ?? null,
            'cover_letter' => $data['cover_letter'] ?? null,
            'resume_path' => $resumePath,
            'status' => 'pending'
        ]);

        return redirect()->route('jobs.apply.success', ['slug' => $job->slug]);
    }
}