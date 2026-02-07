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
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e(__('Become a Vendor')); ?>

     <?php $__env->endSlot(); ?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-6"><?php echo e(__('Vendor Application')); ?></h1>
        
        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('vendor.onboarding.submit')); ?>" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            <?php echo csrf_field(); ?>

            <!-- Store Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4"><?php echo e(__('Store Information')); ?></h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="store_name">
                        <?php echo e(__('Store Name')); ?> <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="store_name" id="store_name" value="<?php echo e(old('store_name')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="store_description">
                        <?php echo e(__('Store Description')); ?> <span class="text-red-500">*</span>
                    </label>
                    <textarea name="store_description" id="store_description" rows="4" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?php echo e(old('store_description')); ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                        <?php echo e(__('Primary Category')); ?> <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value=""><?php echo e(__('Select Category')); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="store_logo">
                        <?php echo e(__('Store Logo')); ?>

                    </label>
                    <input type="file" name="store_logo" id="store_logo" accept="image/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Business Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4"><?php echo e(__('Business Information')); ?></h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_name">
                        <?php echo e(__('Business Name')); ?>

                    </label>
                    <input type="text" name="business_name" id="business_name" value="<?php echo e(old('business_name')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tax_id">
                        <?php echo e(__('Tax ID / Commercial Registration')); ?>

                    </label>
                    <input type="text" name="tax_id" id="tax_id" value="<?php echo e(old('tax_id')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_email">
                        <?php echo e(__('Business Email')); ?> <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="business_email" id="business_email" value="<?php echo e(old('business_email')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_phone">
                        <?php echo e(__('Business Phone')); ?> <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="business_phone" id="business_phone" value="<?php echo e(old('business_phone')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_address">
                        <?php echo e(__('Business Address')); ?> <span class="text-red-500">*</span>
                    </label>
                    <textarea name="business_address" id="business_address" rows="3" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?php echo e(old('business_address')); ?></textarea>
                </div>
            </div>

            <!-- Social Media -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4"><?php echo e(__('Social Media (Optional)')); ?></h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="facebook_url">
                        <?php echo e(__('Facebook URL')); ?>

                    </label>
                    <input type="url" name="facebook_url" id="facebook_url" value="<?php echo e(old('facebook_url')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="instagram_url">
                        <?php echo e(__('Instagram URL')); ?>

                    </label>
                    <input type="url" name="instagram_url" id="instagram_url" value="<?php echo e(old('instagram_url')); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <?php echo e(__('Submit Application')); ?>

                </button>
            </div>
        </form>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/vendor/onboarding/form.blade.php ENDPATH**/ ?>