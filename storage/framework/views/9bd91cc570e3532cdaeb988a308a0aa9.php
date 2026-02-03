<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['options']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['options']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $uid = uniqid('c');
?>

<?php if (! $__env->hasRenderedOnce('c17a0ff4-1830-4f43-971f-fabecba1a2f9')): $__env->markAsRenderedOnce('c17a0ff4-1830-4f43-971f-fabecba1a2f9'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('themes/mawgood/assets/js/carousel.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<section class="w-full bg-gradient-to-b from-[#F9F9F9] to-white py-6 max-md:py-4">
    <div class="px-[60px] max-1180:px-8 max-md:px-4">
        <div class="relative overflow-hidden group rounded-[15px] shadow-lg">
            <div class="flex transition-transform duration-500 ease-in-out" id="<?php echo e($uid); ?>track">
                <img src="<?php echo e(asset('themes/mawgood/assets/images/carousel/1.png')); ?>" alt="Banner 1" class="w-full h-auto object-cover aspect-[2.743/1] max-md:aspect-[1.5/1] flex-shrink-0" />
                <img src="<?php echo e(asset('themes/mawgood/assets/images/carousel/2.png')); ?>" alt="Banner 2" class="w-full h-auto object-cover aspect-[2.743/1] max-md:aspect-[1.5/1] flex-shrink-0" />
                <img src="<?php echo e(asset('themes/mawgood/assets/images/carousel/3.png')); ?>" alt="Banner 3" class="w-full h-auto object-cover aspect-[2.743/1] max-md:aspect-[1.5/1] flex-shrink-0" />
            </div>
            
            <button id="<?php echo e($uid); ?>prev" class="absolute left-4 max-md:left-2 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-[#1E3A5F] rounded-full p-3 max-md:p-2 shadow-lg opacity-0 group-hover:opacity-100 max-md:opacity-100 transition-opacity duration-300 z-10">
                <svg class="w-6 h-6 max-md:w-4 max-md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            
            <button id="<?php echo e($uid); ?>next" class="absolute right-4 max-md:right-2 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-[#1E3A5F] rounded-full p-3 max-md:p-2 shadow-lg opacity-0 group-hover:opacity-100 max-md:opacity-100 transition-opacity duration-300 z-10">
                <svg class="w-6 h-6 max-md:w-4 max-md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <div class="absolute bottom-6 max-md:bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="<?php echo e($uid); ?>dots">
                <span class="h-3 rounded-full bg-[#1E3A5F] cursor-pointer transition-all duration-300 shadow-md" style="width: 32px;"></span>
                <span class="w-3 h-3 rounded-full bg-white/60 hover:bg-white/80 cursor-pointer transition-all duration-300 shadow-md"></span>
                <span class="w-3 h-3 rounded-full bg-white/60 hover:bg-white/80 cursor-pointer transition-all duration-300 shadow-md"></span>
            </div>
        </div>
    </div>
</section>

<script>
if (typeof initCarousel === 'function') {
    setTimeout(function() { initCarousel('<?php echo e($uid); ?>'); }, 500);
}
</script>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\carousel\index.blade.php ENDPATH**/ ?>