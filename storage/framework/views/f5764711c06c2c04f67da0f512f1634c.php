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
     <?php $__env->slot('title', null, []); ?> اختر نوع الحساب <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-center">اختر نوع الحساب</h1>

            <form method="POST" action="<?php echo e(route('role.select.submit')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="block p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="role" value="<?php echo e($role->name); ?>" class="mr-2" required>
                        <span class="text-lg">
                            <?php if($role->name === 'customer'): ?>
                                عميل - تسوق وتقديم على وظائف
                            <?php elseif($role->name === 'vendor'): ?>
                                بائع - بيع منتجات
                            <?php elseif($role->name === 'company'): ?>
                                شركة - عرض وظائف
                            <?php endif; ?>
                        </span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    متابعة
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
<?php endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\auth\select-role.blade.php ENDPATH**/ ?>