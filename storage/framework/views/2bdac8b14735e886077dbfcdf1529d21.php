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
        <?php echo e(app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job'); ?>

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
        <div class="flex items-center gap-x-2.5 mb-8">
            <a href="<?php echo e(route('shop.customers.account.jobs.index')); ?>" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-list"></i> <?php echo e(app()->getLocale() === 'ar' ? 'وظائفي' : 'My Jobs'); ?>

            </a>
            <span class="text-gray-400">|</span>
            <h2 class="text-2xl font-medium">
                <?php echo e(app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job'); ?>

            </h2>
        </div>

        <form method="POST" action="<?php echo e(route('shop.customers.account.jobs.store')); ?>" class="bg-white rounded-lg border border-zinc-200 p-6">
            <?php echo csrf_field(); ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Job Title -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'عنوان الوظيفة' : 'Job Title'); ?> *</label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Job Title Arabic -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'عنوان الوظيفة بالعربية' : 'Job Title (Arabic)'); ?></label>
                    <input type="text" name="title_ar" value="<?php echo e(old('title_ar')); ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Company Name -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'اسم الشركة' : 'Company Name'); ?> *</label>
                    <input type="text" name="company_name" value="<?php echo e(old('company_name', auth('customer')->user()->company_name)); ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Company Logo -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'شعار الشركة (رابط)' : 'Company Logo (URL)'); ?></label>
                    <input type="url" name="company_logo" value="<?php echo e(old('company_logo')); ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['company_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'الموقع' : 'Location'); ?> *</label>
                    <input type="text" name="location" value="<?php echo e(old('location')); ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- City -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'المدينة' : 'City'); ?> *</label>
                    <input type="text" name="city" value="<?php echo e(old('city')); ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Country -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'البلد' : 'Country'); ?> *</label>
                    <input type="text" name="country" value="<?php echo e(old('country', 'Egypt')); ?>" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Job Category -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'تصنيف الوظيفة' : 'Job Category'); ?> *</label>
                    <select name="job_category_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value=""><?php echo e(app()->getLocale() === 'ar' ? 'اختر التصنيف' : 'Select Category'); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('job_category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['job_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Job Type -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'نوع الوظيفة' : 'Job Type'); ?> *</label>
                    <select name="job_type" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="full-time" <?php echo e(old('job_type') == 'full-time' ? 'selected' : ''); ?>><?php echo e(app()->getLocale() === 'ar' ? 'دوام كامل' : 'Full Time'); ?></option>
                        <option value="part-time" <?php echo e(old('job_type') == 'part-time' ? 'selected' : ''); ?>><?php echo e(app()->getLocale() === 'ar' ? 'دوام جزئي' : 'Part Time'); ?></option>
                        <option value="contract" <?php echo e(old('job_type') == 'contract' ? 'selected' : ''); ?>><?php echo e(app()->getLocale() === 'ar' ? 'عقد' : 'Contract'); ?></option>
                        <option value="freelance" <?php echo e(old('job_type') == 'freelance' ? 'selected' : ''); ?>><?php echo e(app()->getLocale() === 'ar' ? 'عمل حر' : 'Freelance'); ?></option>
                    </select>
                    <?php $__errorArgs = ['job_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Salary Range -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'نطاق الراتب' : 'Salary Range'); ?></label>
                    <input type="text" name="salary_range" value="<?php echo e(old('salary_range')); ?>" placeholder="e.g. 15000-25000 EGP"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['salary_range'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Experience Level -->
                <div>
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'مستوى الخبرة' : 'Experience Level'); ?></label>
                    <input type="text" name="experience_level" value="<?php echo e(old('experience_level')); ?>" placeholder="e.g. 3-5 years"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['experience_level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Application URL -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'رابط التقديم' : 'Application URL'); ?> *</label>
                    <input type="url" name="application_url" value="<?php echo e(old('application_url')); ?>" required
                           placeholder="https://example.com/apply"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['application_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Expires At -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'تاريخ انتهاء الصلاحية' : 'Expires At'); ?></label>
                    <input type="date" name="expires_at" value="<?php echo e(old('expires_at')); ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['expires_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Job Description -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'وصف الوظيفة' : 'Job Description'); ?> *</label>
                <textarea name="description" rows="6" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Job Description Arabic -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'وصف الوظيفة بالعربية' : 'Job Description (Arabic)'); ?></label>
                <textarea name="description_ar" rows="6"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('description_ar')); ?></textarea>
                <?php $__errorArgs = ['description_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Requirements -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'المتطلبات' : 'Requirements'); ?></label>
                <textarea name="requirements" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('requirements')); ?></textarea>
                <?php $__errorArgs = ['requirements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Requirements Arabic -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2"><?php echo e(app()->getLocale() === 'ar' ? 'المتطلبات بالعربية' : 'Requirements (Arabic)'); ?></label>
                <textarea name="requirements_ar" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('requirements_ar')); ?></textarea>
                <?php $__errorArgs = ['requirements_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-red-500 text-sm"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex gap-4">
                <button type="submit" class="primary-button px-6 py-3">
                    <?php echo e(app()->getLocale() === 'ar' ? 'إنشاء الوظيفة' : 'Create Job'); ?>

                </button>
                <a href="<?php echo e(route('shop.customers.account.jobs.index')); ?>" class="secondary-button px-6 py-3">
                    <?php echo e(app()->getLocale() === 'ar' ? 'إلغاء' : 'Cancel'); ?>

                </a>
            </div>
        </form>
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
<?php endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src\Resources\views\customers\account\jobs\create.blade.php ENDPATH**/ ?>