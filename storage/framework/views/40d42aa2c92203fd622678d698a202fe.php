<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        عرض التاجر
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 mb-5 max-sm:flex-wrap">
        <div class="grid gap-1.5">
            <p class="text-xl font-bold !leading-normal text-gray-800 dark:text-white">
                تفاصيل التاجر: <?php echo e($vendor->name); ?>

            </p>
            <p class="!leading-normal text-gray-600 dark:text-gray-300">
                عرض تفاصيل التاجر ومعلوماته
            </p>
        </div>
        
        <div class="flex gap-x-2.5 items-center">
            <a href="<?php echo e(route('admin.vendors.edit', $vendor->id)); ?>" class="primary-button">
                تعديل التاجر
            </a>
        </div>
    </div>

    <div class="bg-white rounded box-shadow dark:bg-gray-900 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">اسم التاجر:</label>
                    <p class="text-gray-900 dark:text-white font-semibold"><?php echo e($vendor->name); ?></p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">اسم المتجر:</label>
                    <p class="text-gray-900 dark:text-white font-semibold"><?php echo e($vendor->shop_name); ?></p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">البريد الإلكتروني:</label>
                    <p class="text-gray-900 dark:text-white"><?php echo e($vendor->email); ?></p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">رقم الهاتف:</label>
                    <p class="text-gray-900 dark:text-white"><?php echo e($vendor->phone ?: 'غير محدد'); ?></p>
                </div>
                
                <?php if($vendor->shop_description): ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">وصف المتجر:</label>
                    <p class="text-gray-900 dark:text-white"><?php echo e($vendor->shop_description); ?></p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">الحالة:</label>
                    <?php
                        $statusLabels = [
                            'pending' => 'في الانتظار',
                            'approved' => 'موافق عليه',
                            'rejected' => 'مرفوض',
                            'suspended' => 'معلق'
                        ];
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'approved' => 'bg-green-100 text-green-800',
                            'rejected' => 'bg-red-100 text-red-800',
                            'suspended' => 'bg-gray-100 text-gray-800'
                        ];
                    ?>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo e($statusColors[$vendor->status] ?? 'bg-gray-100 text-gray-800'); ?>">
                        <?php echo e($statusLabels[$vendor->status] ?? $vendor->status); ?>

                    </span>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">نسبة العمولة:</label>
                    <p class="text-gray-900 dark:text-white"><?php echo e($vendor->commission_rate); ?>%</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">تاريخ التسجيل:</label>
                    <p class="text-gray-900 dark:text-white"><?php echo e($vendor->created_at->format('Y-m-d H:i')); ?></p>
                </div>
                
                <?php if($vendor->wallet_balance): ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">رصيد المحفظة:</label>
                    <p class="text-2xl font-bold text-green-600"><?php echo e(number_format($vendor->wallet_balance, 2)); ?> جنيه</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if(isset($vendor->available_balance) || isset($vendor->unavailable_balance)): ?>
        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">معلومات المحفظة التفصيلية</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                    <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-1">الرصيد المتاح:</label>
                    <p class="text-2xl font-bold text-green-900 dark:text-green-100"><?php echo e(number_format($vendor->available_balance ?? 0, 2)); ?> جنيه</p>
                </div>
                
                <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                    <label class="block text-sm font-medium text-orange-700 dark:text-orange-300 mb-1">الرصيد غير المتاح:</label>
                    <p class="text-2xl font-bold text-orange-900 dark:text-orange-100"><?php echo e(number_format($vendor->unavailable_balance ?? 0, 2)); ?> جنيه</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Admin\src\Resources\views\vendors\show.blade.php ENDPATH**/ ?>