<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Symfony\Component\HttpFoundation\Response;

class VendorApprovedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $customer = auth()->guard('customer')->user();
        
        if (!$customer) {
            return redirect()->route('shop.customer.session.index');
        }

        $vendor = Vendor::where('customer_id', $customer->id)->first();

        // If no vendor or not approved, redirect to application
        if (!$vendor || $vendor->status !== 'approved') {
            return redirect()->route('vendor.onboarding.form');
        }

        return $next($request);
    }
}
