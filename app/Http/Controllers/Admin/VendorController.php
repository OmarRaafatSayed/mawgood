<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Webkul\Admin\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::with('customer')->latest()->paginate(20);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function show($id)
    {
        $vendor = Vendor::with('customer')->findOrFail($id);
        return view('admin.vendors.show', compact('vendor'));
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'business_email' => 'required|email|max:255',
            'business_phone' => 'required|string|max:20',
            'status' => 'required|in:pending,approved,rejected,suspended',
            'commission_rate' => 'required|numeric|min:0|max:100'
        ]);

        $vendor = Vendor::findOrFail($id);
        $oldStatus = $vendor->status;
        $vendor->update($request->all());

        // Handle status change to approved
        if ($request->status === 'approved' && $oldStatus !== 'approved') {
            $this->handleApproval($vendor);
        }

        return redirect()
            ->route('admin.vendors.index')
            ->with('success', 'تم تحديث التاجر بنجاح');
    }

    public function destroy($id)
    {
        Vendor::findOrFail($id)->delete();
        return redirect()
            ->route('admin.vendors.index')
            ->with('success', 'تم حذف التاجر بنجاح');
    }

    public function approve($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->update(['status' => 'approved']);

        $this->handleApproval($vendor);

        return redirect()
            ->route('admin.vendors.show', $id)
            ->with('success', 'تم الموافقة على التاجر بنجاح');
    }

    public function reject(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->update([
            'status' => 'rejected',
            'rejection_reason' => $request->input('reason')
        ]);

        // Remove vendor role if exists
        if ($vendor->customer && $vendor->customer->hasRole('vendor')) {
            $vendor->customer->removeRole('vendor');
        }

        return redirect()
            ->route('admin.vendors.show', $id)
            ->with('success', 'تم رفض التاجر');
    }

    protected function handleApproval(Vendor $vendor)
    {
        if (!$vendor->customer) {
            return;
        }

        // Assign vendor role if not exists
        if (!$vendor->customer->hasRole('vendor')) {
            $vendor->customer->assignRole('vendor');
        }

        // Send notification
        try {
            $vendor->customer->notify(new \App\Notifications\VendorApprovedNotification($vendor));
        } catch (\Exception $e) {
            \Log::warning('Vendor approval notification failed: ' . $e->getMessage());
        }
    }
}
