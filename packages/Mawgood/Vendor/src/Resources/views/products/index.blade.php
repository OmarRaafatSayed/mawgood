@extends('vendor.layouts.app')

@section('title', 'إدارة المنتجات')
@section('page-title', 'إدارة المنتجات')
@section('page-icon', '<i class="fas fa-box me-2"></i>')

@section('header-actions')
<div class="d-flex gap-2">
    <a href="{{ route('vendor.products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>إضافة منتج جديد
    </a>
    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#bulkActionsModal">
        <i class="fas fa-tasks me-2"></i>إجراءات مجمعة
    </button>
</div>
@endsection

@section('content')
<!-- Product Statistics -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">إجمالي المنتجات</h6>
                        <h2 class="mb-0" id="total-products">{{ $stats['products']['total'] ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-box fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">منتجات نشطة</h6>
                        <h2 class="mb-0" id="active-products">{{ $stats['products']['active'] ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-check-circle fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">في الانتظار</h6>
                        <h2 class="mb-0" id="pending-products">{{ $stats['products']['inactive'] ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-clock fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-danger text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">مخزون منخفض</h6>
                        <h2 class="mb-0" id="low-stock-products">{{ $stats['products']['low_stock'] ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-exclamation-triangle fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filters and Search -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">البحث</label>
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="اسم المنتج أو SKU">
            </div>
            <div class="col-md-2">
                <label class="form-label">الحالة</label>
                <select class="form-select" name="status">
                    <option value="">جميع الحالات</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>نشط</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>غير نشط</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>في الانتظار</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">المخزون</label>
                <select class="form-select" name="stock">
                    <option value="">جميع المستويات</option>
                    <option value="in_stock" {{ request('stock') == 'in_stock' ? 'selected' : '' }}>متوفر</option>
                    <option value="low" {{ request('stock') == 'low' ? 'selected' : '' }}>منخفض</option>
                    <option value="out" {{ request('stock') == 'out' ? 'selected' : '' }}>نفد</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">الفئة</label>
                <select class="form-select" name="category">
                    <option value="">جميع الفئات</option>
                    <!-- Categories will be populated dynamically -->
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>بحث
                    </button>
                    <a href="{{ route('vendor.products.index') }}" class="btn btn-outline-secondary">
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
            <small class="text-muted">عرض {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} من {{ $products->total() ?? 0 }}</small>
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
                        <th>SKU</th>
                        <th>السعر</th>
                        <th>المخزون</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th width="120">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products ?? [] as $product)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input product-checkbox" value="{{ $product->id }}">
                        </td>
                        <td>
                            <img src="{{ $product->image_url ?? asset('images/placeholder.png') }}" 
                                 alt="{{ $product->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>
                            <div>
                                <h6 class="mb-1">{{ $product->name ?? 'منتج' }}</h6>
                                <small class="text-muted">{{ Str::limit($product->description ?? '', 50) }}</small>
                            </div>
                        </td>
                        <td><code>{{ $product->sku ?? 'N/A' }}</code></td>
                        <td>
                            <strong>{{ number_format($product->price ?? 0, 2) }} جنيه</strong>
                        </td>
                        <td>
                            @php
                                $stock = $product->quantity ?? 0;
                                $stockClass = $stock > 10 ? 'success' : ($stock > 0 ? 'warning' : 'danger');
                                $stockText = $stock > 0 ? $stock : 'نفد';
                            @endphp
                            <span class="badge bg-{{ $stockClass }}">{{ $stockText }}</span>
                        </td>
                        <td>
                            @php
                                $status = $product->status ?? 0;
                                $statusClass = $status == 1 ? 'success' : 'warning';
                                $statusText = $status == 1 ? 'نشط' : 'في الانتظار';
                            @endphp
                            <span class="badge bg-{{ $statusClass }}">{{ $statusText }}</span>
                        </td>
                        <td>{{ $product->created_at ? \Carbon\Carbon::parse($product->created_at)->format('Y-m-d') : 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('vendor.products.show', $product->id) }}" class="btn btn-sm btn-outline-info" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('vendor.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteProduct({{ $product->id }})" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <i class="fas fa-box fa-3x text-muted mb-3"></i>
                            <p class="text-muted">لا توجد منتجات</p>
                            <a href="{{ route('vendor.products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>إضافة منتج جديد
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($products) && $products->hasPages())
    <div class="card-footer">
        {{ $products->links() }}
    </div>
    @endif
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
@endsection

@push('scripts')
<script>
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
    
    if (action === 'delete') {
        if (!confirm('هل أنت متأكد من حذف المنتجات المحددة؟')) {
            return;
        }
        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("vendor.products.mass_delete") }}';
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);
        
        selectedProducts.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ids[]';
            input.value = id;
            form.appendChild(input);
        });
        
        document.body.appendChild(form);
        form.submit();
    }
    
    // TODO: Handle other bulk actions (activate, deactivate, update_price, update_stock)
}

// Delete single product
function deleteProduct(productId) {
    if (!confirm('هل أنت متأكد من حذف هذا المنتج؟')) {
        return;
    }
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("vendor.products.mass_delete") }}';
    
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

// Auto-refresh stats every 30 seconds
setInterval(function() {
    fetch('{{ route("vendor.api.dashboard.stats") }}')
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
@endpush