<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;

class VendorAdminAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $customer = Auth::guard('customer')->user();
        
        if (!$customer) {
            return redirect()->route('customer.session.index');
        }

        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor || $vendor->status !== 'approved') {
            return redirect()->route('shop.customers.account.profile.index')
                ->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        return $next($request);
    }
}