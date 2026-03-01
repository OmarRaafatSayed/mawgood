<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>سلة التسوق - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-7xl mx-auto px-4 py-8 pb-24">
<h1 class="text-3xl font-bold text-gray-800 mb-6">سلة التسوق</h1>

<div class="grid lg:grid-cols-3 gap-6">
<div class="lg:col-span-2 space-y-4">
@if(count($cart->items))
@foreach($cart->items as $item)
<div class="bg-white rounded-2xl shadow-sm p-6 flex gap-4">
<img src="{{ $item->product->base_image_url }}" class="size-24 rounded-xl object-cover" alt="{{ $item->name }}"/>
<div class="flex-1">
<h3 class="font-bold text-gray-800 mb-1">{{ $item->name }}</h3>
<p class="text-primary font-bold mb-2">{{ core()->formatPrice($item->price) }}</p>
<div class="flex items-center gap-3">
<button onclick="updateQty({{ $item->id }}, -1)" class="size-8 rounded-lg border-2 border-gray-200 flex items-center justify-center hover:border-primary">-</button>
<span class="font-medium">{{ $item->quantity }}</span>
<button onclick="updateQty({{ $item->id }}, 1)" class="size-8 rounded-lg border-2 border-gray-200 flex items-center justify-center hover:border-primary">+</button>
</div>
</div>
<button onclick="removeItem({{ $item->id }})" class="text-red-500 hover:bg-red-50 p-2 rounded-lg">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
@endforeach
@else
<div class="bg-white rounded-2xl shadow-sm p-12 text-center">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">shopping_cart</span>
<p class="text-gray-600 mb-4">سلة التسوق فارغة</p>
<a href="/categories" class="inline-block px-6 py-3 bg-primary text-white font-bold rounded-xl hover:shadow-lg transition-all">تصفح المنتجات</a>
</div>
@endif
</div>

<div class="lg:col-span-1">
<div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
<h2 class="text-xl font-bold text-gray-800 mb-4">ملخص الطلب</h2>
<div class="space-y-3 mb-4 pb-4 border-b">
<div class="flex justify-between">
<span class="text-gray-600">المجموع الفرعي</span>
<span class="font-medium">{{ core()->formatPrice($cart->sub_total) }}</span>
</div>
<div class="flex justify-between">
<span class="text-gray-600">الشحن</span>
<span class="font-medium">{{ core()->formatPrice($cart->selected_shipping_rate->price ?? 0) }}</span>
</div>
</div>
<div class="flex justify-between mb-6">
<span class="text-lg font-bold">الإجمالي</span>
<span class="text-xl font-bold text-primary">{{ core()->formatPrice($cart->grand_total) }}</span>
</div>
<a href="{{ route('shop.checkout.onepage.index') }}" class="block w-full py-3 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl text-center hover:shadow-lg transition-all">إتمام الطلب</a>
</div>
</div>
</div>
</main>

@include('components.footer')
@include('components.navbar')

<script>
function updateQty(id, change) {
    fetch(`/checkout/cart/update/${id}`, {
        method: 'PUT',
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        body: JSON.stringify({quantity: change})
    }).then(() => location.reload());
}

function removeItem(id) {
    if(confirm('هل تريد إزالة هذا المنتج؟')) {
        fetch(`/checkout/cart/remove/${id}`, {
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        }).then(() => location.reload());
    }
}
</script>
</body>
</html>
