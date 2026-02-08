@extends('mawgood-vendor::layouts.app')

@section('title', 'إدارة الطلبات')
@section('page-title')
    <i class="fas fa-shopping-cart me-2"></i>إدارة الطلبات
@endsection

@section('header-actions')
<div class="d-flex gap-2 desktop-actions">
    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bulkOrdersModal">
        <i class="fas fa-tasks me-2"></i>إجراءات مجمعة
    </button>
    <button class="btn btn-success" onclick="exportOrders()">
        <i class="fas fa-download me-2"></i>تصدير
    </button>
</div>
@endsection

@section('content')
<style>
.order-card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    margin-bottom: 12px;
    background: #fff;
}
.order-card-header {
    padding: 12px 16px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.order-card-body {
    padding: 12px 16px;
}
.order-card-footer {
    padding: 12px 16px;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.sticky-filter-bar {
    position: sticky;
    top: 0;
    z-index: 1020;
    background: #fff;
    padding: 12px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 16px;
}
.mobile-filter-drawer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-radius: 16px 16px 0 0;
    box-shadow: 0 -4px 12px rgba(0,0,0,0.15);
    transform: translateY(100%);
    transition: transform 0.3s ease;
    z-index: 1040;
    max-height: 70vh;
    overflow-y: auto;
}
.mobile-filter-drawer.active {
    transform: translateY(0);
}
.filter-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1035;
    display: none;
}
.filter-backdrop.active {
    display: block;
}
@media (max-width: 768px) {
    .stats-card {
        margin-bottom: 12px;
    }
    .desktop-actions {
        display: none !important;
    }
    .card-header-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    .card-header-tabs .nav-item {
        white-space: nowrap;
    }
    .table-responsive {
        display: none;
    }
    .order-cards-container {
        display: block;
    }
    .order-info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .order-info-label {
        color: #6c757d;
        font-size: 13px;
    }
    .order-info-value {
        font-weight: 500;
    }
    .action-btn {
        min-width: 44px;
        min-height: 44px;
        padding: 8px;
    }
}
@media (min-width: 769px) {
    .order-cards-container {
        display: none;
    }
    .sticky-filter-bar {
        display: none;
    }
}
</style>

<!-- Sticky Filter Bar (Mobile Only) -->
<div class="sticky-filter-bar d-md-none">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $orders->total() ?? 0 }}</strong> <span class="text-muted">طلب</span>
        </div>
        <button class="btn btn-outline-primary btn-sm" onclick="toggleFilterDrawer()">
            <i class="fas fa-filter me-1"></i>فلتر
        </button>
    </div>
</div>

<!-- Order Statistics -->
<div class="row g-3 mb-4">
    <div class="col-lg-3 col-6">
        <div class="card stats-card bg-gradient-warning text-white">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1" style="font-size: 14px;">معلقة</h6>
                        <h3 class="mb-0">{{ $stats['orders']['pending'] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-clock fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="card stats-card bg-gradient-info text-white">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1" style="font-size: 14px;">قيد المعالجة</h6>
                        <h3 class="mb-0">{{ $stats['orders']['unshipped'] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-cog fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="card stats-card bg-gradient-success text-white">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1" style="font-size: 14px;">مشحونة</h6>
                        <h3 class="mb-0">{{ $stats['orders']['shipped'] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-truck fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="card stats-card bg-gradient-primary text-white">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1" style="font-size: 14px;">إجمالي</h6>
                        <h3 class="mb-0">{{ $stats['orders']['total'] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Status Tabs -->
<div class="card mb-3 d-none d-md-block">
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
        </ul>
    </div>
</div>

<!-- Filters (Desktop) -->
<div class="card mb-3 d-none d-md-block">
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

<!-- Mobile Filter Drawer -->
<div class="filter-backdrop" onclick="toggleFilterDrawer()"></div>
<div class="mobile-filter-drawer" id="filterDrawer">
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">فلتر الطلبات</h5>
            <button class="btn-close" onclick="toggleFilterDrawer()"></button>
        </div>
        <form method="GET" id="mobileFilterForm">
            <div class="mb-3">
                <label class="form-label">البحث</label>
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="رقم الطلب أو اسم العميل">
            </div>
            <div class="mb-3">
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
            <div class="mb-3">
                <label class="form-label">من تاريخ</label>
                <input type="date" class="form-control" name="date_from" value="{{ request('date_from') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">إلى تاريخ</label>
                <input type="date" class="form-control" name="date_to" value="{{ request('date_to') }}">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-fill">
                    <i class="fas fa-search me-2"></i>تطبيق
                </button>
                <a href="{{ route('vendor.orders.index') }}" class="btn btn-outline-secondary flex-fill">
                    <i class="fas fa-times me-2"></i>مسح
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Orders Table (Desktop) -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">قائمة الطلبات</h5>
        <small class="text-muted">عرض {{ $orders->firstItem() ?? 0 }} - {{ $orders->lastItem() ?? 0 }} من {{ $orders->total() ?? 0 }}</small>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50"><input type="checkbox" class="form-check-input" id="select-all-orders"></th>
                        <th>رقم الطلب</th>
                        <th>العميل</th>
                        <th>المنتجات</th>
                        <th>المبلغ</th>
                        <th>الحالة</th>
                        <th>التاريخ</th>
                        <th width="200">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders ?? [] as $order)
                    <tr>
                        <td><input type="checkbox" class="form-check-input order-checkbox" value="{{ $order->id }}"></td>
                        <td><strong>#{{ $order->increment_id ?? $order->id }}</strong></td>
                        <td>
                            <div>
                                <h6 class="mb-0">{{ $order->customer_name ?? 'عميل' }}</h6>
                                <small class="text-muted">{{ $order->customer_email ?? '' }}</small>
                            </div>
                        </td>
                        <td>{!! '<span class="badge bg-info">' . ($order->items_count ?? 0) . ' منتج</span>' !!}</td>
                        <td><strong>{{ number_format($order->total_amount ?? 0, 2) }} جنيه</strong></td>
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
                            {!! '<span class="badge bg-' . $config['class'] . '">' . $config['text'] . '</span>' !!}
                        </td>
                        <td>{{ $order->created_at ? $order->created_at->format('Y-m-d') : 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('vendor.orders.show', $order->id) }}" class="btn btn-sm btn-outline-info" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($status == 'pending')
                                <button type="button" class="btn btn-sm btn-outline-success" onclick="updateOrderStatus({{ $order->id }}, 'processing')" title="قبول">
                                    <i class="fas fa-check"></i>
                                </button>
                                @endif
                                @if($status == 'processing')
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="updateOrderStatus({{ $order->id }}, 'shipped')" title="شحن">
                                    <i class="fas fa-truck"></i>
                                </button>
                                @endif
                                <a href="{{ route('vendor.orders.invoice', $order->id) }}" class="btn btn-sm btn-outline-secondary" title="طباعة">
                                    <i class="fas fa-print"></i>
                                </a>
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
    
    <!-- Mobile Cards -->
    <div class="order-cards-container p-3">
        @forelse($orders ?? [] as $order)
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
        <div class="order-card">
            <div class="order-card-header">
                <div>
                    <strong>#{{ $order->increment_id ?? $order->id }}</strong>
                    <div><small class="text-muted">{{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : 'N/A' }}</small></div>
                </div>
                {!! '<span class="badge bg-' . $config['class'] . '">' . $config['text'] . '</span>' !!}
            </div>
            <div class="order-card-body">
                <div class="order-info-row">
                    <span class="order-info-label">العميل</span>
                    <span class="order-info-value">{{ $order->customer_name ?? 'عميل' }}</span>
                </div>
                <div class="order-info-row">
                    <span class="order-info-label">المنتجات</span>
                    <span class="order-info-value">{!! '<span class="badge bg-info">' . ($order->items_count ?? 0) . ' منتج</span>' !!}</span>
                </div>
                <div class="order-info-row">
                    <span class="order-info-label">المبلغ الإجمالي</span>
                    <span class="order-info-value"><strong>{{ number_format($order->total_amount ?? 0, 2) }} جنيه</strong></span>
                </div>
            </div>
            <div class="order-card-footer">
                <a href="{{ route('vendor.orders.show', $order->id) }}" class="btn btn-sm btn-outline-info action-btn">
                    <i class="fas fa-eye"></i>
                </a>
                <div class="d-flex gap-2">
                    @if($status == 'pending')
                    <button type="button" class="btn btn-sm btn-outline-success action-btn" onclick="updateOrderStatus({{ $order->id }}, 'processing')">
                        <i class="fas fa-check"></i>
                    </button>
                    @endif
                    @if($status == 'processing')
                    <button type="button" class="btn btn-sm btn-outline-primary action-btn" onclick="updateOrderStatus({{ $order->id }}, 'shipped')">
                        <i class="fas fa-truck"></i>
                    </button>
                    @endif
                    <a href="{{ route('vendor.orders.invoice', $order->id) }}" class="btn btn-sm btn-outline-secondary action-btn">
                        <i class="fas fa-print"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
            <p class="text-muted">لا توجد طلبات</p>
        </div>
        @endforelse
    </div>
    
    @if(isset($orders) && $orders->hasPages())
    <div class="card-footer">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function toggleFilterDrawer() {
    const drawer = document.getElementById('filterDrawer');
    const backdrop = document.querySelector('.filter-backdrop');
    drawer.classList.toggle('active');
    backdrop.classList.toggle('active');
}

document.getElementById('select-all-orders')?.addEventListener('change', function() {
    document.querySelectorAll('.order-checkbox').forEach(cb => cb.checked = this.checked);
});

function updateOrderStatus(orderId, status) {
    if (!confirm('هل تريد تحديث حالة الطلب؟')) return;
    
    fetch(`{{ route("vendor.orders.index") }}/${orderId}/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('حدث خطأ أثناء تحديث الحالة');
        }
    })
    .catch(() => alert('حدث خطأ أثناء تحديث الحالة'));
}

function exportOrders() {
    const params = new URLSearchParams(window.location.search);
    params.set('export', 'excel');
    window.location.href = `{{ route("vendor.orders.index") }}?${params.toString()}`;
}
</script>
@endpush
