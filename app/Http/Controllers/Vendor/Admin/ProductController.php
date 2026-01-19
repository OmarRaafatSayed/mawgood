<?php

namespace App\Http\Controllers\Vendor\Admin ;

use App\Http\Controllers\Controller ;
use Webkul\Product\Repositories\ProductRepository ;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth ;
use Webkul\Product\Models\ProductProxy as Product ;

class ProductController extends Controller
{
    // تعريف الـ property يدوياً للتأكد من أن الـ IDE يراها
    protected $productRepository ;

    public function __construct(ProductRepository $productRepository )
    {
        $this->productRepository = $productRepository ;
    }

    /**
     * Display a listing of the resource.
     */
    public function index( )
    {
        $products = $this->productRepository->scopeQuery(function($query) {
            return $query->where('url_path', 'like', '%' . Auth::user()->id . '%' );
        })->paginate(10 );

        return view('vendor.admin.catalog.products.index', compact('products' ));
    }

    public function create( )
    {
        return view('vendor.admin.catalog.products.create' );
    }

    public function store(Request $request )
    {
        $request ->validate([
            'sku'  => 'required|unique:products' ,
            'type' => 'required' ,
        ]);

        $product = $this->productRepository->create($request ->all());

        session()->flash('success', 'تم حفظ المنتج بنجاح' );
        return redirect()->route('vendor.admin.catalog.products.index' );
    }

    public function destroy($id )
    {
        $this->productRepository->delete($id );

        return response()->json(['message' => 'Product Deleted' ]);
    }
}