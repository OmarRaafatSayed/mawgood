@extends('vendor.layouts.app')

@section('title', 'إدارة الطلبات')
@section('page-title', 'إدارة الطلبات')
@section('page-icon', '<i class="fas fa-shopping-cart me-2"></i>')

@section('header-actions')
<div class="d-flex gap-2">
    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bulkOrdersModal">
        <i class="fas fa-tasks me-2"></i>إجراءات مجمعة
    </button>
    <button class="btn btn-success" onclick="exportOrders()">
        <i class="fas fa-download me-2"></i>تصدير
    </button>
</div>
@endsection

@section('content')
<!-- Order Statistics -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">طلبات معلقة</h6>
                        <h2 class="mb-0" id="pending-orders">{{ $stats['orders']['pending'] ?? 0 }}</h2>
                        <small>تحتاج معالجة فورية</small>
                    </div>
                    <i class="fas fa-clock fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">قيد المعالجة</h6>
                        <h2 class="mb-0" id="processing-orders">{{ $stats['orders']['unshipped'] ?? 0 }}</h2>
                        <small>جاهزة للشحن</small>
                    </div>
                    <i class="fas fa-cog fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">مشحونة</h6>
                        <h2 class="mb-0" id="shipped-orders">{{ $stats['orders']['shipped'] ?? 0 }}</h2>
                        <small>في الطريق للعميل</small>
                    </div>
                    <i class="fas fa-truck fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card stats-card bg-gradient-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">إجمالي الطلبات</h6>
                        <h2 class="mb-0" id="total-orders">{{ $stats['orders']['total'] ?? 0 }}</h2>
                        <small>هذا الشهر</small>
                    </div>
                    <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Status Tabs -->
<div class="card mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="orderTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-orders" type="button" role="tab">
                    جميع الطلبات <span class="badge bg-secondary ms-2">{{ $stats['orders']['total'] ?? 0 }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-orders-tab" type="button" role="tab">
                    معلقة <span class="badge bg-warning ms-2">{{ $stats['orders']['pending'] ?? 0 }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing-orders-tab" type="button" role="tab">
                    قيد المعالجة <span class="badge bg-info ms-2">{{ $stats['orders']['unshipped'] ?? 0 }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped-orders-tab" type="button" role="tab">
                    مشحونة <span class="badge bg-success ms-2">{{ $stats['orders']['shipped'] ?? 0 }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled-orders-tab" type="button" role="tab">
                    ملغاة <span class="badge bg-danger ms-2">{{ $stats['orders']['cancelled'] ?? 0 }}</span>
                </button>
            </li>
        </ul>
    </div>
</div>

<!-- Filters and Search -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">البحث</label>
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="رقم الطلب أو اسم العميل">
            </div>
            <div class="col-md-2">
                <label class="form-label">الحالة</label>
                <select class="form-select" name="status">
                    <option value="">جميع الحالات</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>معلق</option>
                    <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>قيد المعالجة</option>
                    <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>مشحون</option>
                    <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>تم التسليم</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">من تاريخ</label>
                <input type="date" class="form-control" name="date_from" value="{{ request('date_from') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">إلى تاريخ</label>
                <input type="date" class="form-control" name="date_to" value="{{ request('date_to') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>بحث
                    </button>
                    <a href="{{ route('vendor.orders.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>مسح
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Orders Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">قائمة الطلبات</h5>
        <div class="d-flex align-items-center gap-3">
            <small class="text-muted">عرض {{ $orders->firstItem() ?? 0 }} - {{ $orders->lastItem() ?? 0 }} من {{ $orders->total() ?? 0 }}</small>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="orders-table">
                <thead class="table-light">
                    <tr>
                        <th width="50">
                            <input type="checkbox" class="form-check-input" id="select-all-orders">
                        </th>
                        <th>رقم الطلب</th>
                        <th>العميل</th>
                        <th>المنتجات</th>
                        <th>المبلغ الإجمالي</th>
                        <th>الحالة</th>
                        <th>تاريخ الطلب</th>
                        <th width="200">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders ?? [] as $order)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input order-checkbox" value="{{ $order->id }}">
                        </td>
                        <td>
                            <strong>#{{ $order->increment_id ?? $order->id }}</strong>
                            <br><small class="text-muted">{{ $order->created_at ? $order->created_at->format('H:i') : '' }}</small>
                        </td>
                        <td>
                            <div>
                                <h6 class="mb-1">{{ $order->customer_name ?? 'عميل' }}</h6>
                                <small class="text-muted">{{ $order->customer_email ?? '' }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $order->items_count ?? 0 }} منتج</span>
                        </td>
                        <td>
                            <strong>{{ number_format($order->total_amount ?? 0, 2) }} جنيه</strong>
                        </td>
                        <td>
                            @php
                                $status = $order->status ?? 'pending';
                                $statusConfig = [
                                    'pending' => ['class' => 'warning', 'text' => 'معلق'],
                                    'processing' => ['class' => 'info', 'text' => 'قيد المعالجة'],
                                    'shipped' => ['class' => 'primary', 'text' => 'مشحون'],
                                    'delivered' => ['class' => 'success', 'text' => 'تم التسليم'],
                                    'cancelled' => ['class' => 'danger', 'text' => 'ملغي']
                                ];
                                $config = $statusConfig[$status] ?? ['class' => 'secondary', 'text' => $status];
                            @endphp
                            <span class="badge bg-{{ $config['class'] }}">{{ $config['text'] }}</span>
                        </td>
                        <td>{{ $order->created_at ? $order->created_at->format('Y-m-d') : 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('vendor.orders.show', $order->id) }}" class="btn btn-sm btn-outline-info" title="عرض التفاصيل">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($status == 'pending')
                                <button type="button" class="btn btn-sm btn-outline-success" onclick="updateOrderStatus({{ $order->id }}, 'processing')" title="قبول الطلب">
                                    <i class="fas fa-check"></i>
                                </button>
                                @endif
                                @if($status == 'processing')
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="updateOrderStatus({{ $order->id }}, 'shipped')" title="شحن الطلب">
                                    <i class="fas fa-truck"></i>
                                </button>
                                @endif
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('vendor.orders.invoice', $order->id) }}">
                                            <i class="fas fa-file-invoice me-2"></i>طباعة الفاتورة
                                        </a></li>
                                        <li><a class="dropdown-item" href="{{ route('vendor.orders.shipping_label', $order->id) }}">
                                            <i class="fas fa-shipping-fast me-2"></i>ملصق الشحن
                                        </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#" onclick="cancelOrder({{ $order->id }})">
                                            <i class="fas fa-times me-2"></i>إلغاء الطلب
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                            <p class="text-muted">لا توجد طلبات</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($orders) && $orders->hasPages())
    <div class="card-footer">
        {{ $orders->links() }}
    </div>
    @endif
</div>

<!-- Bulk Orders Modal -->
<div class="modal fade" id="bulkOrdersModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">الإجراءات المجمعة للطلبات</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="bulk-orders-form">
                    <div class="mb-3">
                        <label class="form-label">اختر الإجراء</label>
                        <select class="form-select" name="action" required>
                            <option value="">اختر إجراء</option>
                            <option value="accept">قبول الطلبات</option>
                            <option value="ship">شحن الطلبات</option>
                            <option value="cancel">إلغاء الطلبات</option>
                            <option value="print_invoices">طباعة الفواتير</option>
                            <option value="generate_labels">إنشاء ملصقات الشحن</option>
                        </select>
                    </div>
                    <div class="mb-3" id="cancel-reason-field" style="display: none;">
                        <label class="form-label">سبب الإلغاء</label>
                        <textarea class="form-control" name="cancel_reason" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="executeBulkOrderAction()">تنفيذ</button>
            </div>
        </div>
    </div>
</div>

<!-- Order Status Update Modal -->
<div class="modal fade" id="statusUpdateModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تحديث حالة الطلب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="status-update-form">
                    <input type="hidden" name="order_id" id="status-order-id">
                    <div class="mb-3">
                        <label class="form-label">الحالة الجديدة</label>
                        <select class="form-select" name="status" id="status-select" required>
                            <option value="pending">معلق</option>
                            <option value="processing">قيد المعالجة</option>
                            <option value="shipped">مشحون</option>
                            <option value="delivered">تم التسليم</option>
                            <option value="cancelled">ملغي</option>
                        </select>
                    </div>
                    <div class="mb-3" id="tracking-field" style="display: none;">
                        <label class="form-label">رقم التتبع</label>
                        <input type="text" class="form-control" name="tracking_number" placeholder="أدخل رقم التتبع">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ملاحظات (اختياري)</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="أضف ملاحظات للعميل"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="confirmStatusUpdate()">تحديث الحالة</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Select all functionality
document.getElementById('select-all-orders').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.order-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Bulk actions form handling
document.querySelector('#bulk-orders-form select[name="action"]').addEventListener('change', function() {
    const cancelField = document.getElementById('cancel-reason-field');
    cancelField.style.display = this.value === 'cancel' ? 'block' : 'none';
});

// Status update form handling
document.getElementById('status-select').addEventListener('change', function() {
    const trackingField = document.getElementById('tracking-field');
    trackingField.style.display = this.value === 'shipped' ? 'block' : 'none';
});

// Update order status
function updateOrderStatus(orderId, status) {
    document.getElementById('status-order-id').value = orderId;
    document.getElementById('status-select').value = status;
    document.getElementById('status-select').dispatchEvent(new Event('change'));
    
    const modal = new bootstrap.Modal(document.getElementById('statusUpdateModal'));
    modal.show();
}

// Confirm status update
function confirmStatusUpdate() {
    const form = document.getElementById('status-update-form');
    const formData = new FormData(form);
    
    showLoading();
    
    fetch(`{{ route("vendor.orders.index") }}/${formData.get('order_id')}/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            status: formData.get('status'),
            tracking_number: formData.get('tracking_number'),
            notes: formData.get('notes')
        })
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showToast('تم تحديث حالة الطلب بنجاح', 'success');
            location.reload();
        } else {
            showToast('حدث خطأ أثناء تحديث الحالة', 'error');
        }
        bootstrap.Modal.getInstance(document.getElementById('statusUpdateModal')).hide();
    })
    .catch(error => {
        hideLoading();
        showToast('حدث خطأ أثناء تحديث الحالة', 'error');
    });
}

// Execute bulk order action
function executeBulkOrderAction() {
    const selectedOrders = Array.from(document.querySelectorAll('.order-checkbox:checked')).map(cb => cb.value);
    
    if (selectedOrders.length === 0) {
        alert('يرجى اختيار طلب واحد على الأقل');
        return;
    }
    
    const form = document.getElementById('bulk-orders-form');
    const formData = new FormData(form);
    const action = formData.get('action');
    
    if (!action) {
        alert('يرجى اختيار إجراء');
        return;
    }
    
    if (action === 'cancel' && !confirm('هل أنت متأكد من إلغاء الطلبات المحددة؟')) {
        return;
    }
    
    showLoading();
    
    // Implementation would depend on your backend routes
    fetch('{{ route("vendor.orders.index") }}/bulk-action', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            orders: selectedOrders,
            action: action,
            cancel_reason: formData.get('cancel_reason')
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
        bootstrap.Modal.getInstance(document.getElementById('bulkOrdersModal')).hide();
    })
    .catch(error => {
        hideLoading();
        showToast('حدث خطأ أثناء تنفيذ الإجراء', 'error');
    });
}

// Cancel order
function cancelOrder(orderId) {
    if (!confirm('هل أنت متأكد من إلغاء هذا الطلب؟')) {
        return;
    }
    
    updateOrderStatus(orderId, 'cancelled');
}

// Export orders
function exportOrders() {
    const params = new URLSearchParams(window.location.search);
    params.set('export', 'excel');
    
    window.location.href = `{{ route("vendor.orders.index") }}?${params.toString()}`;
}

// Auto-refresh stats every 30 seconds
setInterval(function() {
    fetch('{{ route("vendor.api.dashboard.stats") }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('pending-orders').textContent = data.orders?.pending ?? 0;
            document.getElementById('processing-orders').textContent = data.orders?.unshipped ?? 0;
            document.getElementById('shipped-orders').textContent = data.orders?.shipped ?? 0;
            document.getElementById('total-orders').textContent = data.orders?.total ?? 0;
        })
        .catch(error => console.error('Error updating stats:', error));
}, 30000);
</script>
@endpush