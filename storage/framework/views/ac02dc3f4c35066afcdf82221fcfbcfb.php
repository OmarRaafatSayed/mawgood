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
        تفاصيل التاجر - <?php echo e($vendor->store_name); ?>

     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 mb-5">
        <div class="grid gap-1.5">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                تفاصيل التاجر
            </p>
        </div>
        <a href="<?php echo e(route('admin.vendors.index')); ?>" class="secondary-button">
            رجوع
        </a>
    </div>

    <div class="grid gap-4">
        <!-- معلومات المتجر -->
        <div class="bg-white rounded box-shadow dark:bg-gray-900 p-6">
            <h2 class="text-lg font-bold mb-4">معلومات المتجر</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">اسم المتجر</p>
                    <p class="font-semibold"><?php echo e($vendor->store_name); ?></p>
                </div>
                <div>
                    <p class="text-gray-600">الحالة</p>
                    <p class="font-semibold">
                        <?php if($vendor->status === 'pending'): ?>
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">في الانتظار</span>
                        <?php elseif($vendor->status === 'approved'): ?>
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">موافق عليه</span>
                        <?php elseif($vendor->status === 'rejected'): ?>
                            <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-800">مرفوض</span>
                        <?php else: ?>
                            <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-800">معلق</span>
                        <?php endif; ?>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600">نسبة العمولة</p>
                    <p class="font-semibold"><?php echo e($vendor->commission_rate); ?>%</p>
                </div>
                <div>
                    <p class="text-gray-600">المالك</p>
                    <p class="font-semibold"><?php echo e($vendor->customer->name ?? 'N/A'); ?></p>
                </div>
                <div>
                    <p class="text-gray-600">البريد الإلكتروني</p>
                    <p class="font-semibold"><?php echo e($vendor->business_email); ?></p>
                </div>
                <div>
                    <p class="text-gray-600">الهاتف</p>
                    <p class="font-semibold"><?php echo e($vendor->business_phone); ?></p>
                </div>
            </div>
        </div>

        <!-- المحفظة -->
        <div class="bg-white rounded box-shadow dark:bg-gray-900 p-6">
            <h2 class="text-lg font-bold mb-4">المحفظة</h2>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <p class="text-gray-600">الرصيد المتاح</p>
                    <p class="font-semibold text-green-600"><?php echo e(number_format($vendor->available_balance, 2)); ?> ريال</p>
                </div>
                <div>
                    <p class="text-gray-600">الرصيد المعلق</p>
                    <p class="font-semibold text-yellow-600"><?php echo e(number_format($vendor->unavailable_balance, 2)); ?> ريال</p>
                </div>
                <div>
                    <p class="text-gray-600">الإجمالي</p>
                    <p class="font-semibold"><?php echo e(number_format($vendor->total_balance, 2)); ?> ريال</p>
                </div>
            </div>
        </div>

        <!-- إجراءات -->
        <?php if($vendor->status === 'pending'): ?>
        <div class="bg-white rounded box-shadow dark:bg-gray-900 p-6">
            <h2 class="text-lg font-bold mb-4">إجراءات</h2>
            <div class="flex gap-2">
                <form action="<?php echo e(route('admin.vendors.approve', $vendor->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="primary-button">
                        الموافقة على التاجر
                    </button>
                </form>
                <form action="<?php echo e(route('admin.vendors.reject', $vendor->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="secondary-button">
                        رفض التاجر
                    </button>
                </form>
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
<?php endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\admin\vendors\show.blade.php ENDPATH**/ ?>