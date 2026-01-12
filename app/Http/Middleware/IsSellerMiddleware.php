<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSellerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('customer')->check()) {
            return redirect()->route('customer.session.index');
        }

        $customer = auth()->guard('customer')->user();
        
        if ($customer->user_type !== 'seller') {
            abort(403, 'Access denied. Seller account required.');
        }

        return $next($request);
    }
}
