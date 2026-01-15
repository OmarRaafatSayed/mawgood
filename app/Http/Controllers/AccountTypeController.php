<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountTypeController extends Controller
{
    public function show()
    {
        $customer = Auth::guard('customer')->user();
        
        if (!$customer || $customer->account_type) {
            return redirect()->route('shop.customers.account.profile.index');
        }

        return view('account-type.select');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_type' => 'required|in:individual,vendor'
        ]);

        $customer = Auth::guard('customer')->user();
        $customer->update(['account_type' => $request->account_type]);

        if ($request->account_type === 'vendor') {
            return redirect()->route('vendor.onboarding.form');
        }

        return redirect()->route('shop.customers.account.profile.index');
    }
}