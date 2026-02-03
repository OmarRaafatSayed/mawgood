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
        فئات الوظائف
     <?php $__env->endSlot(); ?>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            فئات الوظائف
        </p>

        <div class="flex gap-x-2.5 items-center">
            <button 
                type="button"
                class="primary-button"
                onclick="document.getElementById('categoryModal').style.display='block'"
            >
                + إضافة فئة
            </button>
        </div>
    </div>

    <div class="mt-8">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>Slug</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($category->name); ?></td>
                        <td><?php echo e($category->slug); ?></td>
                        <td>
                            <span class="badge <?php echo e($category->status ? 'badge-success' : 'badge-danger'); ?>">
                                <?php echo e($category->status ? 'نشط' : 'غير نشط'); ?>

                            </span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center">لا توجد فئات</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="categoryModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.4);">
        <div style="background-color:#fefefe; margin:10% auto; padding:20px; border:1px solid #888; width:50%; border-radius:8px;">
            <span onclick="document.getElementById('categoryModal').style.display='none'" style="color:#aaa; float:right; font-size:28px; font-weight:bold; cursor:pointer;">&times;</span>
            
            <h2 class="text-lg font-bold mb-4">إضافة فئة جديدة</h2>
            
            <form method="POST" action="<?php echo e(route('admin.jobs.categories.store')); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">الاسم <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Slug <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="slug" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="primary-button">
                        حفظ
                    </button>
                    <button type="button" onclick="document.getElementById('categoryModal').style.display='none'" class="secondary-button">
                        إلغاء
                    </button>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\admin\jobs\categories.blade.php ENDPATH**/ ?>