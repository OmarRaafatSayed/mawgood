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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">الوظائف المنشورة</h3>
                <p class="text-3xl font-bold">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">الطلبات الجديدة</h3>
                <p class="text-3xl font-bold">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">إجمالي المتقدمين</h3>
                <p class="text-3xl font-bold">0</p>
            </div>
        </div>

        <div class="flex gap-4">
            <a href="<?php echo e(route('company.jobs.create')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر وظيفة جديدة
            </a>
            <a href="<?php echo e(route('company.jobs.index')); ?>" class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300">
                إدارة الوظائف
            </a>
            <a href="<?php echo e(route('company.applications.index')); ?>" class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300">
                الطلبات المستلمة
            </a>
        </div>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\company\dashboard\index.blade.php ENDPATH**/ ?>