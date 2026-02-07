<?php
    $customer = auth()->guard('customer')->user();
    $vendor = \App\Models\Vendor::where('customer_id', auth('customer')->id())->first();
?>

<div class="panel-side journal-scroll grid max-h-[1320px] min-w-[342px] max-w-[380px] grid-cols-[1fr] gap-8 overflow-y-auto overflow-x-hidden max-xl:min-w-[270px] max-md:max-w-full max-md:gap-5">
    <!-- Account Profile Hero Section -->
    <div class="grid grid-cols-[auto_1fr] items-center gap-4 rounded-xl border border-zinc-200 px-5 py-[25px] max-md:py-2.5">
        <div class="">
            <img
                src="<?php echo e($customer->image_url ??  bagisto_asset('images/user-placeholder.png')); ?>"
                class="h-[60px] w-[60px] rounded-full"
                alt="Profile Image"
            >
        </div>

        <div class="flex flex-col justify-between">
            <p 
                class="text-2xl break-all font-mediums max-md:text-xl"
                v-text="'Hello! <?php echo e($customer->first_name); ?>'"
            > 
            </p>

            <p class="no-underline max-md:text-md: text-zinc-500"><?php echo e($customer->email); ?></p>
        </div>
    </div>

    <!-- Account Navigation Menus -->
    <?php $__currentLoopData = menu()->getItems('customer'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <!-- Account Navigation Toggler -->
            <div class="select-none pb-5 max-md:pb-1.5">
                <p class="text-xl font-medium max-md:text-lg">
                    <?php echo e($menuItem->getName()); ?>

                </p>
            </div>

            <!-- Account Navigation Content -->
            <?php if($menuItem->haveChildren()): ?>
                <div class="grid rounded-md border border-b border-l-[1px] border-r border-t-0 border-zinc-200 max-md:border-none">
                    <?php $__currentLoopData = $menuItem->getChildren(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($subMenuItem->getKey() === 'account.jobs'): ?>
                            <?php if(auth('customer')->check() && auth('customer')->user()->user_type === 'company' && !$vendor): ?>
                                <a href="<?php echo e($subMenuItem->getUrl()); ?>">
                                    <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-zinc-100 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 <?php echo e($subMenuItem->isActive() ? 'bg-zinc-100' : ''); ?>">
                                        <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base">
                                            <span class="<?php echo e($subMenuItem->getIcon()); ?> text-2xl"></span>

                                            <?php echo e($subMenuItem->getName()); ?>

                                        </p>

                                        <span class="text-2xl icon-arrow-right rtl:icon-arrow-left"></span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e($subMenuItem->getUrl()); ?>">
                                <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-zinc-100 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 <?php echo e($subMenuItem->isActive() ? 'bg-zinc-100' : ''); ?>">
                                    <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base">
                                        <span class="<?php echo e($subMenuItem->getIcon()); ?> text-2xl"></span>

                                        <?php echo e($subMenuItem->getName()); ?>

                                    </p>

                                    <span class="text-2xl icon-arrow-right rtl:icon-arrow-left"></span>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- Dynamic Vendor Status Button -->
                    <?php
                        $vendor = \App\Models\Vendor::where('customer_id', auth('customer')->id())->first();
                    ?>
                    
                    <?php if(!$vendor): ?>
                        <!-- Become a Seller -->
                        <a href="<?php echo e(route('vendor.onboarding.form')); ?>">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-emerald-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-emerald-50 to-green-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-emerald-700">
                                    <span class="icon-store text-2xl"></span>
                                    <?php echo e(app()->getLocale() === 'ar' ? 'افتتح متجرك الآن' : 'Open Your Store Now'); ?>

                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-emerald-600"></span>
                            </div>
                        </a>
                    <?php elseif($vendor->status === 'pending'): ?>
                        <!-- Under Review -->
                        <a href="<?php echo e(route('vendor.under-review')); ?>">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-blue-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-blue-50 to-indigo-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-blue-700">
                                    <span class="icon-clock text-2xl"></span>
                                    <?php echo e(app()->getLocale() === 'ar' ? 'طلبك تحت المراجعة' : 'Under Review'); ?>

                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-blue-600"></span>
                            </div>
                        </a>
                    <?php elseif($vendor->status === 'approved'): ?>
                        <!-- Vendor Dashboard -->
                        <a href="<?php echo e(route('vendor.dashboard')); ?>">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-purple-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-purple-50 to-indigo-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-purple-700">
                                    <span class="icon-dashboard text-2xl"></span>
                                    <?php echo e(app()->getLocale() === 'ar' ? 'لوحة تحكم التاجر' : 'Vendor Dashboard'); ?>

                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-purple-600"></span>
                            </div>
                        </a>
                    <?php elseif($vendor->status === 'rejected'): ?>
                        <!-- Reapply -->
                        <a href="<?php echo e(route('vendor.onboarding.form')); ?>">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-orange-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-orange-50 to-red-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-orange-700">
                                    <span class="icon-refresh text-2xl"></span>
                                    <?php echo e(app()->getLocale() === 'ar' ? 'إعادة التقديم' : 'Reapply'); ?>

                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-orange-600"></span>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/components/layouts/account/navigation.blade.php ENDPATH**/ ?>