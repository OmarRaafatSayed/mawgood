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
            // Redirect to become a seller form
            return redirect()->route('vendor.onboarding.form')
                ->with('info', app()->getLocale() === 'ar' ? 'يجب عليك التسجيل كبائع أولاً' : 'You need to register as a seller first');
        }

        // Check vendor status
        if ($vendor->status === 'pending') {
            return redirect()->route('vendor.under-review')
                ->with('info', app()->getLocale() === 'ar' ? 'طلبك قيد المراجعة' : 'Your application is under review');
        }

        if ($vendor->status === 'rejected') {
            return redirect()->route('vendor.onboarding.form')
                ->with('error', app()->getLocale() === 'ar' ? 'تم رفض طلبك. يمكنك التقديم مرة أخرى' : 'Your application was rejected. You can apply again');
        }

        if ($vendor->status !== 'approved') {
            return redirect()->route('shop.customers.account.profile.index')
                ->with('error', app()->getLocale() === 'ar' ? 'حسابك كبائع غير نشط' : 'Your seller account is not active');
        }

        return $next($request);
    }
}