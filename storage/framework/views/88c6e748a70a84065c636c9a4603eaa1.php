<?php $__env->startSection('title', 'الإشعارات'); ?>
<?php $__env->startSection('page-title', 'الإشعارات'); ?>
<?php $__env->startSection('page-icon', '<i class="fas fa-bell me-2"></i>'); ?>

<?php $__env->startSection('header-actions'); ?>
<div class="d-flex gap-2">
    <form method="POST" action="<?php echo e(route('vendor.notifications.delete_all')); ?>" onsubmit="return confirm('هل تريد حذف جميع الإشعارات؟')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-outline-danger">
            <i class="fas fa-trash me-2"></i>حذف الكل
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">جميع الإشعارات</h5>
            </div>
            <div class="card-body p-0">
                <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="notification-item <?php echo e($notification->read_at ? '' : 'unread'); ?> border-bottom p-3">
                    <div class="d-flex align-items-start">
                        <div class="notification-icon me-3">
                            <?php
                                $iconClass = match($notification->type) {
                                    'order' => 'fa-shopping-cart text-primary',
                                    'wallet' => 'fa-wallet text-success',
                                    'product' => 'fa-box text-info',
                                    'system' => 'fa-cog text-warning',
                                    default => 'fa-bell text-secondary'
                                };
                            ?>
                            <i class="fas <?php echo e($iconClass); ?> fa-2x"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1"><?php echo e($notification->title); ?></h6>
                            <p class="text-muted mb-2"><?php echo e($notification->message); ?></p>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <?php echo e(\Carbon\Carbon::parse($notification->created_at)->diffForHumans()); ?>

                            </small>
                        </div>
                        <?php if(!$notification->read_at): ?>
                        <span class="badge bg-primary">جديد</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-5">
                    <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                    <p class="text-muted">لا توجد إشعارات</p>
                </div>
                <?php endif; ?>
            </div>
            <?php if($notifications->hasPages()): ?>
            <div class="card-footer">
                <?php echo e($notifications->links()); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.notification-item.unread {
    background-color: #f8f9fa;
}
.notification-item:hover {
    background-color: #f1f3f5;
}
.notification-icon {
    width: 50px;
    text-align: center;
}
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('mawgood-vendor::layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Vendor\src\Resources\views\notifications\index.blade.php ENDPATH**/ ?>