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
     <?php $__env->slot('title', null, []); ?> الملف الشخصي للشركة <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">الملف الشخصي للشركة</h1>

        <form method="POST" action="<?php echo e(route('company.profile.update')); ?>" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded-lg shadow">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block mb-2 font-bold">اسم الشركة *</label>
                <input type="text" name="company_name" class="w-full border rounded-lg px-4 py-2" required value="<?php echo e(old('company_name', $profile->company_name)); ?>">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">المجال</label>
                <input type="text" name="industry" class="w-full border rounded-lg px-4 py-2" value="<?php echo e(old('industry', $profile->industry)); ?>">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الوصف</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2"><?php echo e(old('description', $profile->description)); ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الموقع الإلكتروني</label>
                <input type="url" name="website" class="w-full border rounded-lg px-4 py-2" value="<?php echo e(old('website', $profile->website)); ?>">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الشعار</label>
                <input type="file" name="logo" class="w-full border rounded-lg px-4 py-2" accept="image/*">
                <?php if($profile->logo): ?>
                    <img src="<?php echo e(Storage::url($profile->logo)); ?>" alt="Logo" class="mt-2 h-20">
                <?php endif; ?>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                حفظ التعديلات
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Company\src\Resources\views\profile\index.blade.php ENDPATH**/ ?>