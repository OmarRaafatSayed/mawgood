<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VendorManagementController extends Controller
{
    /**
     * Display pending vendors
     */
    public function index()
    {
        $pendingVendors = Vendor::with(['customer', 'category'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(10);

        $approvedVendors = Vendor::with(['customer', 'category'])
            ->where('status', 'approved')
            ->latest()
            ->paginate(10);

        return view('admin.vendors.index', compact('pendingVendors', 'approvedVendors'));
    }

    /**
     * Show vendor details
     */
    public function show($id)
    {
        $vendor = Vendor::with(['customer', 'category'])->findOrFail($id);
        return view('admin.vendors.show', compact('vendor'));
    }

    /**
     * Approve vendor
     */
    public function approve($id)
    {
        $vendor = Vendor::findOrFail($id);
        
        $vendor->update(['status' => 'approved']);
        
        // Clear user cache to unlock dashboard immediately
        Cache::forget('vendor_status_' . $vendor->customer_id);
        
        return response()->json([
            'success' => true,
            'message' => app()->getLocale() === 'ar' ? 'تم قبول البائع بنجاح' : 'Vendor approved successfully'
        ]);
    }

    /**
     * Reject vendor
     */
    public function reject(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        
        $vendor->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason
        ]);
        
        // Clear user cache
        Cache::forget('vendor_status_' . $vendor->customer_id);
        
        return response()->json([
            'success' => true,
            'message' => app()->getLocale() === 'ar' ? 'تم رفض البائع' : 'Vendor rejected'
        ]);
    }

    /**
     * Suspend vendor
     */
    public function suspend($id)
    {
        $vendor = Vendor::findOrFail($id);
        
        $vendor->update(['status' => 'suspended']);
        
        // Clear user cache
        Cache::forget('vendor_status_' . $vendor->customer_id);
        
        return response()->json([
            'success' => true,
            'message' => app()->getLocale() === 'ar' ? 'تم تعليق البائع' : 'Vendor suspended'
        ]);
    }
}