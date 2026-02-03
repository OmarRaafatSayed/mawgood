<?php if (isset($component)) { $__componentOriginal4c4dbe009fe892108b054e8b47e63427 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c4dbe009fe892108b054e8b47e63427 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e(app()->getLocale() === 'ar' ? 'وظائفي' : 'My Jobs'); ?>

     <?php $__env->endSlot(); ?>

    <div class="max-md:hidden">
        <?php if (isset($component)) { $__componentOriginalf60f1298dff473a76a071049d503ffbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf60f1298dff473a76a071049d503ffbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $attributes = $__attributesOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__attributesOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $component = $__componentOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__componentOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
    </div>

    <div class="mx-4 flex-auto">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-x-2.5">
                <h2 class="text-2xl font-medium">
                    <?php echo e(app()->getLocale() === 'ar' ? 'وظائفي' : 'My Jobs'); ?>

                </h2>
            </div>

            <a 
                href="<?php echo e(route('shop.customers.account.jobs.create')); ?>"
                class="primary-button px-5 py-3 font-normal"
            >
                <?php echo e(app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job'); ?>

            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="mt-4 rounded-md bg-green-50 p-4">
                <div class="text-sm text-green-700">
                    <?php echo e(session('success')); ?>

                </div>
            </div>
        <?php endif; ?>

        <div class="mt-8">
            <?php if($jobs->count()): ?>
                <div class="grid gap-6">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-lg border border-zinc-200 p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold mb-2">
                                        <a href="<?php echo e(route('jobs.show', $job->slug)); ?>" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            <?php echo e($job->title); ?>

                                        </a>
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-2"><?php echo e($job->company_name); ?></p>
                                    
                                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                        <span><i class="fas fa-map-marker-alt"></i> <?php echo e($job->city); ?></span>
                                        <span><i class="fas fa-briefcase"></i> 
                                            <?php if(app()->getLocale() === 'ar'): ?>
                                                <?php if($job->job_type === 'full-time'): ?>
                                                    دوام كامل
                                                <?php elseif($job->job_type === 'part-time'): ?>
                                                    دوام جزئي
                                                <?php elseif($job->job_type === 'contract'): ?>
                                                    عقد
                                                <?php else: ?>
                                                    عمل حر
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo e(ucfirst(str_replace('-', ' ', $job->job_type))); ?>

                                            <?php endif; ?>
                                        </span>
                                        <span><i class="fas fa-calendar"></i> <?php echo e($job->created_at->diffForHumans()); ?></span>
                                    </div>

                                    <?php if($job->salary_range): ?>
                                        <p class="text-green-600 font-medium mb-3"><?php echo e($job->salary_range); ?></p>
                                    <?php endif; ?>

                                    <div class="flex items-center gap-2">
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                            <?php echo e($job->category->name); ?>

                                        </span>
                                        
                                        <?php if($job->status): ?>
                                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                                <?php echo e(app()->getLocale() === 'ar' ? 'نشط' : 'Active'); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">
                                                <?php echo e(app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive'); ?>

                                            </span>
                                        <?php endif; ?>

                                        <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
                                            <?php echo e($job->applications->count()); ?> <?php echo e(app()->getLocale() === 'ar' ? 'متقدم' : 'Applications'); ?>

                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2 ml-4">
                                    <a 
                                        href="<?php echo e(route('shop.customers.account.jobs.applications', $job->id)); ?>"
                                        class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200"
                                    >
                                        <?php echo e(app()->getLocale() === 'ar' ? 'عرض المتقدمين' : 'View Applications'); ?>

                                    </a>
                                    
                                    <a 
                                        href="<?php echo e(route('shop.customers.account.jobs.edit', $job->id)); ?>"
                                        class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded hover:bg-gray-200"
                                    >
                                        <?php echo e(app()->getLocale() === 'ar' ? 'تعديل' : 'Edit'); ?>

                                    </a>
                                    
                                    <form method="POST" action="<?php echo e(route('shop.customers.account.jobs.delete', $job->id)); ?>" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button 
                                            type="submit" 
                                            class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 w-full"
                                            onclick="return confirm('<?php echo e(app()->getLocale() === 'ar' ? 'هل أنت متأكد من حذف هذه الوظيفة؟' : 'Are you sure you want to delete this job?'); ?>')"
                                        >
                                            <?php echo e(app()->getLocale() === 'ar' ? 'حذف' : 'Delete'); ?>

                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-8">
                    <?php echo e($jobs->links()); ?>

                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="text-gray-400 text-6xl mb-4">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-600 mb-2">
                        <?php echo e(app()->getLocale() === 'ar' ? 'لا توجد وظائف' : 'No Jobs Yet'); ?>

                    </h3>
                    <p class="text-gray-500 mb-6">
                        <?php echo e(app()->getLocale() === 'ar' ? 'ابدأ بإضافة وظيفتك الأولى' : 'Start by adding your first job posting'); ?>

                    </p>
                    <a 
                        href="<?php echo e(route('shop.customers.account.jobs.create')); ?>"
                        class="primary-button px-6 py-3"
                    >
                        <?php echo e(app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job'); ?>

                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $attributes = $__attributesOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $component = $__componentOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__componentOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src\Resources\views\customers\account\jobs\index.blade.php ENDPATH**/ ?>