<?php

namespace App\Helpers;

class ContextValidator
{
    public static function validateVendorContext($vendor)
    {
        $user = auth()->guard('customer')->user();

        if (!$user) {
            throw new \Exception('Unauthenticated');
        }

        if (session('active_role') !== 'vendor') {
            throw new \Exception('Invalid active role');
        }

        if ($vendor->customer_id !== $user->id) {
            throw new \Exception('Unauthorized vendor access');
        }

        return true;
    }

    public static function validateCompanyContext($companyId)
    {
        $user = auth()->guard('customer')->user();

        if (!$user) {
            throw new \Exception('Unauthenticated');
        }

        if (session('active_role') !== 'company') {
            throw new \Exception('Invalid active role');
        }

        if ($companyId !== $user->id) {
            throw new \Exception('Unauthorized company access');
        }

        return true;
    }

    public static function getActiveContext()
    {
        return [
            'role' => session('active_role'),
            'profile_id' => session('active_profile_id'),
            'user_id' => auth()->guard('customer')->id(),
        ];
    }
}
