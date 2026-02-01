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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'job_category_id' => 'required|exists:job_categories,id',
            'application_link' => 'required|url',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('jobs', 'public');
        }

        Job::create([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'city' => $request->city,
            'job_category_id' => $request->job_category_id,
            'job_type' => $request->job_type,
            'application_link' => $request->application_link,
            'description' => $request->description,
            'image' => $imagePath,
            'slug' => \Str::slug($request->title) . '-' . time(),
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'تم إضافة الوظيفة بنجاح');
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
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'status' => 'required|boolean',
            'job_category_id' => 'required|exists:job_categories,id',
            'application_link' => 'required|url',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'company_name', 'city', 'status', 'job_category_id', 'job_type', 'application_link', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('jobs', 'public');
        }

        $job->update($data);

        return redirect()->route('admin.jobs.index')->with('success', 'تم تحديث الوظيفة بنجاح');
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