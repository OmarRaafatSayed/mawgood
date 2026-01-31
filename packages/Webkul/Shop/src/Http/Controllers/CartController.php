<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;

class CartController extends Controller
{
    /**
     * Cart page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (! core()->getConfigData('sales.checkout.shopping_cart.cart_page')) {
            abort(404);
        }

        return view('shop::checkout.cart.index');
    }

    /**
     * Add product to cart.
     */
    public function add(Request $request)
    {
        try {
            Cart::addProduct($request->product_id, $request->all());
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
