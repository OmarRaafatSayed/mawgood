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
     <?php $__env->slot('title', null, []); ?> إدارة الوظائف <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">الوظائف المنشورة</h1>
            <a href="<?php echo e(route('company.jobs.create')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر وظيفة جديدة
            </a>
        </div>

        <?php if($jobs->isEmpty()): ?>
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لم تقم بنشر أي وظائف بعد</p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2"><?php echo e($job->title); ?></h3>
                                <p class="text-gray-600 mb-2"><?php echo e($job->location); ?></p>
                                <p class="text-sm text-gray-500">نُشرت في <?php echo e($job->created_at->format('Y-m-d')); ?></p>
                            </div>
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('company.jobs.applications', $job->id)); ?>" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    الطلبات (<?php echo e($job->applications->count()); ?>)
                                </a>
                                <a href="<?php echo e(route('company.jobs.edit', $job->id)); ?>" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                                    تعديل
                                </a>
                                <form method="POST" action="<?php echo e(route('company.jobs.destroy', $job->id)); ?>" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('هل أنت متأكد؟')">
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-6">
                <?php echo e($jobs->links()); ?>

            </div>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Company\src\Resources\views\jobs\index.blade.php ENDPATH**/ ?>