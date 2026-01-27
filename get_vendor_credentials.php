<?php

// Run this with: php artisan tinker < get_vendor_credentials.php

$vendor = \App\Models\Vendor::where('store_name', 'LIKE', '%Magdy%')
    ->orWhere('store_name', 'LIKE', '%Shaban%')
    ->first();

if (!$vendor) {
    echo "Vendor not found\n";
    exit;
}

$customer = $vendor->customer;

if (!$customer) {
    echo "Customer not found\n";
    exit;
}

// Reset password to 123456
$customer->password = bcrypt('123456');
$customer->save();

echo "=================================\n";
echo "Vendor: " . $vendor->store_name . "\n";
echo "Status: " . $vendor->status . "\n";
echo "Email: " . $customer->email . "\n";
echo "Password: 123456\n";
echo "=================================\n";
echo "Login URL: /customer/login\n";
echo "Dashboard: /vendor/dashboard\n";
