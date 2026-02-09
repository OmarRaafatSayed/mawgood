<?php
    $locale = core()->getCurrentLocale();
?>

<div class="flex flex-wrap gap-4 px-4 pt-6 pb-4 shadow-sm lg:hidden">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center" style="gap: 8px;">
            <?php if(core()->getConfigData('sales.checkout.shopping_cart.cart_page')): ?>
                <?php echo $__env->make('shop::checkout.cart.mini-cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
            <a href="<?php echo e(route('shop.search.index')); ?>" class="px-3 py-1.5 rounded-md bg-navyBlue text-white text-xs font-medium shadow-sm hover:shadow-md transition">السوق</a>
            <a href="<?php echo e(route('jobs.index')); ?>" class="px-3 py-1.5 rounded-md bg-navyBlue text-white text-xs font-bold shadow-sm hover:shadow-md transition">الوظائف</a>
        </div>

        <a href="<?php echo e(route('shop.home.index')); ?>" class="max-h-[30px]" style="margin-left: 15px;" aria-label="Mawgood">
            <img src="<?php echo e(bagisto_asset('images/logo.svg')); ?>" alt="<?php echo e(config('app.name')); ?>" width="131" height="29">
        </a>
    </div>

    <form action="<?php echo e(route('shop.search.index')); ?>" class="flex items-center w-full">
        <label for="organic-search" class="sr-only"><?php echo app('translator')->get('shop::app.components.layouts.header.mobile.search'); ?></label>
        <div class="relative w-full">
            <div class="icon-search pointer-events-none absolute top-3 flex items-center text-2xl max-md:text-xl max-sm:top-2.5 ltr:left-3 rtl:right-3"></div>
            <input type="text" class="block w-full rounded-xl border border-['#E3E3E3'] px-11 py-3.5 text-sm font-medium text-gray-900 max-md:rounded-lg max-md:px-10 max-md:py-3 max-md:font-normal max-sm:text-xs" name="query" value="<?php echo e(request('query')); ?>" placeholder="<?php echo app('translator')->get('shop::app.components.layouts.header.mobile.search-text'); ?>" required>
            <?php if(core()->getConfigData('catalog.products.settings.image_search')): ?>
                <?php echo $__env->make('shop::search.images.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </form>
</div>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/components/layouts/header/mobile/index.blade.php ENDPATH**/ ?>