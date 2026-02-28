<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>طلباتي - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-7xl mx-auto px-4 py-8 pb-24">
<h1 class="text-3xl font-bold text-gray-800 mb-6">طلباتي</h1>

@if($orders->count())
<div class="space-y-4">
@foreach($orders as $order)
<div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-4 pb-4 border-b">
<div>
<p class="text-sm text-gray-600">رقم الطلب</p>
<p class="font-bold text-gray-800">#{{ $order->increment_id }}</p>
</div>
<div>
<p class="text-sm text-gray-600">التاريخ</p>
<p class="font-medium text-gray-800">{{ $order->created_at->format('Y-m-d') }}</p>
</div>
<div>
<p class="text-sm text-gray-600">الإجمالي</p>
<p class="font-bold text-primary">{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</p>
</div>
<div>
<span class="px-4 py-2 bg-primary/10 text-primary text-sm font-bold rounded-full">{{ $order->status_label }}</span>
</div>
</div>
<div class="flex gap-3">
<a href="{{ route('shop.customers.account.orders.view', $order->id) }}" class="px-6 py-2 border-2 border-primary text-primary font-medium rounded-lg hover:bg-primary/5 transition-all">عرض التفاصيل</a>
@if($order->canReorder())
<form action="{{ route('shop.customers.account.orders.reorder', $order->id) }}" method="POST">
@csrf
<button type="submit" class="px-6 py-2 bg-primary text-white font-medium rounded-lg hover:shadow-lg transition-all">إعادة الطلب</button>
</form>
@endif
</div>
</div>
@endforeach
</div>
<div class="mt-6">{{ $orders->links() }}</div>
@else
<div class="bg-white rounded-2xl shadow-sm p-12 text-center">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">shopping_bag</span>
<p class="text-gray-600 mb-4">لا توجد طلبات</p>
<a href="/categories" class="inline-block px-6 py-3 bg-primary text-white font-bold rounded-xl hover:shadow-lg transition-all">تصفح المنتجات</a>
</div>
@endif
</main>

@include('components.footer')
@include('components.navbar')
</body>
</html>
