<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ $flat->name ?? 'منتج' }} - ماوجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: { "primary": "#FF6B00" }
        }
    }
}
</script>
<style>
body { font-family: 'Tajawal', sans-serif; }
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
</head>
<body class="bg-gray-50">

<header class="sticky top-0 z-50 bg-white border-b">
<div class="max-w-7xl mx-auto px-4 lg:px-8 py-3 flex items-center justify-between gap-4">
<div class="flex items-center gap-4">
<button onclick="window.history.back()" class="p-2 hover:bg-gray-100 rounded-full lg:hidden">
<span class="material-symbols-outlined text-gray-700">arrow_forward</span>
</button>
<a href="/" class="text-2xl font-bold text-primary">ماوجود</a>
<div class="hidden lg:flex items-center gap-6">
<a href="/categories" class="text-gray-700 hover:text-primary">الأقسام</a>
<a href="/jobs" class="text-gray-700 hover:text-primary">الوظائف</a>
</div>
</div>
<div class="flex items-center gap-2">
<a href="/checkout/cart" class="relative p-2 hover:bg-gray-100 rounded-full">
<span class="material-symbols-outlined text-gray-700">shopping_cart</span>
<span id="cart-badge-top" class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold rounded-full size-5 items-center justify-center">0</span>
</a>
<a href="#" class="p-2 hover:bg-gray-100 rounded-full">
<span class="material-symbols-outlined text-gray-700">person</span>
</a>
</div>
</div>
</header>

<main class="max-w-7xl mx-auto px-4 lg:px-8 py-6 pb-24 lg:pb-8">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
<div class="bg-white rounded-[15px] overflow-hidden shadow-sm sticky top-24 h-fit">
<div class="aspect-square bg-gray-100">
@if($product->images->count())
<img src="{{ asset('storage/' . $product->images->first()->path) }}" class="w-full h-full object-cover" alt="{{ $flat->name }}"/>
@else
<img src="/images/placeholder.png" class="w-full h-full object-cover" alt="صورة المنتج"/>
@endif
</div>
</div>

<div class="space-y-4">
<div class="bg-white rounded-[15px] p-6 shadow-sm">
<h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $flat->name ?? 'منتج' }}</h1>
<div class="flex items-center gap-2 mb-4">
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-yellow-500 fill-current text-[20px]">star</span>
<span class="text-sm font-bold text-gray-600">4.8</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<span class="text-4xl font-bold text-primary">{{ number_format($flat->price ?? 0, 0) }}</span>
<span class="text-xl text-gray-600">جنيه</span>
</div>
</div>

@if(count($colorOptions) > 0)
<div class="bg-white rounded-[15px] p-4 shadow-sm">
<h3 class="text-lg font-bold text-gray-800 mb-3">الألوان المتاحة</h3>
<div class="flex flex-wrap gap-2">
@foreach($colorOptions as $color)
<button onclick="selectColor(this)" class="px-4 py-2 border-2 border-gray-200 rounded-lg text-sm font-medium hover:border-primary transition-colors">
{{ $color->admin_name }}
</button>
@endforeach
</div>
</div>
@endif

@if(count($sizeOptions) > 0)
<div class="bg-white rounded-[15px] p-4 shadow-sm">
<h3 class="text-lg font-bold text-gray-800 mb-3">المقاسات المتاحة</h3>
<div class="flex flex-wrap gap-2">
@foreach($sizeOptions as $size)
<button onclick="selectSize(this)" class="px-4 py-2 border-2 border-gray-200 rounded-lg text-sm font-medium hover:border-primary transition-colors">
{{ $size->admin_name }}
</button>
@endforeach
</div>
</div>
@endif

@if($flat->short_description)
<div class="bg-white rounded-[15px] p-4 shadow-sm">
<h3 class="text-lg font-bold text-gray-800 mb-2">الوصف</h3>
<p class="text-gray-600 leading-relaxed">{!! $flat->short_description !!}</p>
</div>
@endif

<div class="bg-white rounded-[15px] p-4 shadow-sm">
<h3 class="text-lg font-bold text-gray-800 mb-2">التوفر</h3>
<div class="flex items-center gap-2">
@if($product->inventories->sum('qty') > 0)
<span class="material-symbols-outlined text-green-500">check_circle</span>
<span class="text-green-600 font-medium">متوفر ({{ $product->inventories->sum('qty') }} قطعة)</span>
@else
<span class="material-symbols-outlined text-red-500">cancel</span>
<span class="text-red-600 font-medium">غير متوفر</span>
@endif
</div>
</div>

<button onclick="buyNow()" class="w-full bg-primary text-white font-bold py-4 rounded-[15px] flex items-center justify-center gap-2 active:scale-95 transition-transform">
<span class="material-symbols-outlined">shopping_bag</span>
<span>اشتري الآن</span>
</button>
</div>
</div>

@if(count($relatedProducts) > 0)
<div class="mt-12">
<h3 class="text-2xl font-bold text-gray-800 mb-6">منتجات ذات صلة</h3>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
@foreach($relatedProducts as $related)
<a href="/product/{{ $related->product_id }}" class="bg-white rounded-[15px] overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="aspect-square bg-gray-100">
@php
$relatedImage = \DB::table('product_images')->where('product_id', $related->product_id)->first();
@endphp
@if($relatedImage)
<img src="{{ asset('storage/' . $relatedImage->path) }}" class="w-full h-full object-cover" alt="{{ $related->name }}"/>
@else
<img src="/images/placeholder.png" class="w-full h-full object-cover" alt="{{ $related->name }}"/>
@endif
</div>
<div class="p-3">
<h4 class="text-sm font-medium text-gray-800 line-clamp-2 mb-2">{{ $related->name }}</h4>
<span class="text-primary font-bold text-base">{{ number_format($related->price, 0) }} جنيه</span>
</div>
</a>
@endforeach
</div>
</div>
@endif
</main>

@include('components.footer')

@include('components.navbar')

<script>
let selectedColor = null;
let selectedSize = null;

function selectColor(btn) {
    document.querySelectorAll('[onclick="selectColor(this)"]').forEach(b => {
        b.classList.remove('border-primary', 'bg-primary/5');
        b.classList.add('border-gray-200');
    });
    btn.classList.remove('border-gray-200');
    btn.classList.add('border-primary', 'bg-primary/5');
    selectedColor = btn.textContent.trim();
}

function selectSize(btn) {
    document.querySelectorAll('[onclick="selectSize(this)"]').forEach(b => {
        b.classList.remove('border-primary', 'bg-primary/5');
        b.classList.add('border-gray-200');
    });
    btn.classList.remove('border-gray-200');
    btn.classList.add('border-primary', 'bg-primary/5');
    selectedSize = btn.textContent.trim();
}

function buyNow() {
    fetch('/api/checkout/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: {{ $product->id }},
            quantity: 1
        })
    }).then(response => {
        if (response.ok) {
            if (typeof updateCartBadge === 'function') updateCartBadge();
            updateTopBadge();
            window.location.href = '/checkout/cart';
        } else {
            alert('حدث خطأ');
        }
    }).catch(() => {
        alert('حدث خطأ');
    });
}

function updateTopBadge() {
    fetch('/api/checkout/cart')
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('cart-badge-top');
            const count = data.data?.items_count || 0;
            if (count > 0) {
                badge.textContent = count;
                badge.classList.remove('hidden');
                badge.classList.add('flex');
            }
        })
        .catch(() => {});
}

updateTopBadge();
</script>
</body>
</html>
