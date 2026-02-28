<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>المفضلة - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-7xl mx-auto px-4 py-8 pb-24">
<h1 class="text-3xl font-bold text-gray-800 mb-6">المفضلة</h1>

@if($items->count())
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
@foreach($items as $item)
<div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="relative aspect-square bg-gray-100">
<img src="{{ $item->product->base_image_url }}" class="w-full h-full object-cover" alt="{{ $item->product->name }}"/>
<button onclick="removeFromWishlist({{ $item->id }})" class="absolute top-2 right-2 size-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-red-500 fill-1">favorite</span>
</button>
</div>
<div class="p-3">
<h3 class="text-sm font-medium line-clamp-2 mb-2">{{ $item->product->name }}</h3>
<div class="flex items-center justify-between">
<span class="text-primary font-bold">{{ core()->formatPrice($item->product->price) }}</span>
<a href="{{ route('shop.product.index', $item->product->url_key) }}" class="size-9 rounded-full bg-primary text-white flex items-center justify-center hover:shadow-lg transition-all">
<span class="material-symbols-outlined text-[20px]">arrow_back</span>
</a>
</div>
</div>
</div>
@endforeach
</div>
@else
<div class="bg-white rounded-2xl shadow-sm p-12 text-center">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">favorite_border</span>
<p class="text-gray-600 mb-4">لا توجد منتجات في المفضلة</p>
<a href="/categories" class="inline-block px-6 py-3 bg-primary text-white font-bold rounded-xl hover:shadow-lg transition-all">تصفح المنتجات</a>
</div>
@endif
</main>

@include('components.footer')
@include('components.navbar')

<script>
function removeFromWishlist(id) {
    if(confirm('هل تريد إزالة هذا المنتج من المفضلة؟')) {
        fetch(`/customer/account/wishlist/remove/${id}`, {
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        }).then(() => location.reload());
    }
}
</script>
</body>
</html>
