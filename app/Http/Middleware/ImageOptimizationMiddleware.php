<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageOptimizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Add lazy loading and optimization headers for images
        if ($request->is('*/images/*') || $request->is('storage/*')) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            $response->headers->set('Expires', gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
        }

        return $response;
    }
}