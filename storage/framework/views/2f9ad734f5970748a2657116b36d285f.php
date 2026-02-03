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
     <?php $__env->slot('title', null, []); ?> تقييمات <?php echo e($vendor->store_name); ?> <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="<?php echo e(route('store.show', $vendor->store_slug)); ?>" class="text-blue-600 hover:underline">
                ← العودة للمتجر
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-6">تقييمات <?php echo e($vendor->store_name); ?></h1>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-500 mb-2"><?php echo e(number_format($averageRating, 1)); ?></div>
                <div class="text-gray-600">متوسط التقييم</div>
            </div>
        </div>

        <!-- Add Review Form -->
        <?php if(auth()->guard('customer')->check()): ?>
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-xl font-bold mb-4">أضف تقييمك</h2>
                <form method="POST" action="<?php echo e(route('store.reviews.store', $vendor->store_slug)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">التقييم</label>
                        <select name="rating" class="border rounded px-4 py-2" required>
                            <option value="">اختر التقييم</option>
                            <option value="5">⭐⭐⭐⭐⭐ ممتاز</option>
                            <option value="4">⭐⭐⭐⭐ جيد جداً</option>
                            <option value="3">⭐⭐⭐ جيد</option>
                            <option value="2">⭐⭐ مقبول</option>
                            <option value="1">⭐ ضعيف</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">التعليق</label>
                        <textarea name="comment" rows="3" class="w-full border rounded px-4 py-2" placeholder="اكتب تعليقك هنا..."></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        إضافة التقييم
                    </button>
                </form>
            </div>
        <?php else: ?>
            <div class="bg-gray-100 p-6 rounded-lg mb-8 text-center">
                <p class="text-gray-600">
                    <a href="<?php echo e(route('shop.customer.session.create')); ?>" class="text-blue-600 hover:underline">سجل دخولك</a>
                    لإضافة تقييم
                </p>
            </div>
        <?php endif; ?>

        <!-- Reviews List -->
        <?php if($reviews->isEmpty()): ?>
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لا توجد تقييمات بعد</p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold"><?php echo e($review->first_name); ?> <?php echo e($review->last_name); ?></h3>
                                <div class="text-yellow-500">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php echo e($i <= $review->rating ? '⭐' : '☆'); ?>

                                    <?php endfor; ?>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500"><?php echo e(\Carbon\Carbon::parse($review->created_at)->diffForHumans()); ?></span>
                        </div>
                        <?php if($review->comment): ?>
                            <p class="text-gray-700"><?php echo e($review->comment); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-6">
                <?php echo e($reviews->links()); ?>

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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Shop\src\Resources\views\store\reviews.blade.php ENDPATH**/ ?>