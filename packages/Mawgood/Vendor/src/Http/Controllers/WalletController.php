<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $vendor = $request->vendor;

        return view('mawgood-vendor::wallet.index', compact('vendor'));
    }

    public function transactions(Request $request)
    {
        $vendor = $request->vendor;
        
        // TODO: Implement wallet transactions logic
        $transactions = collect();

        return view('mawgood-vendor::wallet.transactions', compact('vendor', 'transactions'));
    }

    public function requestWithdrawal(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // TODO: Implement withdrawal logic
        
        return back()->with('success', 'تم إرسال طلب السحب بنجاح');
    }
}
