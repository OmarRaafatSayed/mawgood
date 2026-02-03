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
        تعديل التاجر - <?php echo e($vendor->store_name); ?>

     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 mb-5">
        <div class="grid gap-1.5">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                تعديل التاجر
            </p>
        </div>
        <a href="<?php echo e(route('admin.vendors.index')); ?>" class="secondary-button">
            رجوع
        </a>
    </div>

    <div class="bg-white rounded box-shadow dark:bg-gray-900 p-6">
        <form action="<?php echo e(route('admin.vendors.update', $vendor->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid gap-4">
                <div>
                    <label class="block text-sm font-medium mb-2">اسم المتجر</label>
                    <input type="text" name="store_name" value="<?php echo e($vendor->store_name); ?>" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">البريد الإلكتروني</label>
                    <input type="email" name="business_email" value="<?php echo e($vendor->business_email); ?>" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">الهاتف</label>
                    <input type="text" name="business_phone" value="<?php echo e($vendor->business_phone); ?>" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">نسبة العمولة %</label>
                    <input type="number" name="commission_rate" value="<?php echo e($vendor->commission_rate); ?>" step="0.01" min="0" max="100" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">الحالة</label>
                    <select name="status" class="w-full border rounded px-3 py-2" required>
                        <option value="pending" <?php echo e($vendor->status === 'pending' ? 'selected' : ''); ?>>في الانتظار</option>
                        <option value="approved" <?php echo e($vendor->status === 'approved' ? 'selected' : ''); ?>>موافق عليه</option>
                        <option value="rejected" <?php echo e($vendor->status === 'rejected' ? 'selected' : ''); ?>>مرفوض</option>
                        <option value="suspended" <?php echo e($vendor->status === 'suspended' ? 'selected' : ''); ?>>معلق</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">وصف المتجر</label>
                    <textarea name="store_description" rows="4" class="w-full border rounded px-3 py-2"><?php echo e($vendor->store_description); ?></textarea>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="primary-button">
                        حفظ التغييرات
                    </button>
                    <a href="<?php echo e(route('admin.vendors.index')); ?>" class="secondary-button">
                        إلغاء
                    </a>
                </div>
            </div>
        </form>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\admin\vendors\edit.blade.php ENDPATH**/ ?>