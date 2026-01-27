<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = auth()->guard('customer')->user();

        if (!$user) {
            return redirect()->route('shop.customer.session.create')
                ->with('info', 'يرجى تسجيل الدخول للتقديم على الوظيفة');
        }

        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string|max:1000',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        JobApplication::create([
            'job_id' => $id,
            'customer_id' => $user->id,
            'resume_path' => $resumePath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->route('jobs.show', $id)
            ->with('success', 'تم تقديم طلبك بنجاح');
    }
}
