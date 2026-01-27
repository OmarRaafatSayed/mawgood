<?php

namespace App\Policies;

use Webkul\Customer\Models\Customer;
use Mawgood\Vendor\Models\Vendor;

class VendorPolicy
{
    public function accessDashboard(Customer $user, Vendor $vendor)
    {
        return $vendor->customer_id === $user->id 
            && session('active_role') === 'vendor';
    }

    public function manageProducts(Customer $user, Vendor $vendor)
    {
        return $vendor->customer_id === $user->id 
            && session('active_role') === 'vendor';
    }

    public function accessWallet(Customer $user, Vendor $vendor)
    {
        return $vendor->customer_id === $user->id 
            && session('active_role') === 'vendor';
    }
}
