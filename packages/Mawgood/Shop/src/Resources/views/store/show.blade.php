<x-shop::layouts>
    <x-slot:title>{{ $vendor->meta_title ?? $vendor->store_name }}</x-slot>

    @push('meta')
        <meta name="description" content="{{ $vendor->meta_description ?? $vendor->store_description }}">
        <meta property="og:title" content="{{ $vendor->store_name }}">
        <meta property="og:description" content="{{ $vendor->store_description }}">
    @endpush

    <div class="container mx-auto px-4 py-8">
        <!-- Store Header -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            @if($vendor->store_banner)
                <img src="{{ Storage::url($vendor->store_banner) }}" alt="{{ $vendor->store_name }}" class="w-full h-64 object-cover">
            @endif
            
            <div class="p-6">
                <div class="flex items-center gap-4 mb-4">
                    @if($vendor->store_logo)
                        <img src="{{ Storage::url($vendor->store_logo) }}" alt="{{ $vendor->store_name }}" class="w-20 h-20 rounded-full">
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold">{{ $vendor->store_name }}</h1>
                        <div class="flex items-center gap-2 text-yellow-500">
                            <span>⭐ {{ number_format($averageRating, 1) }}</span>
                            <span class="text-gray-600">({{ $vendor->products_count }} منتج)</span>
                        </div>
                    </div>
                </div>
                
                @if($vendor->store_description)
                    <p class="text-gray-700 mb-4">{{ $vendor->store_description }}</p>
                @endif

                <div class="flex gap-4">
                    <a href="{{ route('store.products', $vendor->store_slug) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        تصفح المنتجات
                    </a>
                    <a href="{{ route('store.about', $vendor->store_slug) }}" class="bg-gray-200 px-6 py-2 rounded-lg hover:bg-gray-300">
                        عن المتجر
                    </a>
                    <a href="{{ route('store.reviews', $vendor->store_slug) }}" class="bg-gray-200 px-6 py-2 rounded-lg hover:bg-gray-300">
                        التقييمات
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Products -->
        <h2 class="text-2xl font-bold mb-6">المنتجات المميزة</h2>
        
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
                            <a href="/product/{{ $product->sku }}" class="text-blue-600 hover:underline">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('store.products', $vendor->store_slug) }}" class="text-blue-600 hover:underline">
                    عرض جميع المنتجات →
                </a>
            </div>
        @endif
    </div>
</x-shop::layouts>
