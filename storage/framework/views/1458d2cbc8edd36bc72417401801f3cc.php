<?php $__env->startSection('title', 'إدارة المنتجات'); ?>
<?php $__env->startSection('page-title'); ?>
    <i class="fas fa-box me-2"></i>إدارة المنتجات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-actions'); ?>
<div class="d-flex gap-2 header-actions">
    <a href="<?php echo e(route('vendor.products.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>إضافة منتج جديد
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Mobile Search Bar -->
<div class="mobile-search-bar d-md-none">
    <input type="text" class="form-control" placeholder="بحث عن منتج..." id="mobile-search">
    <button class="btn btn-sm btn-outline-primary mt-2" onclick="toggleMobileFilters()">
        <i class="fas fa-filter me-2"></i>فلاتر
    </button>
</div>

<!-- FAB Add Product -->
<a href="<?php echo e(route('vendor.products.create')); ?>" class="fab-add-product d-md-none">
    <i class="fas fa-plus"></i>
</a>

<!-- Products Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="products-table">
                <thead class="table-light">
                    <tr>
                        <th>الصورة</th>
                        <th>اسم المنتج</th>
                        <th>SKU</th>
                        <th>السعر</th>
                        <th>المخزون</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td data-label="الصورة">
                            <?php
                                $imageUrl = $product->image_url ?? asset('images/placeholder.png');
                                if ($product->images->first() && !file_exists(public_path('storage/' . $product->images->first()->path))) {
                                    $imageUrl = asset('images/placeholder.png');
                                }
                            ?>
                            <img src="<?php echo e($imageUrl); ?>" 
                                 alt="<?php echo e($product->name); ?>" 
                                 class="rounded" 
                                 style="width: 50px; height: 50px; object-fit: cover;"
                                 onerror="this.src='<?php echo e(asset('images/placeholder.png')); ?>'">
                        </td>
                        <td data-label="اسم المنتج">
                            <strong><?php echo e($product->name ?? 'منتج'); ?></strong>
                        </td>
                        <td data-label="SKU"><code><?php echo e($product->sku ?? 'N/A'); ?></code></td>
                        <td data-label="السعر">
                            <strong><?php echo e(number_format($product->price ?? 0, 2)); ?> جنيه</strong>
                        </td>
                        <td data-label="المخزون">
                            <?php
                                $stock = $product->quantity ?? 0;
                                $stockClass = $stock > 10 ? 'success' : ($stock > 0 ? 'warning' : 'danger');
                                $stockText = $stock > 0 ? $stock : 'نفد';
                            ?>
                            <?php echo '<span class="badge bg-'.$stockClass.'">'.$stockText.'</span>'; ?>

                        </td>
                        <td data-label="الحالة">
                            <?php
                                $status = $product->status ?? 0;
                                $statusClass = $status == 1 ? 'success' : 'warning';
                                $statusText = $status == 1 ? 'نشط' : 'في الانتظار';
                            ?>
                            <?php echo '<span class="badge bg-'.$statusClass.'">'.$statusText.'</span>'; ?>

                        </td>
                        <td data-label="الإجراءات">
                            <div class="btn-group" role="group">
                                <a href="<?php echo e(route('vendor.products.edit', $product->id)); ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteProduct(<?php echo e($product->id); ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-box fa-3x text-muted mb-3"></i>
                            <p class="text-muted">لا توجد منتجات</p>
                            <a href="<?php echo e(route('vendor.products.create')); ?>" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>إضافة منتج جديد
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if(isset($products) && $products->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($products->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
@media (max-width: 768px) {
    #products-table thead { display: none; }
    #products-table tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background: white;
    }
    #products-table tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem;
        border: none;
        border-bottom: 1px solid #f0f0f0;
    }
    #products-table tbody td:before {
        content: attr(data-label);
        font-weight: bold;
        margin-left: 10px;
    }
    #products-table tbody td:first-child {
        justify-content: center;
        border-bottom: 2px solid #dee2e6;
    }
    #products-table tbody td:last-child {
        border-bottom: none;
        justify-content: center;
    }
    .btn-group { width: 100%; }
    .btn-group .btn { flex: 1; min-width: 44px; min-height: 44px; }
    
    .mobile-search-bar {
        position: sticky;
        top: 0;
        z-index: 1020;
        background: white;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }
    
    .fab-add-product {
        position: fixed;
        bottom: 80px;
        left: 20px;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        font-size: 24px;
        z-index: 1025;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }
    
    .fab-add-product:hover {
        background: #0056b3;
        transform: scale(1.1);
        color: white;
    }
    
    .header-actions { display: none !important; }
}

@media (min-width: 769px) {
    .mobile-search-bar,
    .fab-add-product { display: none !important; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function deleteProduct(productId) {
    if (!confirm('هل أنت متأكد من حذف هذا المنتج؟')) return;
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '<?php echo e(route("vendor.products.mass_delete")); ?>';
    
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.appendChild(csrfInput);
    
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'ids[]';
    input.value = productId;
    form.appendChild(input);
    
    document.body.appendChild(form);
    form.submit();
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('mawgood-vendor::layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/mawgood/packages/Mawgood/Vendor/src/Providers/../Resources/views/products/index.blade.php ENDPATH**/ ?>