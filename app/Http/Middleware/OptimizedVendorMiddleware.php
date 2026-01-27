<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Vendor;

class OptimizedVendorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $customer = Auth::guard('customer')->user();
        
        if (!$customer) {
            return redirect()->route('customer.session.index');
        }

        // Cache vendor lookup for 10 minutes
        $vendor = Cache::remember("vendor_customer_{$customer->id}", 600, function () use ($customer) {
            return Vendor::where('customer_id', $customer->id)->first();
        });

        if (!$vendor || $vendor->status !== 'approved') {
            return redirect()->route('shop.home.index')
                ->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        $request->attributes->set('vendor', $vendor);
        
        return $next($request);
    }
}