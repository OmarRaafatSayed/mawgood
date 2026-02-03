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
     <?php $__env->slot('title', null, []); ?> لوحة تحكم الشركة <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">مرحباً <?php echo e($user->name); ?></h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">إجمالي الوظائف</h3>
                <p class="text-3xl font-bold"><?php echo e($stats['total_jobs']); ?></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">الوظائف النشطة</h3>
                <p class="text-3xl font-bold text-green-600"><?php echo e($stats['active_jobs']); ?></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">إجمالي المتقدمين</h3>
                <p class="text-3xl font-bold"><?php echo e($stats['total_applications']); ?></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">طلبات قيد المراجعة</h3>
                <p class="text-3xl font-bold text-yellow-600"><?php echo e($stats['pending_applications']); ?></p>
            </div>
        </div>

        <div class="flex gap-4 mb-8">
            <a href="<?php echo e(route('company.jobs.create')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر وظيفة جديدة
            </a>
            <a href="<?php echo e(route('company.jobs.index')); ?>" class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300">
                إدارة الوظائف
            </a>
            <a href="<?php echo e(route('company.profile')); ?>" class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300">
                الملف الشخصي
            </a>
        </div>

        <?php if($recentApplications->count() > 0): ?>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-4">آخر الطلبات</h2>
                <div class="space-y-4">
                    <?php $__currentLoopData = $recentApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-b pb-4">
                            <h3 class="font-bold"><?php echo e($app->job->title); ?></h3>
                            <p class="text-gray-600">المتقدم: <?php echo e($app->customer->name); ?></p>
                            <p class="text-sm text-gray-500"><?php echo e($app->created_at->diffForHumans()); ?></p>
                            <a href="<?php echo e(route('company.jobs.applications', $app->job->id)); ?>" class="text-blue-600 hover:underline">
                                عرض التفاصيل
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Company\src\Resources\views\dashboard\index.blade.php ENDPATH**/ ?>