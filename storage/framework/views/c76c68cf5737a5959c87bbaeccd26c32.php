<?php
    $channels = core()->getAllChannels();
    $currentChannel = core()->getRequestedChannel();
    $currentLocale = core()->getRequestedLocale();
    $groupedColumns = $product->attribute_family->attribute_groups->groupBy('column');
    $isSingleColumn = $groupedColumns->count() !== 2;
?>

<div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
    <?php $__currentLoopData = $groupedColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex flex-col gap-2 <?php echo e($column == 1 ? 'flex-1 max-xl:flex-auto' : 'w-[360px] max-w-full max-sm:w-full'); ?>">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $customAttributes = $product->getEditableAttributes($group); ?>

                <?php if(
                    $group->code === 'inventories' 
                    && (
                        $product->getTypeInstance()->isComposite()
                        || $product->type === 'downloadable'
                    )
                ): ?>
                    <?php continue; ?>
                <?php endif; ?>

                <?php if($customAttributes->isNotEmpty()): ?>
                    <div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                            <?php echo e($group->name); ?>

                        </p>

                        <?php if($group->code == 'meta_description'): ?>
                            <?php if (isset($component)) { $__componentOriginalab143bfdc06ba566873dc3777a785d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalab143bfdc06ba566873dc3777a785d64 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.seo.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::seo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalab143bfdc06ba566873dc3777a785d64)): ?>
<?php $attributes = $__attributesOriginalab143bfdc06ba566873dc3777a785d64; ?>
<?php unset($__attributesOriginalab143bfdc06ba566873dc3777a785d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalab143bfdc06ba566873dc3777a785d64)): ?>
<?php $component = $__componentOriginalab143bfdc06ba566873dc3777a785d64; ?>
<?php unset($__componentOriginalab143bfdc06ba566873dc3777a785d64); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php $__currentLoopData = $customAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => 'last:!mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'last:!mb-0']); ?>
                                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php echo $attribute->admin_name . ($attribute->is_required ? '<span class="required"></span>' : ''); ?>


                                    <?php if($attribute->value_per_channel && $channels->count() > 1): ?>
                                        <span class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                            <?php echo e($currentChannel->name); ?>

                                        </span>
                                    <?php endif; ?>

                                    <?php if($attribute->value_per_locale): ?>
                                        <span class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                            <?php echo e($currentLocale->name); ?>

                                        </span>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $attributes = $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $component = $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>

                                <?php echo $__env->make('admin::catalog.products.edit.controls', [
                                    'attribute' => $attribute,
                                    'product'   => $product,
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => $attribute->code . (in_array($attribute->type, ['multiselect', 'checkbox']) ? '[]' : '')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . (in_array($attribute->type, ['multiselect', 'checkbox']) ? '[]' : ''))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $attributes = $__attributesOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $component = $__componentOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__componentOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $attributes = $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $component = $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php echo $__env->renderWhen($group->code == 'price', 'admin::catalog.products.edit.price.group', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
                        <?php echo $__env->renderWhen($group->code === 'inventories', 'admin::catalog.products.edit.inventories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($column == 1): ?>
                <?php echo $__env->make('admin::catalog.products.edit.images', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo $__env->make('admin::catalog.products.edit.videos', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if ($__env->exists('admin::catalog.products.edit.types.' . $product->type)) echo $__env->make('admin::catalog.products.edit.types.' . $product->type, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo $__env->make('admin::catalog.products.edit.links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php $__currentLoopData = $product->getTypeInstance()->getAdditionalViews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if ($__env->exists($view)) echo $__env->make($view, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php elseif(! $isSingleColumn): ?>
                <?php echo $__env->make('admin::catalog.products.edit.channels', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo $__env->make('admin::catalog.products.edit.categories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>

        <?php if($isSingleColumn && ($column == 1 || $column == 2)): ?>
            <div class="w-[360px] max-w-full max-sm:w-full">
                <?php if($column == 2): ?> 
                    <?php echo $__env->make('admin::catalog.products.edit.images', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('admin::catalog.products.edit.videos', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php if ($__env->exists('admin::catalog.products.edit.types.' . $product->type)) echo $__env->make('admin::catalog.products.edit.types.' . $product->type, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('admin::catalog.products.edit.links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php $__currentLoopData = $product->getTypeInstance()->getAdditionalViews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if ($__env->exists($view)) echo $__env->make($view, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php echo $__env->make('admin::catalog.products.edit.channels', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo $__env->make('admin::catalog.products.edit.categories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\shared\products\form.blade.php ENDPATH**/ ?>