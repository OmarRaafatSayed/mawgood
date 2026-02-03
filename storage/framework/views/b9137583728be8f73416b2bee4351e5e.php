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
     <?php $__env->slot('title', null, []); ?> <?php echo e($job->title); ?> <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Job Header -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h1 class="text-3xl font-bold mb-3"><?php echo e($job->title); ?></h1>
                <p class="text-xl text-gray-700 mb-2"><?php echo e($job->company_name); ?></p>
                <div class="flex gap-4 text-gray-600 mb-4">
                    <span>📍 <?php echo e($job->city); ?></span>
                    <?php if($job->job_type): ?>
                        <span>💼 <?php echo e(ucfirst($job->job_type)); ?></span>
                    <?php endif; ?>
                    <?php if($job->category): ?>
                        <span>🏷️ <?php echo e($job->category->name); ?></span>
                    <?php endif; ?>
                </div>
                
                <?php if($job->application_link): ?>
                    <a href="<?php echo e($job->application_link); ?>" target="_blank" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                        تقديم طلب الآن
                    </a>
                <?php endif; ?>
            </div>

            <!-- Job Description -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">وصف الوظيفة</h2>
                <div class="prose max-w-none">
                    <?php echo $job->description; ?>

                </div>
            </div>

            <!-- Related Jobs -->
            <?php if($relatedJobs->count() > 0): ?>
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-semibold mb-4">وظائف مشابهة</h2>
                    <div class="grid gap-4">
                        <?php $__currentLoopData = $relatedJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border rounded-lg p-4 hover:shadow transition">
                                <h3 class="text-lg font-semibold mb-1">
                                    <a href="<?php echo e(route('jobs.show', $relatedJob->slug)); ?>" class="hover:text-blue-600"><?php echo e($relatedJob->title); ?></a>
                                </h3>
                                <p class="text-gray-600 text-sm"><?php echo e($relatedJob->company_name); ?> - <?php echo e($relatedJob->city); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\jobs\show.blade.php ENDPATH**/ ?>