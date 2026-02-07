<?php

namespace Mawgood\Vendor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mawgood\Vendor\Models\Vendor;

class EnsureVendorAccess
{
    public function handle(Request $request, Closure $next)
    {
        $customer = auth()->guard('customer')->user();
        
        if (!$customer) {
            return redirect()->route('shop.customer.session.create');
        }

        $vendor = Vendor::where('customer_id', $customer->id)->first();

        // No vendor record - redirect to onboarding
        if (!$vendor) {
            return redirect()->route('vendor.onboarding.form');
        }

        // Grant access regardless of status
        session(['active_role' => 'vendor']);
        $request->merge(['vendor' => $vendor]);
        session(['active_profile_id' => $vendor->id]);

        return $next($request);
    }
}
