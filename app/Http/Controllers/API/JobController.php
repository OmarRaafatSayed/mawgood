<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return response()->json([
            'data' => $jobs
        ]);
    }
}
