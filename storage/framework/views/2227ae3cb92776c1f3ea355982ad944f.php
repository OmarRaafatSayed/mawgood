<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title><?php echo e($flat->name ?? 'منتج'); ?> - ماوجود</title>
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
<?php if($product->images->count()): ?>
<img src="<?php echo e(asset('storage/' . $product->images->first()->path)); ?>" class="w-full h-full object-cover" alt="<?php echo e($flat->name); ?>"/>
<?php else: ?>
<img src="/images/placeholder.png" class="w-full h-full object-cover" alt="صورة المنتج"/>
<?php endif; ?>
</div>

<div class="p-4 space-y-4">
<!-- Title & Rating -->
<div>
<h2 class="text-2xl font-bold text-gray-800 mb-2"><?php echo e($flat->name ?? 'منتج'); ?></h2>
<div class="flex items-center gap-2">
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-yellow-500 fill-current text-[20px]">star</span>
<span class="text-sm font-bold text-gray-600">4.8</span>
</div>
</div>
</div>

<!-- Price -->
<div class="flex items-baseline gap-2">
<span class="text-3xl font-bold text-primary"><?php echo e(number_format($flat->price ?? 0, 0)); ?></span>
<span class="text-lg text-gray-600">جنيه</span>
</div>

<!-- Colors -->
<?php if(count($colorOptions) > 0): ?>
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-3">الألوان المتاحة</h3>
<div class="flex flex-wrap gap-2">
<?php $__currentLoopData = $colorOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<button onclick="selectColor(this)" class="px-4 py-2 border-2 border-gray-200 rounded-lg text-sm font-medium hover:border-primary transition-colors">
<?php echo e($color->admin_name); ?>

</button>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php endif; ?>

<!-- Sizes -->
<?php if(count($sizeOptions) > 0): ?>
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-3">المقاسات المتاحة</h3>
<div class="flex flex-wrap gap-2">
<?php $__currentLoopData = $sizeOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<button onclick="selectSize(this)" class="px-4 py-2 border-2 border-gray-200 rounded-lg text-sm font-medium hover:border-primary transition-colors">
<?php echo e($size->admin_name); ?>

</button>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php endif; ?>

<!-- Description -->
<?php if($flat->short_description): ?>
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-2">الوصف</h3>
<p class="text-gray-600 leading-relaxed"><?php echo $flat->short_description; ?></p>
</div>
<?php endif; ?>

<!-- Stock -->
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-2">التوفر</h3>
<div class="flex items-center gap-2">
<?php if($product->inventories->sum('qty') > 0): ?>
<span class="material-symbols-outlined text-green-500">check_circle</span>
<span class="text-green-600 font-medium">متوفر (<?php echo e($product->inventories->sum('qty')); ?> قطعة)</span>
<?php else: ?>
<span class="material-symbols-outlined text-red-500">cancel</span>
<span class="text-red-600 font-medium">غير متوفر</span>
<?php endif; ?>
</div>
</div>

<!-- Related Products -->
<?php if(count($relatedProducts) > 0): ?>
<div class="border-t pt-4">
<h3 class="text-lg font-bold text-gray-800 mb-3">منتجات ذات صلة</h3>
<div class="overflow-x-auto hide-scrollbar -mx-4 px-4">
<div class="flex gap-3 pb-2">
<?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="/product/<?php echo e($related->product_id); ?>" class="flex-shrink-0 w-36 bg-white rounded-xl border overflow-hidden">
<div class="aspect-square bg-gray-100">
<?php
$relatedImage = \DB::table('product_images')->where('product_id', $related->product_id)->first();
?>
<?php if($relatedImage): ?>
<img src="<?php echo e(asset('storage/' . $relatedImage->path)); ?>" class="w-full h-full object-cover" alt="<?php echo e($related->name); ?>"/>
<?php else: ?>
<img src="/images/placeholder.png" class="w-full h-full object-cover" alt="<?php echo e($related->name); ?>"/>
<?php endif; ?>
</div>
<div class="p-2">
<h4 class="text-xs font-medium text-gray-800 line-clamp-2 mb-1"><?php echo e($related->name); ?></h4>
<span class="text-primary font-bold text-sm"><?php echo e(number_format($related->price, 0)); ?> <span class="text-[10px]">جنيه</span></span>
</div>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</div>
<?php endif; ?>
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
<nav class="fixed bottom-0 left-0 right-0 w-full max-w-[393px] mx-auto bg-white border-t flex items-center justify-around py-3 z-50">
<a class="flex flex-col items-center gap-1 text-gray-400" href="/">
<span class="material-symbols-outlined">home</span>
<span class="text-[10px] font-bold">الرئيسية</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="/categories">
<span class="material-symbols-outlined">grid_view</span>
<span class="text-[10px] font-bold">الأقسام</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="/checkout/cart">
<span class="material-symbols-outlined">shopping_cart</span>
<span class="text-[10px] font-bold">السلة</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="#">
<span class="material-symbols-outlined">favorite</span>
<span class="text-[10px] font-bold">المفضلة</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-bold">حسابي</span>
</a>
</nav>

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
    fetch('/checkout/cart/add/<?php echo e($product->id); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({
            product_id: <?php echo e($product->id); ?>,
            quantity: 1,
            color: selectedColor,
            size: selectedSize
        })
    }).then(() => {
        window.location.href = '/checkout/onepage';
    }).catch(() => {
        alert('حدث خطأ');
    });
}
</script>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/product/detail.blade.php ENDPATH**/ ?>