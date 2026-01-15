<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Webkul\Category\Models\Category;

class OnboardingController extends Controller
{
    /**
     * Show the vendor onboarding form
     */
    public function showForm()
    {
        $customer = Auth::guard('customer')->user();
        
        // Check if already has vendor account
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        if ($vendor) {
            if ($vendor->status === 'pending') {
                return redirect()->route('vendor.under-review');
            }
            if ($vendor->status === 'approved') {
                return redirect()->route('vendor.admin.dashboard.index');
            }
        }
        
        return view('vendor.onboarding.form', compact('categories'));
    }

    /**
     * Handle the vendor application submission (Step 1 - Store to session)
     */
    public function submitApplication(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255|unique:vendors,store_name',
            'store_description' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id',
            'store_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'business_name' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:50',
            'business_email' => 'required|email|max:255',
            'business_phone' => 'required|string|max:20',
            'business_address' => 'required|string|max:500',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
        ]);

        $customer = Auth::guard('customer')->user();

        // Prevent duplicate application
        if (Vendor::where('customer_id', $customer->id)->exists()) {
            return redirect()->route('shop.customers.account.profile.index')
                ->with('error', app()->getLocale() === 'ar' ? 'لديك بالفعل طلب أو متجر.' : 'You already have an application or store.');
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('store_logo')) {
            $logoPath = $request->file('store_logo')->store('vendor/logos', 'public');
        }

        // Generate unique slug from store name
        $baseSlug = \Illuminate\Support\Str::slug($request->store_name);
        $slug = $baseSlug;
        $counter = 1;
        while (Vendor::where('store_slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        // Create vendor application immediately (status: pending)
        $vendor = Vendor::create([
            'customer_id' => $customer->id,
            'store_name' => $request->store_name,
            'store_slug' => $slug,
            'store_description' => $request->store_description,
            'category_id' => $request->category_id,
            'store_logo' => $logoPath,
            'business_name' => $request->business_name,
            'tax_id' => $request->tax_id,
            'business_email' => $request->business_email,
            'business_phone' => $request->business_phone,
            'business_address' => $request->business_address,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'status' => 'pending',
            'commission_rate' => config('multivendor.default_commission_rate', 10.00),
        ]);

        // Redirect immediately to under-review with success message
        return redirect()->route('vendor.under-review')
            ->with('success', app()->getLocale() === 'ar' ? 'تم إرسال طلب الانضمام بنجاح!' : 'Your application has been submitted successfully!');
    }

    /**
     * Show confirmation page (Step 2)
     */
    public function showConfirmation()
    {
        if (!session('vendor_application')) {
            return redirect()->route('vendor.onboarding.form');
        }

        return view('vendor.onboarding.confirmation');
    }

    /**
     * Final submission after confirmation (Step 3)
     */
    public function finalSubmit(Request $request)
    {
        $applicationData = session('vendor_application');
        
        if (!$applicationData) {
            return redirect()->route('vendor.onboarding.form');
        }

        $customer = Auth::guard('customer')->user();
        
        // Auto-generate unique slug from store name
        $baseSlug = Str::slug($applicationData['store_name']);
        $slug = $baseSlug;
        $counter = 1;
        
        while (Vendor::where('store_slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        // Create vendor application
        Vendor::create([
            'customer_id' => $customer->id,
            'email' => $customer->email,
            'store_name' => $applicationData['store_name'],
            'store_slug' => $slug,
            'store_description' => $applicationData['store_description'],
            'category_id' => $applicationData['category_id'],
            'store_logo' => $applicationData['store_logo'],
            'status' => 'pending',
            'commission_rate' => config('multivendor.default_commission_rate', 10.00),
        ]);

        // Clear session data
        session()->forget('vendor_application');

        return redirect()->route('vendor.under-review')
            ->with('success', app()->getLocale() === 'ar' ? 'تم إرسال طلبك بنجاح!' : 'Your application has been submitted successfully!');
    }

    /**
     * Show the under review page
     */
    public function underReview()
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor || $vendor->status !== 'pending') {
            return redirect()->route('shop.customers.account.profile.index');
        }

        return view('vendor.onboarding.under-review', compact('vendor'));
    }

    /**
     * Check if store name is available (AJAX)
     */
    public function checkStoreName(Request $request)
    {
        $exists = Vendor::where('store_name', $request->store_name)->exists();
        return response()->json(['available' => !$exists]);
    }

    /**
     * Check if store slug is available (AJAX)
     */
    public function checkStoreSlug(Request $request)
    {
        $exists = Vendor::where('store_slug', $request->store_slug)->exists();
        return response()->json(['available' => !$exists]);
    }

    /**
     * Generate slug from store name (AJAX)
     */
    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->store_name);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Vendor::where('store_slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return response()->json(['slug' => $slug]);
    }
}