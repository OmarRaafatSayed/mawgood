<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FixImagePaths
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        if ($response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $content = $response->getContent();
            
            // Fix broken image paths
            $content = preg_replace_callback(
                '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i',
                function ($matches) {
                    $src = $matches[1];
                    
                    // Skip if already absolute URL
                    if (strpos($src, 'http') === 0) {
                        return $matches[0];
                    }
                    
                    // Fix relative paths
                    if (strpos($src, '/') !== 0) {
                        $src = '/' . $src;
                    }
                    
                    // Add onerror fallback if not exists
                    if (strpos($matches[0], 'onerror') === false) {
                        return str_replace(
                            '<img',
                            '<img onerror="this.src=\'' . asset('themes/shop/default/assets/images/product-placeholders/front.svg') . '\'"',
                            str_replace($matches[1], asset(ltrim($src, '/')), $matches[0])
                        );
                    }
                    
                    return str_replace($matches[1], asset(ltrim($src, '/')), $matches[0]);
                },
                $content
            );
            
            $response->setContent($content);
        }
        
        return $response;
    }
}
