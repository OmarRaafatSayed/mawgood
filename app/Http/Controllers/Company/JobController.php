<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        $jobs = Job::where('company_id', $user->id)->paginate(15);

        return view('company.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('company.jobs.create');
    }

    public function store(Request $request)
    {
        $user = auth()->guard('customer')->user();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:100',
        ]);

        Job::create([
            'company_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
            'status' => 'active',
        ]);

        return redirect()->route('company.jobs.index')
            ->with('success', 'تم نشر الوظيفة بنجاح');
    }
}
