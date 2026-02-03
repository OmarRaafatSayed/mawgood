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
     <?php $__env->slot('title', null, []); ?> الطلبات المستلمة <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2">الطلبات المستلمة</h1>
        <p class="text-gray-600 mb-6">الوظيفة: <?php echo e($job->title); ?></p>

        <?php if($applications->isEmpty()): ?>
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لا توجد طلبات حتى الآن</p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2"><?php echo e($application->customer->name); ?></h3>
                                <p class="text-gray-600 mb-2"><?php echo e($application->customer->email); ?></p>
                                <p class="text-sm text-gray-500 mb-2">تاريخ التقديم: <?php echo e($application->created_at->format('Y-m-d')); ?></p>
                                
                                <?php if($application->cover_letter): ?>
                                    <p class="text-gray-700 mb-2"><strong>رسالة التقديم:</strong> <?php echo e($application->cover_letter); ?></p>
                                <?php endif; ?>

                                <?php if($application->resume_path): ?>
                                    <a href="<?php echo e(Storage::url($application->resume_path)); ?>" target="_blank" class="text-blue-600 hover:underline">
                                        عرض السيرة الذاتية
                                    </a>
                                <?php endif; ?>

                                <div class="mt-2">
                                    <span class="px-3 py-1 rounded text-sm
                                        <?php if($application->status === 'accepted'): ?> bg-green-100 text-green-800
                                        <?php elseif($application->status === 'rejected'): ?> bg-red-100 text-red-800
                                        <?php else: ?> bg-yellow-100 text-yellow-800
                                        <?php endif; ?>">
                                        <?php echo e($application->status === 'accepted' ? 'مقبول' : ($application->status === 'rejected' ? 'مرفوض' : 'قيد المراجعة')); ?>

                                    </span>
                                </div>
                            </div>

                            <?php if($application->status === 'pending'): ?>
                                <div class="flex gap-2">
                                    <form method="POST" action="<?php echo e(route('company.applications.accept', $application->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                            قبول
                                        </button>
                                    </form>
                                    <form method="POST" action="<?php echo e(route('company.applications.reject', $application->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                            رفض
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-6">
                <?php echo e($applications->links()); ?>

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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Company\src\Resources\views\applications\index.blade.php ENDPATH**/ ?>