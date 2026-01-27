<x-shop::layouts>
    <x-slot:title>عن {{ $vendor->store_name }}</x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('store.show', $vendor->store_slug) }}" class="text-blue-600 hover:underline">
                ← العودة للمتجر
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-6">عن {{ $vendor->store_name }}</h1>

            @if($vendor->store_logo)
                <img src="{{ Storage::url($vendor->store_logo) }}" alt="{{ $vendor->store_name }}" class="w-32 h-32 rounded-full mb-6">
            @endif

            @if($vendor->store_description)
                <div class="prose max-w-none mb-6">
                    <p class="text-gray-700 text-lg">{{ $vendor->store_description }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-bold mb-2">عدد المنتجات</h3>
                    <p class="text-2xl text-blue-600">{{ $vendor->products_count }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-bold mb-2">الحالة</h3>
                    <p class="text-green-600">متجر معتمد ✓</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-bold mb-2">تاريخ الانضمام</h3>
                    <p>{{ $vendor->created_at->format('Y-m-d') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts>
