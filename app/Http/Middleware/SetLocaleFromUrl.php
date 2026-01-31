<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocaleFromUrl
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('locale')) {
            $locale = $request->get('locale');
            if (in_array($locale, ['ar', 'en'])) {
                app()->setLocale($locale);
                session()->put('locale', $locale);
            }
        } elseif (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
