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
        <?php echo e(app()->getLocale() === 'ar' ? 'اختر نوع الحساب' : 'Select Account Type'); ?>

     <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 text-center">
            <h1 class="text-3xl font-bold mb-4"><?php echo e(app()->getLocale() === 'ar' ? 'اختر نوع الحساب' : 'Select Your Account Type'); ?></h1>
            <p class="text-gray-600 mb-6"><?php echo e(app()->getLocale() === 'ar' ? 'ساعدنا في تخصيص تجربتك عن طريق اختيار نوع الحساب المناسب.' : 'Help us personalize your experience by selecting the appropriate account type.'); ?></p>

            <form method="POST" action="<?php echo e(route('shop.customers.store-account-type')); ?>">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <label class="block cursor-pointer rounded-lg p-6 border border-gray-200 hover:shadow-md">
                        <input type="radio" name="user_type" value="customer" class="hidden" checked />

                        <div class="text-left">
                            <h3 class="text-xl font-semibold"><?php echo e(app()->getLocale() === 'ar' ? 'فرد / باحث عن عمل' : 'Individual / Job Seeker'); ?></h3>
                            <p class="text-gray-600 mt-2"><?php echo e(app()->getLocale() === 'ar' ? 'ابحث عن وظائف وقدم طلبات بسهولة.' : 'Search and apply for jobs easily.'); ?></p>
                        </div>
                    </label>

                    <label class="block cursor-pointer rounded-lg p-6 border border-gray-200 hover:shadow-md">
                        <input type="radio" name="user_type" value="vendor" class="hidden" />

                        <div class="text-left">
                            <h3 class="text-xl font-semibold"><?php echo e(app()->getLocale() === 'ar' ? 'أصحاب العمل / بائع' : 'Employer / Vendor'); ?></h3>
                            <p class="text-gray-600 mt-2"><?php echo e(app()->getLocale() === 'ar' ? 'انشر وظائف أو افتح متجرك لإضافة منتجات.' : 'Post jobs or open a store to add products.'); ?></p>
                        </div>
                    </label>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-[#042a4a] text-white text-lg font-bold">
                    <?php echo e(app()->getLocale() === 'ar' ? 'حفظ ومتابعة' : 'Save and Continue'); ?>

                </button>
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
<?php endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src\Resources\views\customers\select-account-type.blade.php ENDPATH**/ ?>