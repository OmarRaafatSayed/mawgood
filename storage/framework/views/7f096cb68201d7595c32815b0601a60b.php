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
        إدارة الوظائف
     <?php $__env->endSlot(); ?>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap mb-6">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            جميع الوظائف
        </p>

        <div class="flex gap-x-2.5 items-center">
            <button 
                type="button"
                class="primary-button"
                onclick="document.getElementById('jobModal').style.display='block'"
            >
                + إضافة وظيفة
            </button>
            <a href="<?php echo e(route('admin.jobs.categories')); ?>" class="secondary-button">
                فئات الوظائف
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">عنوان الوظيفة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الشركة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">المدينة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الفئة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">النوع</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الحالة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm"><?php echo e($job->id); ?></td>
                    <td class="px-6 py-4 text-sm font-medium"><?php echo e($job->title); ?></td>
                    <td class="px-6 py-4 text-sm"><?php echo e($job->company_name); ?></td>
                    <td class="px-6 py-4 text-sm"><?php echo e($job->city); ?></td>
                    <td class="px-6 py-4 text-sm"><?php echo e($job->category->name ?? '-'); ?></td>
                    <td class="px-6 py-4 text-sm"><?php echo e($job->job_type ?? '-'); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full <?php echo e($job->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                            <?php echo e($job->status ? 'نشط' : 'غير نشط'); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <a href="<?php echo e(route('admin.jobs.edit', $job->id)); ?>" class="text-blue-600 hover:text-blue-900 mr-3">تعديل</a>
                        <form method="POST" action="<?php echo e(route('admin.jobs.destroy', $job->id)); ?>" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">لا توجد وظائف</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Job Modal -->
    <div id="jobModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); overflow-y:auto;">
        <div style="background-color:#fff; margin:2% auto; padding:0; width:90%; max-width:800px; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
            <div style="padding:20px; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <h2 class="text-xl font-bold">إضافة وظيفة جديدة</h2>
                <span onclick="document.getElementById('jobModal').style.display='none'" style="cursor:pointer; font-size:28px; color:#9ca3af;">&times;</span>
            </div>
            
            <form method="POST" action="<?php echo e(route('admin.jobs.store')); ?>" enctype="multipart/form-data" style="padding:20px;">
                <?php echo csrf_field(); ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">عنوان الوظيفة <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">اسم الشركة <span class="text-red-500">*</span></label>
                        <input type="text" name="company_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">المدينة <span class="text-red-500">*</span></label>
                        <input type="text" name="city" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">الفئة <span class="text-red-500">*</span></label>
                        <select name="job_category_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">اختر الفئة</option>
                            <?php $__currentLoopData = \App\JobCategory::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">نوع الوظيفة</label>
                        <select name="job_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">اختر النوع</option>
                            <option value="full-time">دوام كامل</option>
                            <option value="part-time">دوام جزئي</option>
                            <option value="contract">عقد</option>
                            <option value="freelance">عمل حر</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">الحالة</label>
                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">نشط</option>
                            <option value="0">غير نشط</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">صورة الوظيفة</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <p class="text-xs text-gray-500 mt-1">اختياري - يمكنك إضافة صورة للوظيفة</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">رابط التقديم <span class="text-red-500">*</span></label>
                        <input type="url" name="application_link" required placeholder="https://example.com/apply" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">وصف الوظيفة <span class="text-red-500">*</span></label>
                        <textarea name="description" required rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                </div>

                <div class="flex gap-2 mt-6">
                    <button type="submit" class="primary-button">حفظ الوظيفة</button>
                    <button type="button" onclick="document.getElementById('jobModal').style.display='none'" class="secondary-button">إلغاء</button>
                </div>
            </form>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\admin\jobs\index.blade.php ENDPATH**/ ?>