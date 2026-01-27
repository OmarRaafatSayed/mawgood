<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawgood\Vendor\Repositories\VendorRepository;
use App\Helpers\ContextValidator;

class DashboardController extends Controller
{
    public function __construct(
        private VendorRepository $vendorRepository
    ) {}

    public function index(Request $request)
    {
        $vendor = $request->vendor;
        ContextValidator::validateVendorContext($vendor);
        
        $stats = $this->vendorRepository->getVendorStats($vendor->id);

        return view('mawgood-vendor::dashboard.index', compact('vendor', 'stats'));
    }

    public function getDashboardStats(Request $request)
    {
        $vendor = $request->vendor;
        ContextValidator::validateVendorContext($vendor);
        
        $stats = $this->vendorRepository->getVendorStats($vendor->id);

        return response()->json($stats);
    }

    public function publicStore(Request $request)
    {
        $vendor = $request->vendor;
        return redirect()->route('shop.home.index');
    }

    public function logout(Request $request)
    {
        session()->forget(['active_role', 'active_profile_id']);
        return redirect()->route('shop.customer.session.create')
            ->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
