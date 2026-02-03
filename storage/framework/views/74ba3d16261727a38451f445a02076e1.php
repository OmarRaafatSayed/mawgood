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

<div class="w-full overflow-hidden">
    <?php if(isset($options['images'][0])): ?>
        <?php $image = $options['images'][0]; ?>
        
        <a href="<?php echo e($image['link'] ?? '#'); ?>" class="block">
            <img 
                src="<?php echo e($image['image']); ?>" 
                alt="<?php echo e($image['title'] ?? 'Banner Image'); ?>"
                class="w-full h-auto object-cover"
                loading="eager"
                fetchpriority="high"
            />
        </a>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\carousel\images-carousel\index.blade.php ENDPATH**/ ?>