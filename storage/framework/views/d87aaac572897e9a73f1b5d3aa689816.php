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
     <?php $__env->slot('title', null, []); ?> منتجات <?php echo e($vendor->store_name); ?> <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="<?php echo e(route('store.show', $vendor->store_slug)); ?>" class="text-blue-600 hover:underline">
                ← العودة للمتجر
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-6">منتجات <?php echo e($vendor->store_name); ?></h1>

        <?php if($products->isEmpty()): ?>
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لا توجد منتجات حالياً</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                        <div class="p-4">
                            <h3 class="font-bold mb-2"><?php echo e($product->name); ?></h3>
                            <p class="text-gray-600 text-sm mb-2"><?php echo e($product->sku); ?></p>
                            <a href="/product/<?php echo e($product->sku); ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-8">
                <?php echo e($products->links()); ?>

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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Shop\src\Resources\views\store\products.blade.php ENDPATH**/ ?>