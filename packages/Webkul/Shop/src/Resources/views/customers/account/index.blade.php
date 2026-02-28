<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>حسابي - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-7xl mx-auto px-4 py-8 pb-24 lg:py-12">
<div class="mb-8">
<h1 class="text-3xl font-bold text-gray-800">مرحباً، {{ auth()->guard('customer')->user()->first_name }}</h1>
<p class="text-gray-600 mt-1">إدارة حسابك وطلباتك</p>
</div>

<div class="grid lg:grid-cols-4 gap-6">
<!-- Sidebar -->
<div class="lg:col-span-1">
<div class="bg-white rounded-2xl shadow-sm p-4 space-y-2">
<a href="{{ route('shop.customers.account.profile.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-primary/5 transition-colors {{ request()->routeIs('shop.customers.account.profile.*') ? 'bg-primary/10 text-primary' : 'text-gray-700' }}">
<span class="material-symbols-outlined">person</span>
<span class="font-medium">الملف الشخصي</span>
</a>
<a href="{{ route('shop.customers.account.orders.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-primary/5 transition-colors text-gray-700">
<span class="material-symbols-outlined">shopping_bag</span>
<span class="font-medium">طلباتي</span>
</a>
<a href="{{ route('shop.customers.account.addresses.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-primary/5 transition-colors text-gray-700">
<span class="material-symbols-outlined">location_on</span>
<span class="font-medium">العناوين</span>
</a>
<a href="{{ route('shop.customers.account.wishlist.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-primary/5 transition-colors text-gray-700">
<span class="material-symbols-outlined">favorite</span>
<span class="font-medium">المفضلة</span>
</a>
<a href="{{ route('shop.customer.session.destroy') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-red-50 text-red-600 transition-colors">
<span class="material-symbols-outlined">logout</span>
<span class="font-medium">تسجيل الخروج</span>
</a>
</div>
</div>

<!-- Main Content -->
<div class="lg:col-span-3 space-y-6">
<!-- Account Info -->
<div class="bg-white rounded-2xl shadow-sm p-6">
<div class="flex items-center justify-between mb-6">
<h2 class="text-xl font-bold text-gray-800">معلومات الحساب</h2>
<a href="{{ route('shop.customers.account.profile.edit') }}" class="text-primary hover:underline font-medium">تعديل</a>
</div>
<div class="grid md:grid-cols-2 gap-4">
<div class="p-4 bg-gray-50 rounded-xl">
<p class="text-sm text-gray-600 mb-1">الاسم الكامل</p>
<p class="font-medium text-gray-800">{{ auth()->guard('customer')->user()->first_name }} {{ auth()->guard('customer')->user()->last_name }}</p>
</div>
<div class="p-4 bg-gray-50 rounded-xl">
<p class="text-sm text-gray-600 mb-1">البريد الإلكتروني</p>
<p class="font-medium text-gray-800">{{ auth()->guard('customer')->user()->email }}</p>
</div>
</div>
</div>

<!-- Quick Actions -->
<div class="grid md:grid-cols-3 gap-4">
<a href="{{ route('shop.customers.account.orders.index') }}" class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
<div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-2xl text-primary">shopping_bag</span>
</div>
<h3 class="font-bold text-gray-800 mb-1">طلباتي</h3>
<p class="text-sm text-gray-600">تتبع وإدارة طلباتك</p>
</a>

<a href="{{ route('shop.customers.account.addresses.index') }}" class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
<div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-2xl text-primary">location_on</span>
</div>
<h3 class="font-bold text-gray-800 mb-1">العناوين</h3>
<p class="text-sm text-gray-600">إدارة عناوين الشحن</p>
</a>

<a href="{{ route('shop.customers.account.wishlist.index') }}" class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
<div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-2xl text-primary">favorite</span>
</div>
<h3 class="font-bold text-gray-800 mb-1">المفضلة</h3>
<p class="text-sm text-gray-600">المنتجات المحفوظة</p>
</a>
</div>
</div>
</div>
</main>

@include('components.footer')
@include('components.navbar')
</body>
</html>
