<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = auth()->guard('customer')->user();

        if (!$user || !$user->hasRole($role)) {
            return redirect()->route('shop.home.index')
                ->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        $user->setActiveRole($role);

        return $next($request);
    }
}
