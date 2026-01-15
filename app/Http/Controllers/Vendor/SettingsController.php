<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use App\Repositories\VendorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    protected $coreConfigRepository;
    protected $localeRepository;
    protected $currencyRepository;
    protected $inventorySourceRepository;
    protected $vendorRepository;

    public function __construct(
        CoreConfigRepository $coreConfigRepository,
        LocaleRepository $localeRepository,
        CurrencyRepository $currencyRepository,
        InventorySourceRepository $inventorySourceRepository,
        VendorRepository $vendorRepository
    ) {
        $this->coreConfigRepository = $coreConfigRepository;
        $this->localeRepository = $localeRepository;
        $this->currencyRepository = $currencyRepository;
        $this->inventorySourceRepository = $inventorySourceRepository;
        $this->vendorRepository = $vendorRepository;
    }

    public function index()
    {
        $vendor = $this->getCurrentVendor();
        
        if (!$vendor) {
            return redirect()->route('customer.session.index');
        }

        // Get system settings from Bagisto core_config
        $settings = [
            'locales' => $this->localeRepository->all(),
            'currencies' => $this->currencyRepository->all(),
            'inventory_sources' => $this->getVendorInventorySources($vendor->id),
            'current_locale' => core()->getCurrentLocale(),
            'current_currency' => core()->getCurrentCurrency(),
        ];

        // Get vendor-specific settings
        $vendorSettings = [
            'shop_name' => $vendor->shop_name ?? '',
            'shop_description' => $vendor->shop_description ?? '',
            'commission_rate' => $vendor->commission_rate ?? 10.00,
            'phone' => $vendor->phone ?? '',
            'address' => $vendor->address ?? '',
            'logo' => $vendor->logo ?? '',
        ];

        return view('vendor::settings.index', compact('vendor', 'settings', 'vendorSettings'));
    }

    public function updateProfile(Request $request)
    {
        $vendor = $this->getCurrentVendor();
        
        if (!$vendor) {
            return redirect()->route('customer.session.index');
        }

        $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_description' => 'nullable|string|max:1000',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['shop_name', 'shop_description', 'phone', 'address']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('vendor/logos', 'public');
            $data['logo'] = $logoPath;
        }

        $this->vendorRepository->update($data, $vendor->id);

        session()->flash('success', 'تم تحديث الملف الشخصي بنجاح');
        
        return redirect()->route('vendor.settings.index');
    }

    public function updateInventorySource(Request $request)
    {
        $vendor = $this->getCurrentVendor();
        
        if (!$vendor) {
            return redirect()->route('customer.session.index');
        }

        $request->validate([
            'inventory_source_id' => 'required|exists:inventory_sources,id'
        ]);

        // Update vendor's default inventory source
        $this->vendorRepository->update([
            'inventory_source_id' => $request->inventory_source_id
        ], $vendor->id);

        session()->flash('success', 'تم تحديث مصدر المخزون بنجاح');
        
        return redirect()->route('vendor.settings.index');
    }

    public function getSystemConfig($key)
    {
        $vendor = $this->getCurrentVendor();
        
        if (!$vendor) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $config = $this->coreConfigRepository->findOneWhere(['code' => $key]);
        
        return response()->json([
            'key' => $key,
            'value' => $config ? $config->value : null
        ]);
    }

    protected function getCurrentVendor()
    {
        $customer = auth()->guard('customer')->user();
        
        if (!$customer || $customer->user_type !== 'seller') {
            return null;
        }

        return $this->vendorRepository->findWhere(['customer_id' => $customer->id])->first();
    }

    protected function getVendorInventorySources($vendorId)
    {
        // Get inventory sources assigned to this vendor
        // For now, return all sources - you can filter by vendor assignment later
        return $this->inventorySourceRepository->all();
    }
}