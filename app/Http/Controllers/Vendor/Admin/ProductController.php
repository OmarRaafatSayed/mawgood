<?php

namespace App\Http\Controllers\Vendor\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Admin\Http\Controllers\Catalog\ProductController as BaseProductController;
use Webkul\Admin\Http\Requests\ProductForm;

class ProductController extends BaseProductController
{
    protected $vendor;

    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected ProductDownloadableLinkRepository $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        protected ProductInventoryRepository $productInventoryRepository,
        protected ProductRepository $productRepository,
        protected CustomerRepository $customerRepository,
    ) {
        parent::__construct(
            $this->attributeFamilyRepository,
            $this->productAttributeValueRepository,
            $this->productDownloadableLinkRepository,
            $this->productDownloadableSampleRepository,
            $this->productInventoryRepository,
            $this->productRepository,
            $this->customerRepository,
        );
    }

    /**
     * Get vendor from authenticated customer
     */
    protected function getVendor()
    {
        if ($this->vendor) {
            return $this->vendor;
        }

        $customer = Auth::guard('customer')->user();
        
        if (!$customer) {
            abort(401, 'Unauthorized');
        }

        $this->vendor = Vendor::where('customer_id', $customer->id)->where('status', 'approved')->first();
        
        if (!$this->vendor) {
            abort(403, 'Unauthorized access');
        }

        return $this->vendor;
    }

    /**
     * Display vendor's products only
     */
    public function index()
    {
        $vendor = $this->getVendor();

        if (request()->ajax()) {
            return app(\Webkul\Admin\DataGrids\Catalog\ProductDataGrid::class)
                ->addFilter('vendor_id', $vendor->id)
                ->toJson();
        }

        return view('vendor.admin.catalog.products.index', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $vendor = $this->getVendor();
        
        return view('vendor.admin.catalog.products.create', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Store a newly created product
     */
    public function store()
    {
        $vendor = $this->getVendor();
        
        // Auto-generate SKU
        $sku = 'SKU-' . strtoupper(substr(md5(microtime()), 0, 8));
        
        // Auto-set status to enabled (1)
        $status = 1;
        
        // Merge vendor_id, SKU, and status into request
        request()->merge([
            'vendor_id' => $vendor->id,
            'sku' => $sku,
            'status' => $status,
        ]);
        
        $response = parent::store();
        
        // After product is created, ensure product_flat records exist
        // This makes the product searchable and visible on the storefront
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            $data = $response->getData(true);
            if (isset($data['data']['redirect_url'])) {
                // Extract product ID from redirect URL
                preg_match('/products\/(\d+)\/edit/', $data['data']['redirect_url'], $matches);
                if (!empty($matches[1])) {
                    $productId = $matches[1];
                    $this->createProductFlatRecords($productId, $vendor->id);
                }
            }
        }
        
        return $response;
    }
    
    /**
     * Create product_flat records for the product
     * This enables the product to appear in search and on the storefront
     */
    private function createProductFlatRecords($productId, $vendorId)
    {
        try {
            $product = $this->productRepository->findOrFail($productId);
            $channels = \Webkul\Core\Models\Channel::all();
            $locales = \Webkul\Core\Models\Locale::all();
            
            foreach ($channels as $channel) {
                foreach ($locales as $locale) {
                    $existingFlat = \DB::table('product_flat')
                        ->where('product_id', $productId)
                        ->where('channel', $channel->code)
                        ->where('locale', $locale->code)
                        ->first();
                    
                    // Only create if it doesn't exist
                    if (!$existingFlat) {
                        \DB::table('product_flat')->insert([
                            'product_id' => $productId,
                            'sku' => $product->sku,
                            'type' => $product->type,
                            'channel' => $channel->code,
                            'locale' => $locale->code,
                            'name' => 'New Product',  // Default name
                            'description' => null,
                            'short_description' => null,
                            'url_key' => \Str::slug('product-' . $productId),
                            'new' => 0,
                            'featured' => 0,
                            'status' => 1,  // Make it visible
                            'visible_individually' => 1,  // Make it visible individually
                            'attribute_family_id' => $product->attribute_family_id,
                            'parent_id' => $product->parent_id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::warning('Could not create product_flat records: ' . $e->getMessage());
            // Don't throw - product is created, just missing flat records
        }
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit($id)
    {
        $vendor = $this->getVendor();
        $product = $this->productRepository->findOrFail($id);
        
        // Ensure vendor can only edit their own products
        if ($product->vendor_id !== $vendor->id) {
            abort(403, 'Unauthorized access to this product');
        }

        return view('vendor.admin.catalog.products.edit', [
            'product' => $product,
            'vendor' => $vendor
        ]);
    }

    /**
     * Update the specified product
     */
    public function update(ProductForm $request, int $id)
    {
        $vendor = $this->getVendor();
        $product = $this->productRepository->findOrFail($id);
        
        // Ensure vendor can only update their own products
        if ($product->vendor_id !== $vendor->id) {
            abort(403, 'Unauthorized access to this product');
        }

        return parent::update($request, $id);
    }

    /**
     * Remove the specified product
     */
    public function destroy(int $id): JsonResponse
    {
        $vendor = $this->getVendor();
        $product = $this->productRepository->findOrFail($id);
        
        // Ensure vendor can only delete their own products
        if ($product->vendor_id !== $vendor->id) {
            abort(403, 'Unauthorized access to this product');
        }

        return parent::destroy($id);
    }
}