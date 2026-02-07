<?php $__env->startSection('title', 'إدارة المنتجات'); ?>

<?php $__env->startSection('header-actions'); ?>
<div class="d-flex gap-2 align-items-center">
    <div class="search-box d-none d-md-block">
        <input type="text" class="form-control" id="quick-search" placeholder="بحث سريع..." style="min-width: 250px;">
    </div>
    <a href="<?php echo e(route('vendor.products.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>إضافة منتج
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Filters and Search -->
<div class="card mb-4 filters-card">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-12 col-md-3">
                <label class="form-label">البحث</label>
                <input type="text" class="form-control" name="search" value="<?php echo e(request('search')); ?>" placeholder="اسم المنتج أو SKU">
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">الموافقة</label>
                <select class="form-select" id="filter-approval">
                    <option value="">الكل</option>
                    <option value="pending">معلق</option>
                    <option value="approved">موافق</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">الحالة</label>
                <select class="form-select" id="filter-operational">
                    <option value="">الكل</option>
                    <option value="active">نشط</option>
                    <option value="disabled">معطل</option>
                </select>
            </div>
            <div class="col-12 col-md-2 d-none d-md-block">
                <label class="form-label">الفئة</label>
                <select class="form-select" name="category">
                    <option value="">جميع الفئات</option>
                    <?php $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label d-none d-md-block">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">
                        <i class="fas fa-search me-2"></i>بحث
                    </button>
                    <a href="<?php echo e(route('vendor.products.index')); ?>" class="btn btn-outline-secondary flex-fill">
                        <i class="fas fa-times me-2"></i>مسح
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Products Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">قائمة المنتجات</h5>
        <div class="d-flex align-items-center gap-3">
            <small class="text-muted">عرض <?php echo e($products->count()); ?> منتج</small>
            <div class="btn-group" role="group">
                <input type="radio" class="btn-check" name="view" id="table-view" checked>
                <label class="btn btn-outline-primary btn-sm" for="table-view">
                    <i class="fas fa-list"></i>
                </label>
                <input type="radio" class="btn-check" name="view" id="grid-view">
                <label class="btn btn-outline-primary btn-sm" for="grid-view">
                    <i class="fas fa-th"></i>
                </label>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="products-table">
                <thead class="table-light">
                    <tr>
                        <th width="50">
                            <input type="checkbox" class="form-check-input" id="select-all">
                        </th>
                        <th>الصورة</th>
                        <th>اسم المنتج</th>
                        <th class="d-none d-lg-table-cell">SKU</th>
                        <th>السعر</th>
                        <th>المخزون</th>
                        <th>حالة الموافقة</th>
                        <th>الحالة</th>
                        <th class="d-none d-lg-table-cell">الظهور</th>
                        <th class="d-none d-lg-table-cell">التاريخ</th>
                        <th width="120">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-approval="<?php echo e($product->approved_by_admin ? 'approved' : 'pending'); ?>" 
                        data-operational="<?php echo e($product->status == 1 ? 'active' : 'disabled'); ?>">
                        <td>
                            <input type="checkbox" class="form-check-input product-checkbox" value="<?php echo e($product->id); ?>">
                        </td>
                        <td>
                            <img src="<?php echo e($product->image_url ?? asset('images/placeholder.png')); ?>" 
                                 alt="<?php echo e($product->name); ?>" class="product-thumb" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        </td>
                        <td>
                            <div>
                                <h6 class="mb-1"><?php echo e($product->name ?? 'منتج'); ?></h6>
                                <small class="text-muted d-none d-md-block"><?php echo e(Str::limit($product->description ?? '', 50)); ?></small>
                            </div>
                        </td>
                        <td class="d-none d-lg-table-cell"><code><?php echo e($product->sku ?? 'N/A'); ?></code></td>
                        <td>
                            <strong><?php echo e(number_format($product->price ?? 0, 2)); ?></strong>
                        </td>
                        <td>
                            <?php
                                $stock = $product->quantity ?? 0;
                                $stockClass = $stock > 10 ? 'success' : ($stock > 0 ? 'warning' : 'danger');
                                $stockText = $stock > 0 ? $stock : 'نفد';
                            ?>
                            <span class="badge bg-<?php echo e($stockClass); ?>"><?php echo e($stockText); ?></span>
                        </td>
                        <td>
                            <?php
                                $approved = $product->approved_by_admin ?? 0;
                                $approvalClass = $approved ? 'success' : 'warning';
                                $approvalText = $approved ? 'موافق' : 'معلق';
                            ?>
                            <span class="badge bg-<?php echo e($approvalClass); ?>"><?php echo e($approvalText); ?></span>
                        </td>
                        <td>
                            <?php
                                $status = $product->status ?? 0;
                                $statusClass = $status == 1 ? 'success' : 'secondary';
                                $statusText = $status == 1 ? 'نشط' : 'معطل';
                            ?>
                            <span class="badge bg-<?php echo e($statusClass); ?>"><?php echo e($statusText); ?></span>
                        </td>
                        <td class="d-none d-lg-table-cell">
                            <?php
                                $isVisible = $approved && $status == 1 && ($product->visible_individually ?? 1);
                                $visibilityClass = $isVisible ? 'primary' : 'dark';
                                $visibilityText = $isVisible ? 'ظاهر' : 'مخفي';
                            ?>
                            <span class="badge bg-<?php echo e($visibilityClass); ?>"><?php echo e($visibilityText); ?></span>
                        </td>
                        <td class="d-none d-lg-table-cell"><?php echo e($product->created_at ? $product->created_at->format('Y-m-d') : 'N/A'); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" style="z-index: 1;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="z-index: 1050;">
                                    <li><a class="dropdown-item" href="<?php echo e(route('vendor.products.show', $product->id)); ?>"><i class="fas fa-eye me-2"></i>عرض</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('vendor.products.edit', $product->id)); ?>"><i class="fas fa-edit me-2"></i>تعديل</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteProduct(<?php echo e($product->id); ?>); return false;"><i class="fas fa-trash me-2"></i>حذف</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="11" class="text-center py-4">
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
        
        <!-- Mobile Card View -->
        <div class="mobile-product-card p-3">
            <?php $__empty_1 = true; $__currentLoopData = $products ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="product-card">
                <div class="product-card-header">
                    <?php
                        $imageUrl = $product->image_url ?? $product->images->first()?->url ?? asset('images/placeholder.png');
                    ?>
                    <img src="<?php echo e($imageUrl); ?>" 
                         alt="<?php echo e($product->name); ?>" 
                         class="product-card-thumb"
                         onerror="this.src='<?php echo e(asset('images/placeholder.png')); ?>'">
                    <div class="product-card-info">
                        <div class="product-card-title"><?php echo e($product->name ?? 'منتج'); ?></div>
                        <div class="product-card-sku"><?php echo e($product->sku ?? 'N/A'); ?></div>
                    </div>
                </div>
                <div class="product-card-body">
                    <div class="product-card-field">
                        <span class="product-card-label">السعر</span>
                        <span class="product-card-value"><?php echo e(number_format($product->price ?? 0, 0)); ?> ج</span>
                    </div>
                    <div class="product-card-field">
                        <span class="product-card-label">المخزون</span>
                        <?php
                            $stock = $product->quantity ?? $product->inventories->sum('qty') ?? 0;
                            $stockClass = $stock > 10 ? 'success' : ($stock > 0 ? 'warning' : 'danger');
                            $stockText = $stock > 0 ? $stock : 'نفد';
                        ?>
                        <span class="badge bg-<?php echo e($stockClass); ?>"><?php echo e($stockText); ?></span>
                    </div>
                    <div class="product-card-field">
                        <span class="product-card-label">الموافقة</span>
                        <?php
                            $approved = $product->approved_by_admin ?? 0;
                            $approvalClass = $approved ? 'success' : 'warning';
                            $approvalText = $approved ? 'موافق' : 'معلق';
                        ?>
                        <span class="badge bg-<?php echo e($approvalClass); ?>"><?php echo e($approvalText); ?></span>
                    </div>
                    <div class="product-card-field">
                        <span class="product-card-label">الحالة</span>
                        <?php
                            $status = $product->status ?? 0;
                            $statusClass = $status == 1 ? 'success' : 'secondary';
                            $statusText = $status == 1 ? 'نشط' : 'معطل';
                        ?>
                        <span class="badge bg-<?php echo e($statusClass); ?>"><?php echo e($statusText); ?></span>
                    </div>
                </div>
                <div class="product-card-actions">
                    <a href="<?php echo e(route('vendor.products.edit', $product->id)); ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>تعديل
                    </a>
                    <button class="btn btn-danger" onclick="deleteProduct(<?php echo e($product->id); ?>)">
                        <i class="fas fa-trash me-2"></i>حذف
                    </button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-4x text-muted mb-3 d-block"></i>
                <p class="text-muted mb-3">لا توجد منتجات</p>
                <a href="<?php echo e(route('vendor.products.create')); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus me-2"></i>إضافة منتج جديد
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if(isset($products) && method_exists($products, 'hasPages') && $products->hasPages()): ?>
    <div class="card-footer">
        <?php echo e($products->links()); ?>

    </div>
    <?php endif; ?>
</div>

<!-- Bulk Actions Modal -->
<div class="modal fade" id="bulkActionsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">الإجراءات المجمعة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="bulk-actions-form">
                    <div class="mb-3">
                        <label class="form-label">اختر الإجراء</label>
                        <select class="form-select" name="action" required>
                            <option value="">اختر إجراء</option>
                            <option value="activate">تفعيل المنتجات</option>
                            <option value="deactivate">إلغاء تفعيل المنتجات</option>
                            <option value="update_price">تحديث الأسعار</option>
                            <option value="update_stock">تحديث المخزون</option>
                            <option value="delete">حذف المنتجات</option>
                        </select>
                    </div>
                    <div class="mb-3" id="price-update-field" style="display: none;">
                        <label class="form-label">نسبة التغيير في السعر (%)</label>
                        <input type="number" class="form-control" name="price_change" step="0.01">
                        <small class="text-muted">أدخل رقم موجب للزيادة أو سالب للتقليل</small>
                    </div>
                    <div class="mb-3" id="stock-update-field" style="display: none;">
                        <label class="form-label">الكمية الجديدة</label>
                        <input type="number" class="form-control" name="new_stock" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="executeBulkAction()">تنفيذ</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Quick search
document.getElementById('quick-search')?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#products-table tbody tr[data-approval]');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// Client-side filtering
document.getElementById('filter-approval').addEventListener('change', filterProducts);
document.getElementById('filter-operational').addEventListener('change', filterProducts);

function filterProducts() {
    const approval = document.getElementById('filter-approval').value;
    const operational = document.getElementById('filter-operational').value;
    const rows = document.querySelectorAll('#products-table tbody tr:not(:last-child)');
    
    rows.forEach(row => {
        const matchApproval = !approval || row.dataset.approval === approval;
        const matchOperational = !operational || row.dataset.operational === operational;
        row.style.display = (matchApproval && matchOperational) ? '' : 'none';
    });
}

// Select all functionality
document.getElementById('select-all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.product-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Bulk actions form handling
document.querySelector('select[name="action"]').addEventListener('change', function() {
    const priceField = document.getElementById('price-update-field');
    const stockField = document.getElementById('stock-update-field');
    
    priceField.style.display = this.value === 'update_price' ? 'block' : 'none';
    stockField.style.display = this.value === 'update_stock' ? 'block' : 'none';
});

// Execute bulk action
function executeBulkAction() {
    const selectedProducts = Array.from(document.querySelectorAll('.product-checkbox:checked')).map(cb => cb.value);
    
    if (selectedProducts.length === 0) {
        alert('يرجى اختيار منتج واحد على الأقل');
        return;
    }
    
    const form = document.getElementById('bulk-actions-form');
    const formData = new FormData(form);
    const action = formData.get('action');
    
    if (!action) {
        alert('يرجى اختيار إجراء');
        return;
    }
    
    if (action === 'delete' && !confirm('هل أنت متأكد من حذف المنتجات المحددة؟')) {
        return;
    }
    
    showLoading();
    
    fetch('<?php echo e(route("vendor.products.mass_delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            products: selectedProducts,
            action: action,
            price_change: formData.get('price_change'),
            new_stock: formData.get('new_stock')
        })
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showToast('تم تنفيذ الإجراء بنجاح', 'success');
            location.reload();
        } else {
            showToast('حدث خطأ أثناء تنفيذ الإجراء', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showToast('حدث خطأ أثناء تنفيذ الإجراء', 'error');
    });
}

// Delete single product
function deleteProduct(productId) {
    if (!confirm('هل أنت متأكد من حذف هذا المنتج؟')) {
        return;
    }
    
    showLoading();
    
    fetch(`<?php echo e(route("vendor.products.index")); ?>/${productId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showToast('تم حذف المنتج بنجاح', 'success');
            location.reload();
        } else {
            showToast('حدث خطأ أثناء حذف المنتج', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showToast('حدث خطأ أثناء حذف المنتج', 'error');
    });
}

// Auto-refresh stats every 30 seconds
setInterval(function() {
    fetch('<?php echo e(route("vendor.api.dashboard.stats")); ?>')
        .then(response => response.json())
        .then(data => {
            document.getElementById('total-products').textContent = data.products?.total ?? 0;
            document.getElementById('active-products').textContent = data.products?.active ?? 0;
            document.getElementById('pending-products').textContent = data.products?.inactive ?? 0;
            document.getElementById('low-stock-products').textContent = data.products?.low_stock ?? 0;
        })
        .catch(error => console.error('Error updating stats:', error));
}, 30000);
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
<style>
[dir="rtl"] .table { direction: rtl; text-align: right; }

.table thead th {
    background: #f8f9fa;
    font-weight: 600;
    border-bottom: 2px solid #dee2e6;
    white-space: nowrap;
}

.table tbody tr {
    transition: background 0.2s;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

.product-thumb {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.badge {
    font-size: 0.85rem;
    padding: 0.35em 0.65em;
}

.dropdown-menu {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    border: 1px solid #dee2e6;
}

.mobile-product-card {
    display: none;
}

@media (max-width: 767px) {
    .card-body .table-responsive {
        display: none !important;
    }
    
    .mobile-product-card {
        display: block !important;
    }
    
    .card-header .btn-group {
        display: none;
    }
    
    .card-header h5 {
        font-size: 1rem;
    }
    
    .product-card {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    
    .product-card-header {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .product-card-thumb {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .product-card-info {
        flex: 1;
        min-width: 0;
    }
    
    .product-card-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: #212529;
        line-height: 1.3;
    }
    
    .product-card-sku {
        font-size: 0.8rem;
        color: #6c757d;
        font-family: 'Courier New', monospace;
        background: #f8f9fa;
        padding: 2px 6px;
        border-radius: 4px;
        display: inline-block;
    }
    
    .product-card-body {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 12px;
    }
    
    .product-card-field {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 6px;
    }
    
    .product-card-label {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 4px;
        display: block;
        font-weight: 500;
    }
    
    .product-card-value {
        font-weight: 600;
        font-size: 0.95rem;
        color: #212529;
    }
    
    .product-card-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }
    
    .product-card-actions .btn {
        width: 100%;
        min-height: 48px;
        font-size: 0.95rem;
        font-weight: 600;
        border-radius: 8px;
    }
    
    .filters-card .card-body {
        padding: 10px;
    }
    
    .filters-card .col-md-3,
    .filters-card .col-md-2 {
        margin-bottom: 10px;
    }
    
    .filters-card .form-label {
        font-size: 0.85rem;
        margin-bottom: 5px;
    }
    
    .filters-card .form-control,
    .filters-card .form-select {
        min-height: 44px;
        font-size: 0.95rem;
    }
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('vendor.layouts.app', ['pageTitle' => 'إدارة المنتجات', 'pageIcon' => '<i class="fas fa-box me-2"></i>'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/vendor/products/index.blade.php ENDPATH**/ ?>