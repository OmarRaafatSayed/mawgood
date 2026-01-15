<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('vendor.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('vendor')->attempt($request->only('email', 'password'))) {
            $vendor = Auth::guard('vendor')->user();
            
            if (!$vendor->isApproved()) {
                Auth::guard('vendor')->logout();
                return back()->withErrors(['email' => 'حسابك لم يتم الموافقة عليه بعد']);
            }

            return redirect()->route('vendor.admin.dashboard.index');
        }

        return back()->withErrors(['email' => 'بيانات الدخول غير صحيحة']);
    }

    public function showRegisterForm()
    {
        return view('vendor.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vendors',
            'password' => 'required|string|min:8|confirmed',
            'shop_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shop_name' => $request->shop_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        return redirect()->route('vendor.login')->with('success', 'تم إنشاء حسابك بنجاح. في انتظار موافقة الإدارة');
    }

    public function logout()
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login');
    }
}