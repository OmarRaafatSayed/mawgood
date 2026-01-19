public function index()
{
    $products = \Webkul\Product\Models\Product::where('status', 1)
        ->where('visible_individually', 1)
        ->whereHas('inventory_sources', function($query) {
            $query->where('qty', '>', 0);
        })
        ->with(['vendor', 'images'])
        ->paginate(12);

    return view('home.index', compact('products'));
}