<?php

namespace App\Http\Controllers\Admin;

use App\DataGrids\VendorDataGrid;
use App\Repositories\VendorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Product\Models\Product;

class VendorController extends Controller
{
    protected $vendorRepository;

    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function index()
    {
        $pendingVendors = \App\Models\Vendor::with(['customer', 'category'])
            ->where('status', 'pending')
            ->paginate(10, ['*'], 'pending_page');
            
        $approvedVendors = \App\Models\Vendor::with(['customer', 'category'])
            ->where('status', 'approved')
            ->paginate(10, ['*'], 'approved_page');

        return view('admin.vendors.index', compact('pendingVendors', 'approvedVendors'));
    }

    public function show($id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        return view('admin::vendors.show', compact('vendor'));
    }

    public function create()
    {
        return view('admin::vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'shop_name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'shop_description' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected,suspended'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        
        $this->vendorRepository->create($data);
        session()->flash('success', 'تم إنشاء التاجر بنجاح');
        return redirect()->route('admin.vendors.index');
    }

    public function edit($id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        return view('admin::vendors.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'shop_name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'shop_description' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected,suspended',
            'commission_rate' => 'nullable|numeric|min:0|max:100'
        ]);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        
        $this->vendorRepository->update($data, $id);
        session()->flash('success', 'تم تحديث التاجر بنجاح');
        return redirect()->route('admin.vendors.index');
    }

    public function destroy($id)
    {
        $this->vendorRepository->delete($id);
        session()->flash('success', 'تم حذف التاجر بنجاح');
        return redirect()->route('admin.vendors.index');
    }

    public function approve($id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        $this->vendorRepository->update(['status' => 'approved'], $id);

        // Log for debugging
        \Illuminate\Support\Facades\Log::info("Admin approved vendor: {$id} by user: " . \Illuminate\Support\Facades\Auth::id());

        // Clear cache so vendor gets immediate access
        \Illuminate\Support\Facades\Cache::forget('vendor_status_' . $vendor->customer_id);

        // Notify vendor (email + database)
        try {
            if ($vendor->customer) {
                $vendor->customer->notify(new \App\Notifications\VendorApprovedNotification($vendor));
            }
        } catch (\Exception $e) {
            // Log and continue
            \Illuminate\Support\Facades\Log::warning('Vendor approval notification failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Vendor approved successfully']);
    }

    public function reject(Request $request, $id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        $this->vendorRepository->update([
            'status' => 'rejected',
            'rejection_reason' => $request->input('reason')
        ], $id);
        
        // Send notification to vendor (you can implement email notification here)
        
        return response()->json(['success' => true, 'message' => 'Vendor rejected successfully']);
    }

    public function suspend($id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        $this->vendorRepository->update(['status' => 'suspended'], $id);
        
        return response()->json(['success' => true, 'message' => 'Vendor suspended successfully']);
    }

    public function debugProducts()
    {
        $products = Product::query()->latest()->take(10)->get();

        $productFlats = DB::table('product_flat')
            ->whereIn('product_id', $products->pluck('id'))
            ->get()
            ->groupBy('product_id');

        $results = $products->map(function ($product) use ($productFlats) {
            return [
                'product' => $product->toArray(),
                'flat' => $productFlats->get($product->id),
            ];
        });

        return response()->json($results);
    }
}