<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> الوظائف المتاحة <?php $__env->endSlot(); ?>

    <!-- Filter Bar -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-4">
            <form method="GET" action="<?php echo e(route('jobs.index')); ?>" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-medium mb-1">بحث</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="ابحث عن وظيفة..." class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-sm font-medium mb-1">الفئة</label>
                    <select name="category" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع الفئات</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->slug); ?>" <?php echo e(request('category') == $category->slug ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-sm font-medium mb-1">الموقع</label>
                    <select name="location" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع المواقع</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city); ?>" <?php echo e(request('location') == $city ? 'selected' : ''); ?>><?php echo e($city); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-sm font-medium mb-1">نوع الوظيفة</label>
                    <select name="job_type" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع الأنواع</option>
                        <?php $__currentLoopData = $jobTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type); ?>" <?php echo e(request('job_type') == $type ? 'selected' : ''); ?>><?php echo e(ucfirst($type)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">بحث</button>
            </form>
        </div>
    </div>

    <!-- Jobs List -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">الوظائف المتاحة (<?php echo e($jobs->total()); ?>)</h1>
        </div>

        <?php if($jobs->count() > 0): ?>
            <div class="grid gap-4">
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white border rounded-lg p-6 hover:shadow-lg transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold mb-2">
                                    <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" class="hover:text-blue-600"><?php echo e($job->title); ?></a>
                                </h2>
                                <p class="text-gray-600 mb-2"><?php echo e($job->company_name); ?></p>
                                <div class="flex gap-4 text-sm text-gray-500">
                                    <span>📍 <?php echo e($job->city); ?></span>
                                    <?php if($job->job_type): ?>
                                        <span>💼 <?php echo e(ucfirst($job->job_type)); ?></span>
                                    <?php endif; ?>
                                    <?php if($job->category): ?>
                                        <span>🏷️ <?php echo e($job->category->name); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 whitespace-nowrap">عرض التفاصيل</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-8"><?php echo e($jobs->links()); ?></div>
        <?php else: ?>
            <div class="text-center py-12"><p class="text-gray-600 text-lg">لا توجد وظائف متاحة حالياً</p></div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/jobs/index.blade.php ENDPATH**/ ?>