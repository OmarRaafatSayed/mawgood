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
     <?php $__env->slot('title', null, []); ?> <?php echo e($vendor->meta_title ?? $vendor->store_name); ?> <?php $__env->endSlot(); ?>

    <?php $__env->startPush('meta'); ?>
        <meta name="description" content="<?php echo e($vendor->meta_description ?? $vendor->store_description); ?>">
        <meta property="og:title" content="<?php echo e($vendor->store_name); ?>">
        <meta property="og:description" content="<?php echo e($vendor->store_description); ?>">
    <?php $__env->stopPush(); ?>

    <div class="container mx-auto px-4 py-8">
        <!-- Store Header -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <?php if($vendor->store_banner): ?>
                <img src="<?php echo e(Storage::url($vendor->store_banner)); ?>" alt="<?php echo e($vendor->store_name); ?>" class="w-full h-64 object-cover">
            <?php endif; ?>
            
            <div class="p-6">
                <div class="flex items-center gap-4 mb-4">
                    <?php if($vendor->store_logo): ?>
                        <img src="<?php echo e(Storage::url($vendor->store_logo)); ?>" alt="<?php echo e($vendor->store_name); ?>" class="w-20 h-20 rounded-full">
                    <?php endif; ?>
                    <div>
                        <h1 class="text-3xl font-bold"><?php echo e($vendor->store_name); ?></h1>
                        <div class="flex items-center gap-2 text-yellow-500">
                            <span>⭐ <?php echo e(number_format($averageRating, 1)); ?></span>
                            <span class="text-gray-600">(<?php echo e($vendor->products_count); ?> منتج)</span>
                        </div>
                    </div>
                </div>
                
                <?php if($vendor->store_description): ?>
                    <p class="text-gray-700 mb-4"><?php echo e($vendor->store_description); ?></p>
                <?php endif; ?>

                <div class="flex gap-4">
                    <a href="<?php echo e(route('store.products', $vendor->store_slug)); ?>" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        تصفح المنتجات
                    </a>
                    <a href="<?php echo e(route('store.about', $vendor->store_slug)); ?>" class="bg-gray-200 px-6 py-2 rounded-lg hover:bg-gray-300">
                        عن المتجر
                    </a>
                    <a href="<?php echo e(route('store.reviews', $vendor->store_slug)); ?>" class="bg-gray-200 px-6 py-2 rounded-lg hover:bg-gray-300">
                        التقييمات
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Products -->
        <h2 class="text-2xl font-bold mb-6">المنتجات المميزة</h2>
        
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
                            <a href="/product/<?php echo e($product->sku); ?>" class="text-blue-600 hover:underline">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-6 text-center">
                <a href="<?php echo e(route('store.products', $vendor->store_slug)); ?>" class="text-blue-600 hover:underline">
                    عرض جميع المنتجات →
                </a>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Shop\src\Resources\views\store\show.blade.php ENDPATH**/ ?>