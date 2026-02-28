<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>عناويني - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
<?php echo $__env->make('components.desktop-navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="max-w-7xl mx-auto px-4 py-8 pb-24">
<div class="mb-6 flex items-center justify-between">
<h1 class="text-3xl font-bold text-gray-800">عناويني</h1>
<a href="<?php echo e(route('shop.customers.account.addresses.create')); ?>" class="px-6 py-3 bg-gradient-to-r from-primary to-orange-600 text-white font-bold rounded-xl hover:shadow-lg transition-all">إضافة عنوان جديد</a>
</div>

<?php if($addresses->count()): ?>
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
<?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
<div class="flex items-start justify-between mb-4">
<div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-2xl text-primary">location_on</span>
</div>
<?php if($address->default_address): ?>
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">افتراضي</span>
<?php endif; ?>
</div>
<h3 class="font-bold text-gray-800 mb-2"><?php echo e($address->first_name); ?> <?php echo e($address->last_name); ?></h3>
<p class="text-sm text-gray-600 mb-1"><?php echo e($address->address); ?></p>
<p class="text-sm text-gray-600 mb-1"><?php echo e($address->city); ?>, <?php echo e($address->state); ?> <?php echo e($address->postcode); ?></p>
<p class="text-sm text-gray-600 mb-4"><?php echo e($address->phone); ?></p>
<div class="flex gap-2">
<a href="<?php echo e(route('shop.customers.account.addresses.edit', $address->id)); ?>" class="flex-1 py-2 text-center border-2 border-primary text-primary font-medium rounded-lg hover:bg-primary/5 transition-all">تعديل</a>
<form action="<?php echo e(route('shop.customers.account.addresses.delete', $address->id)); ?>" method="POST" class="flex-1">
<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
<button type="submit" class="w-full py-2 border-2 border-red-500 text-red-500 font-medium rounded-lg hover:bg-red-50 transition-all">حذف</button>
</form>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="bg-white rounded-2xl shadow-sm p-12 text-center">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">location_off</span>
<p class="text-gray-600 mb-4">لا توجد عناوين محفوظة</p>
<a href="<?php echo e(route('shop.customers.account.addresses.create')); ?>" class="inline-block px-6 py-3 bg-primary text-white font-bold rounded-xl hover:shadow-lg transition-all">إضافة عنوان</a>
</div>
<?php endif; ?>
</main>

<?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/customers/account/addresses/index.blade.php ENDPATH**/ ?>