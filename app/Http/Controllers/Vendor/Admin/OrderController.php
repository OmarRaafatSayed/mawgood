<?php

namespace App\Http\Controllers\Vendor\Admin;

use App\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Illuminate\Support\Facades\Auth;
use App\VendorOrder; // تم التعديل هنا من App\Models\VendorOrder إلى App\VendorOrder

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderCommentRepository $orderCommentRepository,
        protected CartRepository $cartRepository,
        protected CustomerGroupRepository $customerGroupRepository
    ) {
        // تم حذف سطر parent::__construct() بناءً على تقرير الإصلاح
    }
    public function index()
    {
        // تصفية الطلبات حسب معرف التاجر المسجل
        $vendorId = Auth::user()->vendor_id;
        $orders = VendorOrder::where('vendor_id', $vendorId)->get();
        
        return view('vendor.admin.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $vendorId = Auth::user()->vendor_id;
        // التحقق من أن الطلب ينتمي إلى التاجر
        $order = VendorOrder::where('id', $id)->where('vendor_id', $vendorId)->firstOrFail();
        
        return view('vendor.admin.orders.show', compact('order'));
    }
}