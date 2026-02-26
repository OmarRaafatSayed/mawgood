<?php $__env->startPush('styles'); ?>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "primary": "#003366",
                "accent-gold": "#FF6D00",
                "background-light": "#f8f9fa",
            },
        },
    },
}
</script>
<style>
.category-overlay {
    background: linear-gradient(to top, rgba(0, 51, 102, 0.9) 0%, rgba(0, 51, 102, 0.4) 40%, rgba(0, 51, 102, 0) 100%);
}
body {
    font-family: 'Manrope', 'Tajawal', sans-serif;
    background-color: #f8f9fa;
}
</style>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => false,'hasFeature' => false,'hasFooter' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
 <?php $__env->slot('title', null, []); ?> التصنيفات - موجود <?php $__env->endSlot(); ?>
<div class="relative mx-auto w-full max-w-md lg:max-w-7xl min-h-screen flex flex-col bg-background-light">
<header class="sticky top-0 z-50 flex items-center justify-between bg-white/90 backdrop-blur-md px-4 h-16 border-b border-primary/5">
<button onclick="history.back()" class="p-2 text-primary hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">arrow_forward</span>
</button>
<h1 class="text-primary text-xl font-bold">التصنيفات</h1>
<a href="<?php echo e(route('shop.search.index')); ?>" class="p-2 text-primary hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">search</span>
</a>
</header>

<main class="flex-1 overflow-y-auto p-6 pb-24">
<div class="grid grid-cols-3 gap-6">
<!-- Category Item 1 -->
<a href="<?php echo e(route('shop.search.index')); ?>" class="flex flex-col items-center gap-2">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-4xl text-accent-gold">apparel</span>
</div>
<span class="text-xs font-bold text-primary text-center">أزياء</span>
</a>
<!-- Category Item 2 -->
<a href="<?php echo e(route('shop.search.index')); ?>" class="flex flex-col items-center gap-2">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-4xl text-accent-gold">devices</span>
</div>
<span class="text-xs font-bold text-primary text-center">إلكترونيات</span>
</a>
<!-- Category Item 3 -->
<a href="<?php echo e(route('shop.search.index')); ?>" class="flex flex-col items-center gap-2">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-4xl text-accent-gold">spa</span>
</div>
<span class="text-xs font-bold text-primary text-center">جمال</span>
</a>
<!-- Category Item 4 -->
<a href="<?php echo e(route('shop.search.index')); ?>" class="flex flex-col items-center gap-2">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-4xl text-accent-gold">sports_soccer</span>
</div>
<span class="text-xs font-bold text-primary text-center">رياضة</span>
</a>
<!-- Category Item 5 -->
<a href="<?php echo e(route('shop.search.index')); ?>" class="flex flex-col items-center gap-2">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-4xl text-accent-gold">menu_book</span>
</div>
<span class="text-xs font-bold text-primary text-center">كتب</span>
</a>
</div>
</main>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/categories/index.blade.php ENDPATH**/ ?>