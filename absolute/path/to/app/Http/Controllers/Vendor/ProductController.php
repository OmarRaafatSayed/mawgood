public function store(Request $request)
{
    // ... existing code ...
    $product = $this->productRepository->create(array_merge($data, [
        'status' => 1,
        'visible_individually' => 1,
        'vendor_id' => auth()->user()->vendor->id
    ]));
    // ... existing code ...
}