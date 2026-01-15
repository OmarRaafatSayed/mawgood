<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Customer\Models\Customer;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class VendorTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test customer
        $customer = Customer::firstOrCreate(
            ['email' => 'vendor-test@example.com'],
            [
                'first_name' => 'Test',
                'last_name' => 'Vendor',
                'email' => 'vendor-test@example.com',
                'password' => Hash::make('password123'),
            ]
        );

        // Create an approved vendor for this customer
        Vendor::firstOrCreate(
            ['customer_id' => $customer->id],
            [
                'customer_id' => $customer->id,
                'store_name' => 'Test Store',
                'store_slug' => 'test-store',
                'store_description' => 'A test vendor store',
                'status' => 'approved',
                'commission_rate' => 10.00,
                'wallet_balance' => 0,
                'available_balance' => 0,
                'unavailable_balance' => 0,
            ]
        );

        $this->command->info('Test vendor and customer created!');
        $this->command->info('Email: vendor-test@example.com');
        $this->command->info('Password: password123');
        $this->command->info('Access: http://127.0.0.1:8000/vendor/admin');
    }
}
