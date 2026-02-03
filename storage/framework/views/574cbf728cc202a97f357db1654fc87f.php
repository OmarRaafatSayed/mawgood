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
        تعديل الوظيفة
     <?php $__env->endSlot(); ?>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap mb-6">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            تعديل الوظيفة: <?php echo e($job->title); ?>

        </p>
    </div>

    <form method="POST" action="<?php echo e(route('admin.jobs.update', $job->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-2">عنوان الوظيفة <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="<?php echo e($job->title); ?>" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">اسم الشركة <span class="text-red-500">*</span></label>
                    <input type="text" name="company_name" value="<?php echo e($job->company_name); ?>" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">المدينة <span class="text-red-500">*</span></label>
                    <input type="text" name="city" value="<?php echo e($job->city); ?>" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">الفئة <span class="text-red-500">*</span></label>
                    <select name="job_category_id" required class="w-full px-3 py-2 border rounded-md">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($job->job_category_id == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">نوع الوظيفة</label>
                    <select name="job_type" class="w-full px-3 py-2 border rounded-md">
                        <option value="">اختر النوع</option>
                        <option value="full-time" <?php echo e($job->job_type == 'full-time' ? 'selected' : ''); ?>>دوام كامل</option>
                        <option value="part-time" <?php echo e($job->job_type == 'part-time' ? 'selected' : ''); ?>>دوام جزئي</option>
                        <option value="contract" <?php echo e($job->job_type == 'contract' ? 'selected' : ''); ?>>عقد</option>
                        <option value="freelance" <?php echo e($job->job_type == 'freelance' ? 'selected' : ''); ?>>عمل حر</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">الحالة</label>
                    <select name="status" class="w-full px-3 py-2 border rounded-md">
                        <option value="1" <?php echo e($job->status ? 'selected' : ''); ?>>نشط</option>
                        <option value="0" <?php echo e(!$job->status ? 'selected' : ''); ?>>غير نشط</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">صورة الوظيفة</label>
                    <?php if($job->image): ?>
                        <div class="mb-2">
                            <img src="<?php echo e(asset('storage/' . $job->image)); ?>" alt="Job Image" class="w-32 h-32 object-cover rounded" />
                        </div>
                    <?php endif; ?>
                    <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border rounded-md" />
                    <p class="text-xs text-gray-500 mt-1">اختياري - اترك فارغاً للإبقاء على الصورة الحالية</p>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">رابط التقديم <span class="text-red-500">*</span></label>
                    <input type="url" name="application_link" value="<?php echo e($job->application_link); ?>" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">وصف الوظيفة <span class="text-red-500">*</span></label>
                    <textarea name="description" required rows="5" class="w-full px-3 py-2 border rounded-md"><?php echo e($job->description); ?></textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-2">
                <button type="submit" class="primary-button">حفظ التعديلات</button>
                <a href="<?php echo e(route('admin.jobs.index')); ?>" class="secondary-button">إلغاء</a>
            </div>
        </div>
    </form>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\admin\jobs\edit.blade.php ENDPATH**/ ?>