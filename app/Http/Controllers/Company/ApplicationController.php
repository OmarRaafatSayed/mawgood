<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        
        $applications = JobApplication::whereHas('job', function($q) use ($user) {
            $q->where('company_id', $user->id);
        })->with(['job', 'customer'])->paginate(15);

        return view('company.applications.index', compact('applications'));
    }
}
