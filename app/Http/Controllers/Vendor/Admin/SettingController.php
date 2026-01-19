<?php

namespace App\Http\Controllers\Vendor\Admin ;

use App\Http\Controllers\Controller ;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth ;

class SettingController extends Controller
{
    public function update(Request $request )
    {
        // استخدام app() لتجنب أخطاء النوع في الـ Constructor
        $sellerRepository = app('Webkul\Marketplace\Repositories\SellerRepository' );
        
        $seller = $sellerRepository->findOneByField('customer_id' , Auth::user()->id);

        if ($seller ) {
            $seller->update($request ->all());
            return redirect()->back()->with('success', 'Settings Updated' );
        }

        return redirect()->back()->with('error', 'Seller not found' );
    }
}