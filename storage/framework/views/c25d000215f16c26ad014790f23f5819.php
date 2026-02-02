<?php $__env->startSection('title', 'تعديل المنتج'); ?>
<?php $__env->startSection('page-title', 'تعديل المنتج'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('mawgood-vendor::products.form', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mawgood-vendor::layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Vendor\src\Providers/../Resources/views/products/edit.blade.php ENDPATH**/ ?>