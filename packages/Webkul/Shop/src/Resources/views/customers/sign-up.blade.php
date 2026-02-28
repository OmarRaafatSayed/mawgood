<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>إنشاء حساب - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-md mx-auto px-4 py-8 pb-24 lg:max-w-xl lg:py-12">
<div class="bg-white rounded-2xl shadow-lg p-6 lg:p-10">
<div class="text-center mb-8">
<h1 class="text-3xl font-bold text-primary mb-2">إنشاء حساب جديد</h1>
<p class="text-gray-600">انضم إلى موجود وابدأ التسوق الآن</p>
</div>

<form method="POST" action="{{ route('shop.customers.register.store') }}">
@csrf
<div class="space-y-4">
<div>
<label class="block text-sm font-medium text-gray-700 mb-2">الاسم الأول <span class="text-red-500">*</span></label>
<input type="text" name="first_name" value="{{ old('first_name') }}" required class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" placeholder="أدخل اسمك الأول"/>
@error('first_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div>
<label class="block text-sm font-medium text-gray-700 mb-2">الاسم الأخير <span class="text-red-500">*</span></label>
<input type="text" name="last_name" value="{{ old('last_name') }}" required class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" placeholder="أدخل اسمك الأخير"/>
@error('last_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div>
<label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني <span class="text-red-500">*</span></label>
<input type="email" name="email" value="{{ old('email') }}" required class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" placeholder="email@example.com"/>
@error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div>
<label class="block text-sm font-medium text-gray-700 mb-2">نوع الحساب <span class="text-red-500">*</span></label>
<select name="user_type" id="userType" required class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full">
<option value="customer">عميل عادي</option>
<option value="company">شركة</option>
<option value="vendor">بائع متجر</option>
</select>
</div>

<div id="companyFields" style="display: none;">
<label class="block text-sm font-medium text-gray-700 mb-2">اسم الشركة</label>
<input type="text" name="company_name" value="{{ old('company_name') }}" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" placeholder="اسم الشركة"/>
</div>

<div>
<label class="block text-sm font-medium text-gray-700 mb-2">كلمة المرور <span class="text-red-500">*</span></label>
<input type="password" name="password" required class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" placeholder="••••••••"/>
@error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div>
<label class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة المرور</label>
<input type="password" name="password_confirmation" class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none w-full" placeholder="••••••••"/>
</div>

<button type="submit" class="w-full py-3 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl hover:shadow-lg transition-all">إنشاء حساب</button>
</div>
</form>

<p class="mt-6 text-center text-sm text-gray-600">لديك حساب بالفعل؟ <a href="{{ route('shop.customer.session.index') }}" class="text-primary font-medium hover:underline">تسجيل الدخول</a></p>
</div>
</main>

@include('components.footer')
@include('components.navbar')

<script>
document.getElementById('userType').addEventListener('change', function() {
    document.getElementById('companyFields').style.display = (this.value === 'company' || this.value === 'vendor') ? 'block' : 'none';
});
</script>
</body>
</html>
