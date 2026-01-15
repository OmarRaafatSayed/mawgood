<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Models\Vendor;
use Webkul\Customer\Models\Customer;
use App\Notifications\VendorApprovedNotification;

class AdminVendorApprovalTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_approve_vendor_and_notification_is_sent()
    {
        Notification::fake();

        // create a customer and vendor
        $customer = Customer::factory()->create();

        $vendor = Vendor::create([
            'customer_id' => $customer->id,
            'store_name' => 'Test Store',
            'store_slug' => 'test-store',
            'status' => 'pending'
        ]);

        // simulate admin user by acting as a web user (routes use web middleware only in this test)
        $response = $this->post("/admin/vendors/{$vendor->id}/approve");

        $response->assertStatus(200);

        $this->assertDatabaseHas('vendors', [
            'id' => $vendor->id,
            'status' => 'approved'
        ]);

        Notification::assertSentTo($customer, VendorApprovedNotification::class);
    }
}
