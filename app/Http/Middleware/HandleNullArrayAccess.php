<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleNullArrayAccess
{
    public function handle(Request $request, Closure $next)
    {
        set_error_handler(function ($errno, $errstr) {
            if (str_contains($errstr, 'Trying to access array offset on null')) {
                return true;
            }
            return false;
        }, E_WARNING);

        $response = $next($request);

        restore_error_handler();

        return $response;
    }
}
