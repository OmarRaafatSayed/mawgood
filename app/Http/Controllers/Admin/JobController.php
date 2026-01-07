<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['category', 'customer'])->latest()->get();
        
        return view('admin.jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::with(['category', 'customer', 'applications'])->findOrFail($id);
        
        return view('admin.jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = JobCategory::where('status', 1)->get();
        
        return view('admin.jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        
        $request->validate([
            'status' => 'required|boolean',
            'job_category_id' => 'required|exists:job_categories,id',
        ]);

        $job->update($request->only(['status', 'job_category_id']));

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully');
    }

    public function categories()
    {
        $categories = JobCategory::latest()->get();
        
        return view('admin.jobs.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:job_categories,slug',
        ]);

        JobCategory::create([
            'name' => $request->name,
            'name_ar' => $request->name,
            'slug' => $request->slug,
            'status' => 1
        ]);

        return redirect()->route('admin.jobs.categories')->with('success', 'Category created successfully');
    }
}