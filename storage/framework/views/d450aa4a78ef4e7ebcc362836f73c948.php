<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>إنشاء حساب - ماوجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>
body { font-family: 'Tajawal', sans-serif; }
.input-focus:focus { border-color: #FF6B00; box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1); }
</style>
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-orange-50 min-h-screen">
<?php echo $__env->make('components.desktop-navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="max-w-2xl mx-auto px-4 py-8 pb-24 lg:py-12">
<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
<div class="bg-gradient-to-r from-primary to-orange-600 p-8 text-white text-center">
<div class="size-20 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
<span class="material-symbols-outlined text-5xl">person_add</span>
</div>
<h1 class="text-3xl font-bold mb-2">إنشاء حساب جديد</h1>
<p class="text-orange-100">انضم إلى ماوجود وابدأ التسوق الآن</p>
</div>

<div class="p-8">
<?php if(session('error')): ?>
<div class="mb-6 p-4 bg-red-50 border-r-4 border-red-500 rounded-lg">
<p class="text-red-700 text-sm font-medium"><?php echo e(session('error')); ?></p>
</div>
<?php endif; ?>

<?php if(session('success')): ?>
<div class="mb-6 p-4 bg-green-50 border-r-4 border-green-500 rounded-lg">
<p class="text-green-700 text-sm font-medium"><?php echo e(session('success')); ?></p>
</div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('shop.customers.register.store')); ?>" class="space-y-5">
<?php echo csrf_field(); ?>

<div class="grid md:grid-cols-2 gap-5">
<div>
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">badge</span>
الاسم الأول
</span>
</label>
<input 
type="text" 
name="first_name" 
value="<?php echo e(old('first_name')); ?>" 
required 
autofocus
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none" 
placeholder="أدخل اسمك الأول"
/>
<?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-2 flex items-center gap-1"><span class="material-symbols-outlined text-base">error</span><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div>
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">badge</span>
الاسم الأخير
</span>
</label>
<input 
type="text" 
name="last_name" 
value="<?php echo e(old('last_name')); ?>" 
required 
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none" 
placeholder="أدخل اسمك الأخير"
/>
<?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-2 flex items-center gap-1"><span class="material-symbols-outlined text-base">error</span><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
</div>

<div>
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">mail</span>
البريد الإلكتروني
</span>
</label>
<input 
type="email" 
name="email" 
value="<?php echo e(old('email')); ?>" 
required 
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none" 
placeholder="example@email.com"
/>
<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-2 flex items-center gap-1"><span class="material-symbols-outlined text-base">error</span><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div>
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">account_circle</span>
نوع الحساب
</span>
</label>
<select 
name="user_type" 
id="userType" 
required 
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none cursor-pointer"
>
<option value="customer">عميل عادي - للتسوق والشراء</option>
<option value="company">شركة - للتوظيف ونشر الوظائف</option>
<option value="vendor">بائع متجر - لبيع المنتجات</option>
</select>
</div>

<div id="companyFields" class="hidden">
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">business</span>
اسم الشركة / المتجر
</span>
</label>
<input 
type="text" 
name="company_name" 
value="<?php echo e(old('company_name')); ?>" 
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none" 
placeholder="أدخل اسم الشركة أو المتجر"
/>
</div>

<div class="grid md:grid-cols-2 gap-5">
<div>
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">lock</span>
كلمة المرور
</span>
</label>
<input 
type="password" 
name="password" 
required 
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none" 
placeholder="••••••••"
/>
<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-2 flex items-center gap-1"><span class="material-symbols-outlined text-base">error</span><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div>
<label class="block text-sm font-bold text-gray-700 mb-2">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">lock_reset</span>
تأكيد كلمة المرور
</span>
</label>
<input 
type="password" 
name="password_confirmation" 
required
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none" 
placeholder="••••••••"
/>
</div>
</div>

<button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all text-lg mt-6">
إنشاء حساب
</button>
</form>

<div class="mt-8">
<div class="relative flex items-center justify-center mb-6">
<hr class="w-full border-gray-300">
<span class="absolute bg-white px-4 text-sm font-medium text-gray-500">أو سجل بواسطة</span>
</div>
<a href="<?php echo e(route('customer.social-login.index', 'google')); ?>" class="flex items-center justify-center gap-3 rounded-xl border-2 border-gray-200 px-4 py-3.5 hover:bg-gray-50 hover:border-primary/30 transition-all group">
<svg class="h-6 w-6" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
<span class="font-bold text-gray-700 group-hover:text-gray-900">التسجيل بحساب Google</span>
</a>
</div>

<div class="mt-8 pt-6 border-t border-gray-200 text-center">
<p class="text-gray-600">لديك حساب بالفعل؟</p>
<a href="<?php echo e(route('shop.customer.session.index')); ?>" class="inline-block mt-2 px-6 py-2.5 bg-gray-100 text-primary font-bold rounded-lg hover:bg-gray-200 transition-all">تسجيل الدخول</a>
</div>
</div>
</div>
</main>

<?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script>
document.getElementById('userType').addEventListener('change', function() {
    const companyFields = document.getElementById('companyFields');
    if (this.value === 'company' || this.value === 'vendor') {
        companyFields.classList.remove('hidden');
        companyFields.querySelector('input').required = true;
    } else {
        companyFields.classList.add('hidden');
        companyFields.querySelector('input').required = false;
    }
});
</script>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/customers/sign-up.blade.php ENDPATH**/ ?>