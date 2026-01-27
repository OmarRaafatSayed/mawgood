<?php

namespace Mawgood\Shop\Services;

use Mawgood\Vendor\Models\Vendor;
use Illuminate\Support\Facades\Cache;

class VendorStoreService
{
    public function getBySlug(string $slug)
    {
        return Cache::remember("vendor_store_{$slug}", now()->addHours(6), function() use ($slug) {
            return Vendor::where('store_slug', $slug)
                ->where('status', 'approved')
                ->withCount('products')
                ->firstOrFail();
        });
    }

    public function getProducts($vendorId, $perPage = 24)
    {
        return \DB::table('products')
            ->where('vendor_id', $vendorId)
            ->where('status', 1)
            ->select('id', 'sku', 'type', 
                \DB::raw('JSON_UNQUOTE(JSON_EXTRACT(name, "$.ar")) as name'))
            ->paginate($perPage);
    }

    public function getReviews($vendorId)
    {
        return \DB::table('vendor_reviews')
            ->where('vendor_id', $vendorId)
            ->join('customers', 'vendor_reviews.customer_id', '=', 'customers.id')
            ->select('vendor_reviews.*', 'customers.first_name', 'customers.last_name')
            ->orderBy('vendor_reviews.created_at', 'desc')
            ->paginate(10);
    }

    public function getAverageRating($vendorId)
    {
        return \DB::table('vendor_reviews')
            ->where('vendor_id', $vendorId)
            ->avg('rating') ?? 0;
    }
}
