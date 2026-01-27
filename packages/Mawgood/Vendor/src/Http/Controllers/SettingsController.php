<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $vendor = $request->vendor;

        return view('mawgood-vendor::settings.index', compact('vendor'));
    }

    public function updateProfile(Request $request)
    {
        $vendor = $request->vendor;

        $request->validate([
            'store_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $vendor->update($request->only(['store_name', 'phone', 'address']));

        return back()->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
}
