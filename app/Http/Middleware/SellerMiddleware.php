<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Seller;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated as customer
        if (!auth('customer')->check()) {
            return redirect()->route('customer.session.index');
        }

        $customer = auth('customer')->user();
        
        // Check if customer is a seller
        $seller = Seller::where('customer_id', $customer->id)->first();
        
        if (!$seller) {
            return redirect()->route('shop.home.index')->with('error', 'ليس لديك صلاحية للوصول لهذه الصفحة');
        }

        // Check if seller is approved
        if (!$seller->isApproved()) {
            return redirect()->route('vendor.pending')->with('warning', 'حسابك قيد المراجعة');
        }

        // Share seller data with all views
        view()->share('currentSeller', $seller);
        $request->attributes->set('seller', $seller);

        return $next($request);
    }
}