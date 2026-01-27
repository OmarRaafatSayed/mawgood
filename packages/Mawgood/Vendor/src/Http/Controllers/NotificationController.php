<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawgood\Vendor\Models\VendorNotification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $vendor = $request->vendor;
        
        $notifications = VendorNotification::where('vendor_id', $vendor->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // Mark as read
        VendorNotification::where('vendor_id', $vendor->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('mawgood-vendor::notifications.index', compact('notifications', 'vendor'));
    }

    public function markAsRead(Request $request, $id)
    {
        $vendor = $request->vendor;
        
        VendorNotification::where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'تم تحديث الإشعار');
    }

    public function deleteAll(Request $request)
    {
        $vendor = $request->vendor;
        
        VendorNotification::where('vendor_id', $vendor->id)->delete();

        return redirect()->route('vendor.notifications.index')
            ->with('success', 'تم حذف جميع الإشعارات');
    }
}
