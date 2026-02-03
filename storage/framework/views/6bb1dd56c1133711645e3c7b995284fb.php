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
        إدارة التجار
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 mb-5">
        <div class="grid gap-1.5">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                إدارة التجار
            </p>
        </div>
    </div>

    <div class="bg-white rounded box-shadow dark:bg-gray-900">
        <div class="p-4">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-right p-3">#</th>
                        <th class="text-right p-3">اسم المتجر</th>
                        <th class="text-right p-3">المالك</th>
                        <th class="text-right p-3">الحالة</th>
                        <th class="text-right p-3">العمولة %</th>
                        <th class="text-right p-3">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3"><?php echo e($vendor->id); ?></td>
                            <td class="p-3"><?php echo e($vendor->store_name); ?></td>
                            <td class="p-3"><?php echo e($vendor->customer->name ?? 'N/A'); ?></td>
                            <td class="p-3">
                                <?php if($vendor->status === 'pending'): ?>
                                    <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">في الانتظار</span>
                                <?php elseif($vendor->status === 'approved'): ?>
                                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">موافق عليه</span>
                                <?php elseif($vendor->status === 'rejected'): ?>
                                    <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-800">مرفوض</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-800">معلق</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-3"><?php echo e($vendor->commission_rate); ?>%</td>
                            <td class="p-3">
                                <a href="<?php echo e(route('admin.vendors.show', $vendor->id)); ?>" class="text-blue-600 hover:underline">عرض</a>
                                <a href="<?php echo e(route('admin.vendors.edit', $vendor->id)); ?>" class="text-blue-600 hover:underline ml-2">تعديل</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <div class="mt-4">
                <?php echo e($vendors->links()); ?>

            </div>
        </div>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\admin\vendors\index.blade.php ENDPATH**/ ?>