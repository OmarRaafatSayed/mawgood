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
        $products = $this->productRepository
            ->with(['images', 'inventories'])
            ->where('vendor_id', $vendor->id)
            ->paginate(15);
        
        // Add computed properties
        $products->getCollection()->transform(function ($product) {
            $product->image_url = $product->images->first()?->url ?? $product->base_image?->medium_image_url ?? asset('images/placeholder.png');
            $product->quantity = $product->inventories->sum('qty') ?? 0;
            return $product;
        });

        return view('mawgood-vendor::products.index', compact('products', 'vendor'));
    }

    public function create(Request $request)
    {
        $vendor = $request->vendor;
        
        $product = new \Webkul\Product\Models\Product();
        $product->type = 'simple';
        $product->vendor_id = $vendor->id;
        
        $attributeFamily = \Webkul\Attribute\Models\AttributeFamily::first();
        
        if ($attributeFamily) {
            $product->attribute_family_id = $attributeFamily->id;
            $product->setRelation('attribute_family', $attributeFamily);
        }
        
        $categories = \Webkul\Category\Models\Category::select('id', 'parent_id')->get();
        $inventorySources = \Webkul\Inventory\Models\InventorySource::where('status', 1)->select('id', 'name')->get();
        $channels = \Webkul\Core\Models\Channel::select('id', 'code')->get();
        $locales = \Webkul\Core\Models\Locale::select('id', 'code')->get();
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
        
        // Set defaults for hidden fields
        $data['type'] = $data['type'] ?? 'simple';
        $data['attribute_family_id'] = $data['attribute_family_id'] ?? 1;
        $data['sku'] = $data['sku'] ?? 'PROD-' . strtoupper(uniqid());
        
        // Set default values for removed UI fields
        $data['weight'] = $data['weight'] ?? 1;
        $data['meta_title'] = $data['meta_title'] ?? $data['name'] ?? '';
        $data['meta_description'] = $data['meta_description'] ?? $data['short_description'] ?? '';
        
        // Hardcode visibility and purchase logic
        $data['visible_individually'] = 1; // Always visible
        $data['guest_checkout'] = 0; // Require login to purchase
        
        // Set product as inactive by default - requires admin approval
        $data['approved_by_admin'] = false;
        $data['status'] = 0;
        
        try {
            // Remove array fields that cause PDO errors
            $colors = $request->input('color', []);
            $sizes = $request->input('size', []);
            unset($data['color'], $data['size']);
            
            $product = $this->productService->create($data);
            
            // Generate url_key if missing
            if (empty($data['url_key'])) {
                $data['url_key'] = \Illuminate\Support\Str::slug($data['name']) . '-' . $product->id;
            }
            
            $product = $this->productService->update($data, $product->id);
            
            // Save Color attributes (as comma-separated string)
            if (!empty($colors) && is_array($colors)) {
                $colorIds = implode(',', array_unique(array_filter($colors)));
                if (!empty($colorIds)) {
                    \DB::table('product_attribute_values')->insert([
                        'product_id' => $product->id,
                        'attribute_id' => 23,
                        'text_value' => $colorIds,
                        'locale' => 'en',
                        'channel' => 'default'
                    ]);
                }
            }
            
            // Save Size attributes (as comma-separated string)
            if (!empty($sizes) && is_array($sizes)) {
                $sizeIds = implode(',', array_unique(array_filter($sizes)));
                if (!empty($sizeIds)) {
                    \DB::table('product_attribute_values')->insert([
                        'product_id' => $product->id,
                        'attribute_id' => 24,
                        'text_value' => $sizeIds,
                        'locale' => 'en',
                        'channel' => 'default'
                    ]);
                }
            }
            
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
            
            return redirect()->route('vendor.products.index')
                ->with('success', 'تم إضافة المنتج بنجاح وسيتم مراجعته من قبل الإدارة');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $vendor = $request->vendor;
        
        $product = $this->productRepository
            ->with(['images', 'videos', 'inventories', 'categories', 'channels'])
            ->where('id', $id)
            ->where('vendor_id', $vendor->id)
            ->firstOrFail();
        
        $categories = \Webkul\Category\Models\Category::select('id', 'parent_id')->get();
        $inventorySources = \Webkul\Inventory\Models\InventorySource::where('status', 1)->select('id', 'name')->get();
        $channels = \Webkul\Core\Models\Channel::select('id', 'code')->get();
        $locales = \Webkul\Core\Models\Locale::select('id', 'code')->get();
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
        
        // Set default values for removed UI fields
        $data['weight'] = $data['weight'] ?? 1;
        $data['meta_title'] = $data['meta_title'] ?? $data['name'] ?? '';
        $data['meta_description'] = $data['meta_description'] ?? $data['short_description'] ?? '';
        
        // Hardcode visibility and purchase logic
        $data['visible_individually'] = 1; // Always visible
        $data['guest_checkout'] = 0; // Require login to purchase
        
        try {
            // Remove array fields that cause PDO errors
            $colors = $request->input('color', []);
            $sizes = $request->input('size', []);
            unset($data['color'], $data['size']);
            
            // Delete ALL existing attributes FIRST (before update)
            \DB::table('product_attribute_values')
                ->where('product_id', $id)
                ->whereIn('attribute_id', [23, 24])
                ->delete();
            
            // Update product
            $product = $this->productService->update($data, $id);
            
            // Insert new Color attributes (as comma-separated string)
            if (!empty($colors) && is_array($colors)) {
                $colorIds = implode(',', array_unique(array_filter($colors)));
                if (!empty($colorIds)) {
                    \DB::table('product_attribute_values')->insert([
                        'product_id' => $id,
                        'attribute_id' => 23,
                        'text_value' => $colorIds,
                        'locale' => 'en',
                        'channel' => 'default'
                    ]);
                }
            }
            
            // Insert new Size attributes (as comma-separated string)
            if (!empty($sizes) && is_array($sizes)) {
                $sizeIds = implode(',', array_unique(array_filter($sizes)));
                if (!empty($sizeIds)) {
                    \DB::table('product_attribute_values')->insert([
                        'product_id' => $id,
                        'attribute_id' => 24,
                        'text_value' => $sizeIds,
                        'locale' => 'en',
                        'channel' => 'default'
                    ]);
                }
            }
            
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
