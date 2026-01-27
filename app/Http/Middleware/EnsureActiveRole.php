<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureActiveRole
{
    public function handle(Request $request, Closure $next, string $expectedRole)
    {
        $user = auth()->guard('customer')->user();

        if (!$user) {
            return redirect()->route('shop.customer.session.create');
        }

        $activeRole = session('active_role');

        if ($activeRole !== $expectedRole) {
            return redirect()->route('role.select')
                ->with('error', 'يجب تفعيل الدور الصحيح للوصول لهذه الصفحة');
        }

        if (!$user->hasRole($expectedRole)) {
            abort(403, 'غير مصرح لك بهذا الدور');
        }

        return $next($request);
    }
}
