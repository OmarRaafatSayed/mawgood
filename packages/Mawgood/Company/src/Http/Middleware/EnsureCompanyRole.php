<?php

namespace Mawgood\Company\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureCompanyRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->guard('customer')->user();

        if (!$user || !$user->hasRole('company')) {
            return redirect()->route('shop.home.index')
                ->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
        }

        // Validate active role
        if (session('active_role') !== 'company') {
            return redirect()->route('role.select')
                ->with('error', 'يجب تفعيل دور الشركة للوصول لهذه الصفحة');
        }

        $user->setActiveRole('company');
        session(['active_profile_id' => $user->id]);

        return $next($request);
    }
}
