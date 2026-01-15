<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Webkul\Customer\Models\Customer;
use App\Models\Vendor;
use Webkul\Category\Models\Category;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

it('creates a vendor record when a customer applies and sets status to pending', function () {
    // Create a minimal category row (only id required for validation)
    $categoryId = app('db')->table('categories')->insertGetId([
        'position' => 0,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Create a customer and act as them
    /** @var \Webkul\Customer\Models\Customer $customer */
    $customer = Customer::factory()->create();

    actingAs($customer, 'customer')
         ->post('/vendor/apply', [
             'store_name' => 'Test Store',
             'store_description' => 'A short description for the test store',
             'category_id' => $categoryId,
             'business_email' => 'owner@example.com',
             'business_phone' => '0123456789',
             'business_address' => '123 Test St',
         ])
         ->assertRedirect(route('vendor.under-review'));

    $vendor = Vendor::where('customer_id', $customer->id)->first();

    expect($vendor)->not->toBeNull();
    expect($vendor->status)->toBe('pending');
    expect($vendor->store_name)->toBe('Test Store');
});
