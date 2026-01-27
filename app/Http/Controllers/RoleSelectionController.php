<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleSelectionController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        $roles = $user->roles;

        if ($roles->count() === 1) {
            return $this->select(new Request(['role' => $roles->first()->name]));
        }

        return view('auth.select-role', compact('roles'));
    }

    public function select(Request $request)
    {
        $user = auth()->guard('customer')->user();
        $role = $request->role;

        if (!$user->hasRole($role)) {
            return back()->with('error', 'دور غير صالح');
        }

        $user->setActiveRole($role);

        return match ($role) {
            'vendor' => redirect()->route('vendor.dashboard'),
            'company' => redirect()->route('company.dashboard'),
            default => redirect()->route('shop.home.index')
        };
    }
}
