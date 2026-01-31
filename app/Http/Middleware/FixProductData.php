<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class FixProductData
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // Check if this is a product page with issues
        if ($request->is('*-*') && !$request->is('admin/*')) {
            $slug = trim($request->path(), '/');
            
            // Ensure product exists in product_flat
            $flat = DB::table('product_flat')->where('url_key', $slug)->first();
            
            if (!$flat) {
                // Try to find in booking_products
                $booking = DB::table('booking_products')->where('url_key', $slug)->first();
                
                if ($booking) {
                    // Create flat entry
                    DB::table('product_flat')->insert([
                        'product_id' => $booking->id,
                        'sku' => $booking->sku,
                        'name' => $booking->name,
                        'description' => $booking->description ?? '',
                        'short_description' => $booking->short_description ?? '',
                        'url_key' => $booking->url_key,
                        'price' => 25.00,
                        'status' => 1,
                        'visible_individually' => 1,
                        'locale' => 'en',
                        'channel' => 'default',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }
        
        return $response;
    }
}