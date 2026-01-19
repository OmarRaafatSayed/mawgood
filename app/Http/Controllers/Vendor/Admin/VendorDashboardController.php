<?php

namespace App\Http\Controllers\Vendor\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class VendorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('vendor.admin.dashboard.index');
    }
}