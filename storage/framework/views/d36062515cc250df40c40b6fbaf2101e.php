<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>تسجيل الدخول - ماوجود</title>
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

<main class="max-w-md mx-auto px-4 py-8 pb-24 lg:py-12">
<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
<div class="bg-gradient-to-r from-primary to-orange-600 p-8 text-white text-center">
<div class="size-20 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
<span class="material-symbols-outlined text-5xl">person</span>
</div>
<h1 class="text-3xl font-bold mb-2">مرحباً بعودتك</h1>
<p class="text-orange-100">سجل دخولك للمتابعة</p>
</div>

<div class="p-8">
<?php if(session('error')): ?>
<div class="mb-6 p-4 bg-red-50 border-r-4 border-red-500 rounded-lg">
<p class="text-red-700 text-sm font-medium"><?php echo e(session('error')); ?></p>
</div>
<?php endif; ?>

<?php if(session('warning')): ?>
<div class="mb-6 p-4 bg-yellow-50 border-r-4 border-yellow-500 rounded-lg">
<p class="text-yellow-700 text-sm font-medium"><?php echo e(session('warning')); ?></p>
</div>
<?php endif; ?>

<?php if(session('info')): ?>
<div class="mb-6 p-4 bg-blue-50 border-r-4 border-blue-500 rounded-lg">
<p class="text-blue-700 text-sm font-medium"><?php echo e(session('info')); ?></p>
</div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('shop.customer.session.create')); ?>" class="space-y-5">
<?php echo csrf_field(); ?>

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
autofocus
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none text-lg" 
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
<span class="material-symbols-outlined text-primary text-xl">lock</span>
كلمة المرور
</span>
</label>
<input 
type="password" 
name="password" 
required 
class="input-focus w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl transition-all outline-none text-lg" 
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

<div class="flex items-center justify-between pt-2">
<label class="flex items-center gap-2 cursor-pointer group">
<input type="checkbox" name="remember" class="w-5 h-5 rounded border-2 border-gray-300 text-primary focus:ring-2 focus:ring-primary/20"/>
<span class="text-sm font-medium text-gray-600 group-hover:text-gray-900">تذكرني</span>
</label>
<a href="<?php echo e(route('shop.customers.forgot_password.create')); ?>" class="text-sm font-bold text-primary hover:text-orange-700 transition-colors">نسيت كلمة المرور؟</a>
</div>

<button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all text-lg">
تسجيل الدخول
</button>
</form>

<div class="mt-8">
<div class="relative flex items-center justify-center mb-6">
<hr class="w-full border-gray-300">
<span class="absolute bg-white px-4 text-sm font-medium text-gray-500">أو سجل دخول بواسطة</span>
</div>
<a href="<?php echo e(route('customer.social-login.index', 'google')); ?>" class="flex items-center justify-center gap-3 rounded-xl border-2 border-gray-200 px-4 py-3.5 hover:bg-gray-50 hover:border-primary/30 transition-all group">
<svg class="h-6 w-6" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
<span class="font-bold text-gray-700 group-hover:text-gray-900">تسجيل الدخول بحساب Google</span>
</a>
</div>

<div class="mt-8 pt-6 border-t border-gray-200 text-center">
<p class="text-gray-600">ليس لديك حساب؟</p>
<a href="<?php echo e(route('shop.customers.register.index')); ?>" class="inline-block mt-2 px-6 py-2.5 bg-gray-100 text-primary font-bold rounded-lg hover:bg-gray-200 transition-all">إنشاء حساب جديد</a>
</div>
</div>
</div>
</main>

<?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/customers/sign-in.blade.php ENDPATH**/ ?>