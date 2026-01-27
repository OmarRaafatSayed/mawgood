@extends('vendor.layouts.app')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم')
@section('page-icon', '<i class="fas fa-tachometer-alt me-2"></i>')

@section('content')
<!-- Welcome Message -->
@if($vendor)
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>
        مرحباً {{ $vendor->business_name ?? 'التاجر' }}
    </div>
@endif

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card bg-gradient-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">إجمالي المنتجات</h6>
                                <h2 class="mb-0">{{ $stats['products']['total'] ?? 0 }}</h2>
                                <small>نشط: {{ $stats['products']['active'] ?? 0 }} | غير نشط: {{ $stats['products']['inactive'] ?? 0 }}</small>
                                <div class="mt-2">
                                    <small class="text-warning">منخفض: {{ $stats['products']['low_stock'] ?? 0 }}</small>
                                    <small class="text-danger ms-3">انتهى المخزون: {{ $stats['products']['out_of_stock'] ?? 0 }}</small>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-box fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card bg-gradient-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">إجمالي الطلبات</h6>
                                <h2 class="mb-0">{{ $stats['orders']['total'] ?? 0 }}</h2>
                                <small>معلق: {{ $stats['orders']['pending'] ?? 0 }} · غير مشحونة: {{ $stats['orders']['unshipped'] ?? 0 }}</small>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card bg-gradient-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">إجمالي الإيرادات</h6>
                                <h2 class="mb-0">{{ number_format($stats['revenue']['total'] ?? 0, 2) }}</h2>
                                <small>{{ $stats['revenue']['currency'] ?? 'EGP' }}</small>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-dollar-sign fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card bg-gradient-info text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">رصيد المحفظة</h6>
                            <h2 class="mb-0">{{ number_format($stats['wallet']['available'] ?? 0, 2) }}</h2>
                            <small>محجوز: {{ number_format($stats['wallet']['unavailable'] ?? 0, 2) }}</small>
                        </div>
                        <div class="align-self-center text-end">
                            <i class="fas fa-wallet fa-2x opacity-75"></i>
                            <div class="mt-2">
                                <a href="{{ $stats['wallet']['request_payout_url'] ?? '#' }}" class="btn btn-sm btn-light mt-2">طلب سحب</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory & Orders & Sales -->
        <div class="row g-4 mb-4">
            <!-- Inventory Management -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">إدارة المخزون</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">حالة المنتجات: نشط / غير نشط / نفد المخزون. التنبيهات للمخزون المنخفض.</p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="inventory-table">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>الاسم</th>
                                        <th>الحالة</th>
                                        <th>الكمية</th>
                                        <th>ملاحظة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">يتم تحميل بيانات المخزون...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Fulfillment Center -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">مركز تنفيذ الطلبات</h5>
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#orders-pending" data-bs-toggle="tab">معلق <span class="badge bg-light text-dark ms-2">{{ $stats['orders']['pending'] ?? 0 }}</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#orders-unshipped" data-bs-toggle="tab">غير مشحون <span class="badge bg-light text-dark ms-2">{{ $stats['orders']['unshipped'] ?? 0 }}</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#orders-shipped" data-bs-toggle="tab">مشحون <span class="badge bg-light text-dark ms-2">{{ $stats['orders']['shipped'] ?? 0 }}</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#orders-cancelled" data-bs-toggle="tab">ملغي <span class="badge bg-light text-dark ms-2">{{ $stats['orders']['cancelled'] ?? 0 }}</span></a></li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="orders-pending">
                            <p class="text-muted">عرض الطلبات المعلقة...</p>
                            <div id="orders-pending-list">جارٍ التحميل...</div>
                        </div>
                        <div class="tab-pane" id="orders-unshipped">
                            <p class="text-muted">عرض الطلبات غير المشحونة...</p>
                            <div id="orders-unshipped-list">جارٍ التحميل...</div>
                        </div>
                        <div class="tab-pane" id="orders-shipped">
                            <p class="text-muted">عرض الطلبات المشحونة...</p>
                            <div id="orders-shipped-list">جارٍ التحميل...</div>
                        </div>
                        <div class="tab-pane" id="orders-cancelled">
                            <p class="text-muted">عرض الطلبات الملغاة...</p>
                            <div id="orders-cancelled-list">جارٍ التحميل...</div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">مبيعات و تحليلات</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart" height="120"></canvas>
                        <p class="mt-3 mb-0">الوحدات المباعة: <strong id="units-sold">{{ $stats['units_sold'] ?? 0 }}</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="row">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-clock me-2"></i>
                            الطلبات الأخيرة
                        </h5>
                    </div>
                    <div class="card-body">
                        @if(isset($stats['recent_orders']) && count($stats['recent_orders']) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>العميل</th>
                                            <th>المبلغ</th>
                                            <th>الحالة</th>
                                            <th>التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stats['recent_orders'] as $order)
                                            <tr>
                                                <td>#{{ $order->increment_id ?? $order->id }}</td>
                                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                                <td>{{ number_format($order->total_amount, 2) }} EGP</td>
                                                <td>
                                                    <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'info') }}">
                                                        {{ $order->status }}
                                                    </span>
                                                </td>
                                                <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">لا توجد طلبات حديثة</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star me-2"></i>
                            أفضل المنتجات مبيعاً
                        </h5>
                    </div>
                    <div class="card-body">
                        @if(isset($stats['top_products']) && count($stats['top_products']) > 0)
                            @foreach($stats['top_products'] as $product)
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-1">{{ $product->name ?? 'منتج' }}</h6>
                                        <small class="text-muted">{{ $product->sku }}</small>
                                    </div>
                                    <span class="badge bg-primary">{{ $product->total_sold ?? 0 }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-chart-bar fa-3x text-muted mb-3"></i>
                                <p class="text-muted">لا توجد بيانات مبيعات</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-bolt me-2"></i>
                            إجراءات سريعة
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <a href="{{ route('vendor.products.index') }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-box me-2"></i>
                                    إدارة المنتجات
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('vendor.orders.index') }}" class="btn btn-outline-success w-100">
                                    <i class="fas fa-shopping-cart me-2"></i>
                                    إدارة الطلبات
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('vendor.wallet.index') }}" class="btn btn-outline-warning w-100">
                                    <i class="fas fa-wallet me-2"></i>
                                    المحفظة
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('vendor.settings.index') }}" class="btn btn-outline-info w-100">
                                    <i class="fas fa-cog me-2"></i>
                                    الإعدادات
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const statsUrl = '{{ route("vendor.api.dashboard.stats") }}';
        let salesChartInstance = null;

        function fetchStats() {
            fetch(statsUrl)
                .then(response => response.json())
                .then(data => {
                    console.log('Stats updated:', data);
                    // Update counters
                    document.querySelectorAll('.stats-card h2').forEach(el => {});
                    document.querySelectorAll('.card .card-title');

                    // Update inventory summary
                    document.querySelector('#units-sold').textContent = data['units_sold'] ?? 0;

                    // Update wallet numbers
                    const walletCard = document.querySelector('.card.stats-card.bg-gradient-info');
                    if (walletCard) {
                        walletCard.querySelector('h2').textContent = (data['wallet']['available'] ?? 0).toFixed(2);
                    }

                    // Populate sales chart
                    const labels = data['sales_chart'].map(d => d.date);
                    const values = data['sales_chart'].map(d => d.sales);

                    const ctx = document.getElementById('salesChart').getContext('2d');
                    if (salesChartInstance) {
                        salesChartInstance.data.labels = labels;
                        salesChartInstance.data.datasets[0].data = values;
                        salesChartInstance.update();
                    } else {
                        salesChartInstance = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Daily Sales',
                                    data: values,
                                    borderColor: '#007bff',
                                    backgroundColor: 'rgba(0,123,255,0.1)',
                                    fill: true,
                                    tension: 0.25
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    x: { display: true },
                                    y: { display: true }
                                }
                            }
                        });
                    }

                    // Orders lists (quick counts, full lists can be implemented later)
                    document.getElementById('orders-pending-list').innerHTML = '<p>عدد الطلبات المعلقة: ' + (data['orders']['pending'] ?? 0) + '</p>';
                    document.getElementById('orders-unshipped-list').innerHTML = '<p>عدد الطلبات غير المشحونة: ' + (data['orders']['unshipped'] ?? 0) + '</p>';
                    document.getElementById('orders-shipped-list').innerHTML = '<p>عدد الطلبات المشحونة: ' + (data['orders']['shipped'] ?? 0) + '</p>';
                    document.getElementById('orders-cancelled-list').innerHTML = '<p>عدد الطلبات الملغاة: ' + (data['orders']['cancelled'] ?? 0) + '</p>';

                    // Inventory table placeholder (detailed endpoint can populate rows)
                    const invTbody = document.querySelector('#inventory-table tbody');
                    invTbody.innerHTML = '';
                    invTbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">استخدم صفحة إدارة المنتجات لعرض عناصر مفصلة أو اطلب واجهة API مخصصة</td></tr>';

                })
                .catch(error => console.error('Error updating stats:', error));
        }

        // Initial fetch and polling
        fetchStats();
        setInterval(fetchStats, 30000);
    </script>
@endpush