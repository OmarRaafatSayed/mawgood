<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('admin')->check()) {
            return redirect()->route('admin.session.create');
        }

        $user = auth()->guard('admin')->user();
        
        // Check if user has vendor permissions
        if (!bouncer()->hasPermission('vendors')) {
            abort(403, 'Unauthorized access to vendor area');
        }

        return $next($request);
    }
}
