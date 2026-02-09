<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceEgpCurrency
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('currency') || session('currency') !== 'EGP') {
            session()->put('currency', 'EGP');
        }
        
        core()->setCurrentCurrency('EGP');
        
        return $next($request);
    }
}
