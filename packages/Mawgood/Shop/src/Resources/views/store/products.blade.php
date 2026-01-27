<x-shop::layouts>
    <x-slot:title>منتجات {{ $vendor->store_name }}</x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('store.show', $vendor->store_slug) }}" class="text-blue-600 hover:underline">
                ← العودة للمتجر
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-6">منتجات {{ $vendor->store_name }}</h1>

        @if($products->isEmpty())
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لا توجد منتجات حالياً</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                        <div class="p-4">
                            <h3 class="font-bold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ $product->sku }}</p>
                            <a href="/product/{{ $product->sku }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</x-shop::layouts>
