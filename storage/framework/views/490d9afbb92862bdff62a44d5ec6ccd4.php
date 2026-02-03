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
     <?php $__env->slot('title', null, []); ?> نشر وظيفة جديدة <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">نشر وظيفة جديدة</h1>

        <form method="POST" action="<?php echo e(route('company.jobs.store')); ?>" class="max-w-2xl bg-white p-6 rounded-lg shadow">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block mb-2 font-bold">عنوان الوظيفة *</label>
                <input type="text" name="title" class="w-full border rounded-lg px-4 py-2" required value="<?php echo e(old('title')); ?>">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الوصف *</label>
                <textarea name="description" rows="6" class="w-full border rounded-lg px-4 py-2" required><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الموقع *</label>
                <input type="text" name="location" class="w-full border rounded-lg px-4 py-2" required value="<?php echo e(old('location')); ?>">
                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">نوع الوظيفة</label>
                <input type="text" name="job_type" class="w-full border rounded-lg px-4 py-2" placeholder="مثال: دوام كامل" value="<?php echo e(old('job_type')); ?>">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">نطاق الراتب</label>
                <input type="text" name="salary_range" class="w-full border rounded-lg px-4 py-2" placeholder="مثال: 5000-7000 ريال" value="<?php echo e(old('salary_range')); ?>">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">مستوى الخبرة</label>
                <input type="text" name="experience_level" class="w-full border rounded-lg px-4 py-2" placeholder="مثال: 2-5 سنوات" value="<?php echo e(old('experience_level')); ?>">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر الوظيفة
            </button>
        </form>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Company\src\Resources\views\jobs\create.blade.php ENDPATH**/ ?>