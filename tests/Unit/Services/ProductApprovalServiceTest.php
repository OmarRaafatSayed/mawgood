<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\ProductApprovalService;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApprovalServiceTest extends TestCase
{
    use RefreshDatabase;

    protected ProductApprovalService $service;
    protected ProductRepository $productRepository;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->service = app(ProductApprovalService::class);
        $this->productRepository = app(ProductRepository::class);
    }

    /** @test */
    public function it_approves_product_successfully()
    {
        // Arrange: Create a vendor product
        $product = Product::factory()->create([
            'approved_by_admin' => false,
            'status' => 0,
            'vendor_id' => 1,
        ]);

        // Act: Approve the product
        $result = $this->service->approveProduct($product->id);

        // Assert
        $this->assertTrue($result);
        
        $product->refresh();
        $this->assertTrue($product->approved_by_admin);
        $this->assertEquals(1, $product->status);
    }

    /** @test */
    public function it_sets_required_attributes_on_approval()
    {
        // Arrange
        $product = Product::factory()->create([
            'approved_by_admin' => false,
            'vendor_id' => 1,
        ]);

        // Act
        $this->service->approveProduct($product->id);

        // Assert: Check if required attributes are set
        $product->refresh();
        
        // Check visible_individually
        $visibleAttr = $product->attribute_values
            ->where('attribute.code', 'visible_individually')
            ->first();
        $this->assertNotNull($visibleAttr);
        $this->assertTrue($visibleAttr->boolean_value);

        // Check weight
        $weightAttr = $product->attribute_values
            ->where('attribute.code', 'weight')
            ->first();
        $this->assertNotNull($weightAttr);
        $this->assertEquals('1', $weightAttr->text_value);
    }

    /** @test */
    public function it_rejects_product_successfully()
    {
        // Arrange
        $product = Product::factory()->create([
            'approved_by_admin' => true,
            'status' => 1,
            'vendor_id' => 1,
        ]);

        // Act
        $result = $this->service->rejectProduct($product->id);

        // Assert
        $this->assertTrue($result);
        
        $product->refresh();
        $this->assertFalse($product->approved_by_admin);
        $this->assertEquals(0, $product->status);
    }
}
