<?php

namespace Mawgood\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawgood\Shop\Services\VendorStoreService;

class VendorReviewController extends Controller
{
    public function __construct(
        private VendorStoreService $storeService
    ) {}

    public function index($slug)
    {
        $vendor = $this->storeService->getBySlug($slug);
        $reviews = $this->storeService->getReviews($vendor->id);
        $averageRating = $this->storeService->getAverageRating($vendor->id);

        return view('mawgood-shop::store.reviews', compact('vendor', 'reviews', 'averageRating'));
    }

    public function store(Request $request, $slug)
    {
        $user = auth()->guard('customer')->user();

        if (!$user) {
            return redirect()->route('shop.customer.session.create')
                ->with('info', 'يرجى تسجيل الدخول لإضافة تقييم');
        }

        $vendor = $this->storeService->getBySlug($slug);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        \DB::table('vendor_reviews')->insert([
            'vendor_id' => $vendor->id,
            'customer_id' => $user->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'تم إضافة تقييمك بنجاح');
    }
}
