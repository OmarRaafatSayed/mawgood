<?php

namespace Mawgood\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreUpdateProductRequest;
use App\Services\Product\ProductService;
use Webkul\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected ProductRepository $productRepository
    ) {}

    public function index(Request $request)
    {
        $vendor = $request->vendor;
        $products = $this->productRepository->where('vendor_id', $vendor->id)->paginate(15);

        return view('mawgood-vendor::products.index', compact('products', 'vendor'));
    }

    public function create(Request $request)
    {
        $vendor = $request->vendor;
        
        // Create empty product with proper relations
        $product = new \Webkul\Product\Models\Product();
        $product->type = 'simple';
        $product->vendor_id = $vendor->id;
        
        // Load attribute family with relations
        $attributeFamily = \Webkul\Attribute\Models\AttributeFamily::with([
            'attribute_groups.custom_attributes'
        ])->first();
        
        if ($attributeFamily) {
            $product->attribute_family_id = $attributeFamily->id;
            $product->setRelation('attribute_family', $attributeFamily);
        }
        
        // Load all necessary data for form
        $categories = \Webkul\Category\Models\Category::all();
        $inventorySources = \Webkul\Inventory\Models\InventorySource::where('status', 1)->get();
        $channels = \Webkul\Core\Models\Channel::all();
        $locales = \Webkul\Core\Models\Locale::all();
        $currentLocale = core()->getCurrentLocale();
        
        return view('mawgood-vendor::products.create', compact(
            'vendor', 
            'product', 
            'categories', 
            'inventorySources', 
            'channels', 
            'locales',
            'currentLocale'
        ));
    }

    public function store(StoreUpdateProductRequest $request)
    {
        $vendor = $request->vendor;
        $data = $request->all();
        
        // Force vendor_id
        $data['vendor_id'] = $vendor->id;
        
        // Set defaults
        if (!isset($data['type'])) {
            $data['type'] = 'simple';
        }
        
        if (!isset($data['attribute_family_id'])) {
            $data['attribute_family_id'] = \Webkul\Attribute\Models\AttributeFamily::first()->id ?? 1;
        }
        
        // Generate SKU if not provided
        if (empty($data['sku'])) {
            $data['sku'] = 'PROD-' . strtoupper(uniqid());
        }
        
        // Set status to pending for vendor products (needs admin approval)
        $data['approved_by_admin'] = false; // يحتاج موافقة الأدمن
        $data['status'] = 0; // غير نشط حتى يوافق الأدمن
        
        try {
            $product = $this->productService->create($data);
            
            // توليد url_key إذا لم يكن موجود
            if (empty($data['url_key'])) {
                $data['url_key'] = \Illuminate\Support\Str::slug($data['name']) . '-' . $product->id;
            }
            
            // Update product with all data including inventory, images, videos
            $product = $this->productService->update($data, $product->id);
            
            // Handle images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('product/' . $product->id, 'public');
                    $product->images()->create(['path' => $path]);
                }
            }
            
            // Handle videos
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $video) {
                    $path = $video->store('product/' . $product->id, 'public');
                    $product->videos()->create(['path' => $path]);
                }
            }
            
            return redirect()->route('vendor.products.edit', $product->id)
                ->with('success', 'تم إضافة المنتج بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $vendor = $request->vendor;
        
        // Load product with all relations
        $product = $this->productRepository
            ->with([
                'attribute_family.attribute_groups.custom_attributes',
                'images',
                'videos',
                'inventories',
                'categories',
                'channels'
            ])
            ->where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->firstOrFail();
        
        // Load all necessary data for form
        $categories = \Webkul\Category\Models\Category::all();
        $inventorySources = \Webkul\Inventory\Models\InventorySource::where('status', 1)->get();
        $channels = \Webkul\Core\Models\Channel::all();
        $locales = \Webkul\Core\Models\Locale::all();
        $currentLocale = core()->getCurrentLocale();

        return view('mawgood-vendor::products.edit', compact(
            'product', 
            'vendor', 
            'categories', 
            'inventorySources', 
            'channels', 
            'locales',
            'currentLocale'
        ));
    }

    public function update(StoreUpdateProductRequest $request, $id)
    {
        $vendor = $request->vendor;
        
        // Verify ownership
        $product = $this->productRepository
            ->where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->firstOrFail();
        
        $data = $request->all();
        
        // Ensure vendor_id cannot be changed
        $data['vendor_id'] = $vendor->id;
        
        try {
            // Update product with all data including inventory
            $product = $this->productService->update($data, $id);
            
            // Handle new images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('product/' . $product->id, 'public');
                    $product->images()->create(['path' => $path]);
                }
            }
            
            // Handle remove images
            if ($request->has('remove_images')) {
                foreach ($request->remove_images as $imageId) {
                    $image = $product->images()->find($imageId);
                    if ($image) {
                        \Storage::disk('public')->delete($image->path);
                        $image->delete();
                    }
                }
            }
            
            // Handle new videos
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $video) {
                    $path = $video->store('product/' . $product->id, 'public');
                    $product->videos()->create(['path' => $path]);
                }
            }
            
            return redirect()->route('vendor.products.index')
                ->with('success', 'تم تحديث المنتج بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        $vendor = $request->vendor;
        $product = \DB::table('products')
            ->where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->first();

        if (!$product) {
            return redirect()->route('vendor.products.index')
                ->with('error', 'المنتج غير موجود');
        }

        return view('mawgood-vendor::products.show', compact('product', 'vendor'));
    }

    public function massDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:products,id'
        ]);

        $vendor = $request->vendor;
        
        \DB::table('products')
            ->whereIn('id', $request->ids)
            ->where('vendor_id', $vendor->id)
            ->delete();

        return redirect()->route('vendor.products.index')
            ->with('success', 'تم حذف المنتجات المحددة بنجاح');
    }
}
