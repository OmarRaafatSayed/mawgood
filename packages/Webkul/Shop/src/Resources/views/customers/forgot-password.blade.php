<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>نسيت كلمة المرور - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-md mx-auto px-4 py-12 pb-24">
<div class="bg-white rounded-2xl shadow-lg p-8">
<div class="text-center mb-8">
<div class="size-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-4xl text-primary">lock_reset</span>
</div>
<h1 class="text-2xl font-bold text-gray-800 mb-2">نسيت كلمة المرور؟</h1>
<p class="text-gray-600 text-sm">أدخل بريدك الإلكتروني وسنرسل لك رابط إعادة التعيين</p>
</div>

<x-shop::form :action="route('shop.customers.forgot_password.store')">
<x-shop::form.control-group>
<x-shop::form.control-group.label class="required text-sm font-medium">البريد الإلكتروني</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="email" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="email" rules="required|email" placeholder="email@example.com"/>
<x-shop::form.control-group.error control-name="email" />
</x-shop::form.control-group>

<button type="submit" class="w-full mt-6 py-3 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl hover:shadow-lg transition-all">إرسال رابط إعادة التعيين</button>
</x-shop::form>

<p class="mt-6 text-center text-sm text-gray-600">تذكرت كلمة المرور؟ <a href="{{ route('shop.customer.session.index') }}" class="text-primary font-medium hover:underline">تسجيل الدخول</a></p>
</div>
</main>

@include('components.footer')
@include('components.navbar')
</body>
</html>
