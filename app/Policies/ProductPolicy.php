<?php

namespace App\Policies;

use Webkul\Product\Models\Product;
use Webkul\User\Models\Admin;
use Webkul\Customer\Models\Customer;

class ProductPolicy
{
    public function update($user, Product $product)
    {
        if ($user instanceof Admin) {
            return true;
        }

        if ($user instanceof Customer) {
            return $product->vendor_id === $user->id;
        }

        return false;
    }

    public function delete($user, Product $product)
    {
        if ($user instanceof Admin) {
            return true;
        }

        if ($user instanceof Customer) {
            return $product->vendor_id === $user->id;
        }

        return false;
    }
}
