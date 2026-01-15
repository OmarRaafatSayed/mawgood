<?php

namespace App\Http\Controllers\Vendor\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Admin\Http\Controllers\Sales\OrderController as BaseOrderController;

class OrderController extends BaseOrderController
{
    protected $vendor;

    public function __construct(OrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
        
        $customer = Auth::guard('customer')->user();
        $this->vendor = Vendor::where('customer_id', $customer->id)->where('status', 'approved')->first();
        
        if (!$this->vendor) {
            abort(403, 'Unauthorized access');
        }
    }

    /**
     * Display vendor's orders only
     */
    public function index()
    {
        if (request()->ajax()) {
            // Inject vendor filter into request so the DataGrid will scope results to this vendor
            $req = request();
            $filters = $req->input('filters', []);
            $filters['vendor_id'] = [$this->vendor->id];
            $req->merge(['filters' => $filters]);

            return app(\Webkul\Admin\DataGrids\Sales\OrderDataGrid::class)
                ->toJson();
        }

        return view('vendor.admin.sales.orders.index', [
            'vendor' => $this->vendor
        ]);
    }

    /**
     * Show the specified order
     */
    public function view($id)
    {
        $order = $this->orderRepository->findOrFail($id);
        
        // Ensure vendor can only view their own orders
        $vendorOrder = $this->vendor->vendorOrders()->where('order_id', $id)->first();
        if (!$vendorOrder) {
            abort(403, 'Unauthorized access to this order');
        }

        return view('vendor.admin.sales.orders.view', [
            'order' => $order,
            'vendor' => $this->vendor
        ]);
    }
}