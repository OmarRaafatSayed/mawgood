<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;

class IsSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if customer is authenticated
        if (!Auth::guard('customer')->check()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return redirect()->route('customer.session.index');
        }

        $customer = Auth::guard('customer')->user();
        
        // Check if customer is a vendor
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Access denied. Vendor account required.'], 403);
            }
            return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        // Check if vendor is approved
        if ($vendor->status !== 'approved') {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Vendor account not approved'], 403);
            }
            return redirect()->route('shop.home.index')->with('error', 'حسابك كتاجر لم يتم الموافقة عليه بعد');
        }

        return $next($request);
    }
}