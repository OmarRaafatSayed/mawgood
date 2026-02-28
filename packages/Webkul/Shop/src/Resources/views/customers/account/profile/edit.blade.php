<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>تعديل الملف الشخصي - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-3xl mx-auto px-4 py-8 pb-24">
<div class="mb-6">
<a href="{{ route('shop.customers.account.profile.index') }}" class="flex items-center gap-2 text-gray-600 hover:text-primary">
<span class="material-symbols-outlined">arrow_forward</span>
<span>العودة</span>
</a>
</div>

<div class="bg-white rounded-2xl shadow-sm p-6 lg:p-8">
<h1 class="text-2xl font-bold text-gray-800 mb-6">تعديل الملف الشخصي</h1>

<x-shop::form :action="route('shop.customers.account.profile.update')" enctype="multipart/form-data">
<div class="space-y-4">
<div class="grid md:grid-cols-2 gap-4">
<x-shop::form.control-group>
<x-shop::form.control-group.label class="required text-sm font-medium">الاسم الأول</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="text" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="first_name" rules="required" :value="old('first_name') ?: auth()->guard('customer')->user()->first_name"/>
<x-shop::form.control-group.error control-name="first_name" />
</x-shop::form.control-group>

<x-shop::form.control-group>
<x-shop::form.control-group.label class="required text-sm font-medium">الاسم الأخير</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="text" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="last_name" rules="required" :value="old('last_name') ?: auth()->guard('customer')->user()->last_name"/>
<x-shop::form.control-group.error control-name="last_name" />
</x-shop::form.control-group>
</div>

<x-shop::form.control-group>
<x-shop::form.control-group.label class="required text-sm font-medium">البريد الإلكتروني</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="email" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="email" rules="required|email" :value="old('email') ?: auth()->guard('customer')->user()->email"/>
<x-shop::form.control-group.error control-name="email" />
</x-shop::form.control-group>

<x-shop::form.control-group>
<x-shop::form.control-group.label class="text-sm font-medium">رقم الهاتف</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="text" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="phone" :value="old('phone') ?: auth()->guard('customer')->user()->phone"/>
<x-shop::form.control-group.error control-name="phone" />
</x-shop::form.control-group>

<div class="border-t pt-6 mt-6">
<h3 class="font-bold text-gray-800 mb-4">تغيير كلمة المرور</h3>
<div class="space-y-4">
<x-shop::form.control-group>
<x-shop::form.control-group.label class="text-sm font-medium">كلمة المرور الحالية</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="password" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="old_password" placeholder="اتركه فارغاً إذا لم ترغب بالتغيير"/>
<x-shop::form.control-group.error control-name="old_password" />
</x-shop::form.control-group>

<x-shop::form.control-group>
<x-shop::form.control-group.label class="text-sm font-medium">كلمة المرور الجديدة</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="password" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="password" ref="password" placeholder="اتركه فارغاً إذا لم ترغب بالتغيير"/>
<x-shop::form.control-group.error control-name="password" />
</x-shop::form.control-group>

<x-shop::form.control-group>
<x-shop::form.control-group.label class="text-sm font-medium">تأكيد كلمة المرور</x-shop::form.control-group.label>
<x-shop::form.control-group.control type="password" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" name="password_confirmation" rules="confirmed:@password"/>
<x-shop::form.control-group.error control-name="password_confirmation" />
</x-shop::form.control-group>
</div>
</div>

<div class="flex gap-4 mt-6">
<button type="submit" class="flex-1 py-3 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl hover:shadow-lg transition-all">حفظ التغييرات</button>
<a href="{{ route('shop.customers.account.profile.index') }}" class="px-6 py-3 border-2 border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all">إلغاء</a>
</div>
</div>
</x-shop::form>
</div>
</main>

@include('components.footer')
@include('components.navbar')
</body>
</html>
