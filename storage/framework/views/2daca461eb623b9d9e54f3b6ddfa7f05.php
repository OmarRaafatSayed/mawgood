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
     <?php $__env->slot('title', null, []); ?> عن <?php echo e($vendor->store_name); ?> <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="<?php echo e(route('store.show', $vendor->store_slug)); ?>" class="text-blue-600 hover:underline">
                ← العودة للمتجر
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-6">عن <?php echo e($vendor->store_name); ?></h1>

            <?php if($vendor->store_logo): ?>
                <img src="<?php echo e(Storage::url($vendor->store_logo)); ?>" alt="<?php echo e($vendor->store_name); ?>" class="w-32 h-32 rounded-full mb-6">
            <?php endif; ?>

            <?php if($vendor->store_description): ?>
                <div class="prose max-w-none mb-6">
                    <p class="text-gray-700 text-lg"><?php echo e($vendor->store_description); ?></p>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-bold mb-2">عدد المنتجات</h3>
                    <p class="text-2xl text-blue-600"><?php echo e($vendor->products_count); ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-bold mb-2">الحالة</h3>
                    <p class="text-green-600">متجر معتمد ✓</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-bold mb-2">تاريخ الانضمام</h3>
                    <p><?php echo e($vendor->created_at->format('Y-m-d')); ?></p>
                </div>
            </div>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Shop\src\Resources\views\store\about.blade.php ENDPATH**/ ?>