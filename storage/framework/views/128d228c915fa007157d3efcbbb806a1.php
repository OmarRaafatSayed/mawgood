<?php if (isset($component)) { $__componentOriginal4c4dbe009fe892108b054e8b47e63427 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c4dbe009fe892108b054e8b47e63427 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.customers.account.profile.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Breadcrumbs -->
    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <?php $__env->startSection('breadcrumbs'); ?>
            <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'profile']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $attributes = $__attributesOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__attributesOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $component = $__componentOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__componentOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
        <?php $__env->stopSection(); ?>
    <?php endif; ?>

    <div class="mx-4">
        <?php if (isset($component)) { $__componentOriginalf60f1298dff473a76a071049d503ffbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf60f1298dff473a76a071049d503ffbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $attributes = $__attributesOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__attributesOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $component = $__componentOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__componentOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
    </div>

    <span class="mb-5 mt-2 w-full border-t border-zinc-300"></span>

    <div class="mx-4 mb-8">
        <div class="grid gap-4">
            <!-- Account Information -->
            <div class="rounded-lg border border-zinc-200 p-6">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-xl font-semibold"><?php echo app('translator')->get('shop::app.customers.account.profile.index.title'); ?></h2>
                    <a href="<?php echo e(route('shop.customers.account.profile.edit')); ?>" class="text-navyBlue hover:underline">
                        <?php echo app('translator')->get('shop::app.customers.account.profile.index.edit'); ?>
                    </a>
                </div>
                
                <div class="grid gap-3">
                    <div>
                        <span class="text-sm text-gray-600"><?php echo app('translator')->get('shop::app.customers.account.profile.index.first-name'); ?>:</span>
                        <span class="ml-2 font-medium"><?php echo e(auth()->guard('customer')->user()->first_name); ?></span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-600"><?php echo app('translator')->get('shop::app.customers.account.profile.index.last-name'); ?>:</span>
                        <span class="ml-2 font-medium"><?php echo e(auth()->guard('customer')->user()->last_name); ?></span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-600"><?php echo app('translator')->get('shop::app.customers.account.profile.index.email'); ?>:</span>
                        <span class="ml-2 font-medium"><?php echo e(auth()->guard('customer')->user()->email); ?></span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <a href="<?php echo e(route('shop.customers.account.orders.index')); ?>" class="rounded-lg border border-zinc-200 p-6 hover:border-navyBlue hover:shadow-md transition">
                    <h3 class="mb-2 text-lg font-semibold"><?php echo app('translator')->get('shop::app.customers.account.orders.title'); ?></h3>
                    <p class="text-sm text-gray-600"><?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.orders'); ?></p>
                </a>

                <a href="<?php echo e(route('shop.customers.account.addresses.index')); ?>" class="rounded-lg border border-zinc-200 p-6 hover:border-navyBlue hover:shadow-md transition">
                    <h3 class="mb-2 text-lg font-semibold"><?php echo app('translator')->get('shop::app.customers.account.addresses.index.title'); ?></h3>
                    <p class="text-sm text-gray-600"><?php echo app('translator')->get('shop::app.layouts.address'); ?></p>
                </a>

                <a href="<?php echo e(route('shop.customers.account.wishlist.index')); ?>" class="rounded-lg border border-zinc-200 p-6 hover:border-navyBlue hover:shadow-md transition">
                    <h3 class="mb-2 text-lg font-semibold"><?php echo app('translator')->get('shop::app.customers.account.wishlist.page-title'); ?></h3>
                    <p class="text-sm text-gray-600"><?php echo app('translator')->get('shop::app.layouts.wishlist'); ?></p>
                </a>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $attributes = $__attributesOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $component = $__componentOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__componentOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src\Resources\views\customers\account\index.blade.php ENDPATH**/ ?>