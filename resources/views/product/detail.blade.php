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
            colors: { "primary": "#FF6B00" },
            fontFamily: { "display": ["Tajawal", "sans-serif"] }
        }
    }
}
</script>
<style>
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
</head>
<body class="bg-gray-50" style="font-family: 'Tajawal', sans-serif;">
<div class="relative mx-auto max-w-[393px] min-h-screen bg-white flex flex-col">

<header class="sticky top-0 z-50 flex items-center justify-between px-4 py-3 bg-white/80 backdrop-blur-md border-b">
<button onclick="window.history.back()" class="size-10 rounded-full hover:bg-primary/5">
<span class="material-symbols-outlined text-primary">arrow_forward</span>
</button>
<h1 class="text-lg font-bold text-primary">تفاصيل المنتج</h1>
<button class="size-10 rounded-full hover:bg-primary/5">
<span class="material-symbols-outlined text-primary">share</span>
</button>
</header>

<main class="flex-1 overflow-y-auto pb-32">
<!-- Images -->
<div class="relative aspect-square bg-gray-100">
@if($product->images->count())
<img src="{{ asset('storage/' . $product->images->first()->path) }}" class="w-full h-full object-cover" alt="{{ $flat->name }}"/>
@else
<img src="/images/placeholder.png" class="w-full h-full object-cover" alt="صورة المنتج"/>
@endif
</div>

<div class="p-4 space-y-4">
<!-- Title & Rating -->
<div>
<h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $flat->name ?? 'منتج' }}</h2>
<div class="flex items-center gap-2">
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-yellow-500 fill-current text-[20px]">star</span>
<span class="text-sm font-bold text-gray-600">4.8</span>
</div>
</div>
</div>

<!-- Price -->
<div class="flex items-baseline gap-2">
<span class="text-3xl font-bold text-primary">{{ number_format($flat->price ?? 0, 0) }}</span>
<span class="text-lg text-gray-600">جنيه</span>
</div>

<!-- Colors -->
@if(count($colorOptions) > 0)
<div class="border-t pt-4">
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

<!-- Sizes -->
@if(count($sizeOptions) > 0)
<div class="border-t pt-4">
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

<!-- Description -->
@if($flat->short_description)
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-2">الوصف</h3>
<p class="text-gray-600 leading-relaxed">{!! $flat->short_description !!}</p>
</div>
@endif

<!-- Stock -->
<div class="border-t pt-4">
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

<!-- Related Products -->
@if(count($relatedProducts) > 0)
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-3">منتجات ذات صلة</h3>
<div class="overflow-x-auto hide-scrollbar -mx-4 px-4">
<div class="flex gap-3 pb-2">
@foreach($relatedProducts as $related)
<a href="/product/{{ $related->product_id }}" class="flex-shrink-0 w-36 bg-white rounded-xl border overflow-hidden">
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
<div class="p-2">
<h4 class="text-xs font-medium text-gray-800 line-clamp-2 mb-1">{{ $related->name }}</h4>
<span class="text-primary font-bold text-sm">{{ number_format($related->price, 0) }} <span class="text-[10px]">جنيه</span></span>
</div>
</a>
@endforeach
</div>
</div>
</div>
@endif
</div>
</main>

<!-- Buy Button -->
<div class="fixed bottom-20 left-0 right-0 w-full max-w-[393px] mx-auto bg-white border-t p-4 z-50">
<button onclick="buyNow()" class="w-full bg-primary text-white font-bold py-4 rounded-xl flex items-center justify-center gap-2 active:scale-95 transition-transform">
<span class="material-symbols-outlined">shopping_bag</span>
<span>اشتري الآن</span>
</button>
</div>

<!-- Footer Nav -->
@include('components.navbar')

</div>

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
            window.location.href = '/checkout/cart';
        } else {
            alert('حدث خطأ');
        }
    }).catch(() => {
        alert('حدث خطأ');
    });
}
</script>
</body>
</html>
