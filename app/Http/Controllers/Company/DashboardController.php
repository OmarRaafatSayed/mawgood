<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        
        return view('company.dashboard.index', compact('user'));
    }
}
