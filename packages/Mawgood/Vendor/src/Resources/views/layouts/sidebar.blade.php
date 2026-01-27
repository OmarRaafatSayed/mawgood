<!-- Vendor Dashboard Sidebar -->
<div class="sidebar bg-dark text-white" id="vendorSidebar">
    <div class="sidebar-header p-3 border-bottom border-secondary">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/logo_white.svg') }}" alt="Logo" class="me-2" style="height: 30px;">
            <h5 class="mb-0">لوحة التاجر</h5>
        </div>
        <button class="btn btn-sm btn-outline-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarContent">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="sidebar-content collapse d-md-block" id="sidebarContent">
        <!-- Vendor Info -->
        <div class="p-3 border-bottom border-secondary">
            <div class="d-flex align-items-center">
                <div class="avatar bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                    <i class="fas fa-store text-white"></i>
                </div>
                <div>
                    <h6 class="mb-0">{{ auth('customer')->user()->first_name ?? 'التاجر' }}</h6>
                    <small class="text-muted">{{ $vendor->store_name ?? 'متجر' }}</small>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="nav flex-column p-2">
            <!-- 1. Dashboard (Statistics) -->
            <div class="nav-section mb-3">
                <a href="{{ route('vendor.dashboard') }}" class="nav-link text-white d-flex align-items-center {{ request()->routeIs('vendor.dashboard*') ? 'active bg-primary rounded' : '' }}">
                    <i class="fas fa-tachometer-alt me-3"></i>
                    <span>لوحة التحكم</span>
                    <div class="ms-auto">
                        <span class="badge bg-info" id="dashboard-notifications">{{ $stats['orders']['pending'] ?? 0 }}</span>
                    </div>
                </a>
                @if(request()->routeIs('vendor.dashboard*'))
                <div class="submenu ms-4 mt-2">
                    <a href="{{ route('vendor.dashboard') }}#statistics" class="nav-link text-light small">
                        <i class="fas fa-chart-bar me-2"></i>الإحصائيات
                    </a>
                    <a href="{{ route('vendor.dashboard') }}#performance" class="nav-link text-light small">
                        <i class="fas fa-chart-line me-2"></i>الأداء
                    </a>
                </div>
                @endif
            </div>

            <!-- 2. Product Management -->
            <div class="nav-section mb-3">
                <a href="{{ route('vendor.products.index') }}" class="nav-link text-white d-flex align-items-center {{ request()->routeIs('vendor.products*') ? 'active bg-primary rounded' : '' }}">
                    <i class="fas fa-box me-3"></i>
                    <span>إدارة المنتجات</span>
                    <div class="ms-auto">
                        <span class="badge bg-warning" id="products-count">{{ $stats['products']['total'] ?? 0 }}</span>
                    </div>
                </a>
                @if(request()->routeIs('vendor.products*'))
                <div class="submenu ms-4 mt-2">
                    <a href="{{ route('vendor.products.index') }}" class="nav-link text-light small">
                        <i class="fas fa-list me-2"></i>جميع المنتجات
                    </a>
                    <a href="{{ route('vendor.products.create') }}" class="nav-link text-light small">
                        <i class="fas fa-plus me-2"></i>إضافة منتج
                    </a>
                    <a href="{{ route('vendor.products.index') }}?status=pending" class="nav-link text-light small">
                        <i class="fas fa-clock me-2"></i>في الانتظار
                        <span class="badge bg-warning ms-2">{{ $stats['products']['inactive'] ?? 0 }}</span>
                    </a>
                    <a href="{{ route('vendor.products.index') }}?stock=low" class="nav-link text-light small">
                        <i class="fas fa-exclamation-triangle me-2"></i>مخزون منخفض
                        <span class="badge bg-danger ms-2">{{ $stats['products']['low_stock'] ?? 0 }}</span>
                    </a>
                </div>
                @endif
            </div>

            <!-- 3. Sales & Order Management -->
            <div class="nav-section mb-3">
                <a href="{{ route('vendor.orders.index') }}" class="nav-link text-white d-flex align-items-center {{ request()->routeIs('vendor.orders*') ? 'active bg-primary rounded' : '' }}">
                    <i class="fas fa-shopping-cart me-3"></i>
                    <span>إدارة الطلبات</span>
                    <div class="ms-auto">
                        <span class="badge bg-success" id="orders-count">{{ $stats['orders']['total'] ?? 0 }}</span>
                    </div>
                </a>
                @if(request()->routeIs('vendor.orders*'))
                <div class="submenu ms-4 mt-2">
                    <a href="{{ route('vendor.orders.index') }}" class="nav-link text-light small">
                        <i class="fas fa-list me-2"></i>جميع الطلبات
                    </a>
                    <a href="{{ route('vendor.orders.index') }}?status=pending" class="nav-link text-light small">
                        <i class="fas fa-clock me-2"></i>معلقة
                        <span class="badge bg-warning ms-2">{{ $stats['orders']['pending'] ?? 0 }}</span>
                    </a>
                    <a href="{{ route('vendor.orders.index') }}?status=processing" class="nav-link text-light small">
                        <i class="fas fa-cog me-2"></i>قيد المعالجة
                        <span class="badge bg-info ms-2">{{ $stats['orders']['unshipped'] ?? 0 }}</span>
                    </a>
                    <a href="{{ route('vendor.orders.index') }}?status=shipped" class="nav-link text-light small">
                        <i class="fas fa-truck me-2"></i>مشحونة
                        <span class="badge bg-success ms-2">{{ $stats['orders']['shipped'] ?? 0 }}</span>
                    </a>
                </div>
                @endif
            </div>

            <!-- 4. Wallet & Finance -->
            <div class="nav-section mb-3">
                <a href="{{ route('vendor.wallet.index') }}" class="nav-link text-white d-flex align-items-center {{ request()->routeIs('vendor.wallet*') ? 'active bg-primary rounded' : '' }}">
                    <i class="fas fa-wallet me-3"></i>
                    <span>المحفظة والمالية</span>
                    <div class="ms-auto">
                        <span class="badge bg-success" id="wallet-balance">{{ number_format($stats['wallet']['available'] ?? 0, 0) }}</span>
                    </div>
                </a>
                @if(request()->routeIs('vendor.wallet*'))
                <div class="submenu ms-4 mt-2">
                    <a href="{{ route('vendor.wallet.index') }}" class="nav-link text-light small">
                        <i class="fas fa-eye me-2"></i>عرض الرصيد
                    </a>
                    <a href="{{ route('vendor.wallet.withdrawal') }}" class="nav-link text-light small">
                        <i class="fas fa-money-bill-wave me-2"></i>طلب سحب
                    </a>
                    <a href="{{ route('vendor.wallet.transactions') }}" class="nav-link text-light small">
                        <i class="fas fa-history me-2"></i>سجل المعاملات
                    </a>
                    <a href="{{ route('vendor.wallet.earnings_chart') }}" class="nav-link text-light small">
                        <i class="fas fa-chart-area me-2"></i>تحليل الأرباح
                    </a>
                </div>
                @endif
            </div>

            <!-- 5. Store Settings -->
            <div class="nav-section mb-3">
                <a href="{{ route('vendor.settings.index') }}" class="nav-link text-white d-flex align-items-center {{ request()->routeIs('vendor.settings*') ? 'active bg-primary rounded' : '' }}">
                    <i class="fas fa-store me-3"></i>
                    <span>إعدادات المتجر</span>
                </a>
                @if(request()->routeIs('vendor.settings*'))
                <div class="submenu ms-4 mt-2">
                    <a href="{{ route('vendor.settings.index') }}" class="nav-link text-light small">
                        <i class="fas fa-user me-2"></i>الملف الشخصي
                    </a>
                    <a href="{{ route('vendor.settings.index') }}#store-info" class="nav-link text-light small">
                        <i class="fas fa-info-circle me-2"></i>معلومات المتجر
                    </a>
                    <a href="{{ route('vendor.settings.index') }}#contact" class="nav-link text-light small">
                        <i class="fas fa-address-book me-2"></i>معلومات الاتصال
                    </a>
                    <a href="{{ route('vendor.settings.index') }}#business-hours" class="nav-link text-light small">
                        <i class="fas fa-clock me-2"></i>ساعات العمل
                    </a>
                </div>
                @endif
            </div>

            <!-- 6. Notifications System -->
            <div class="nav-section mb-3">
                <a href="{{ route('vendor.notifications.index') }}" class="nav-link text-white d-flex align-items-center {{ request()->routeIs('vendor.notifications*') ? 'active bg-primary rounded' : '' }}">
                    <i class="fas fa-bell me-3"></i>
                    <span>الإشعارات</span>
                    <div class="ms-auto">
                        <span class="badge bg-danger" id="notifications-count">{{ $unreadNotifications ?? 0 }}</span>
                    </div>
                </a>
            </div>

            <!-- Divider -->
            <hr class="border-secondary">

            <!-- Additional Links -->
            <div class="nav-section">
                <a href="{{ route('vendor.store') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-home me-3"></i>
                    <span>العودة للمتجر</span>
                </a>
                <form method="POST" action="{{ route('vendor.logout') }}" id="vendor-logout-form">
                    @csrf
                    <a href="#" 
                       onclick="event.preventDefault(); document.getElementById('vendor-logout-form').submit();" 
                       class="nav-link text-white d-flex align-items-center">
                        <i class="fas fa-sign-out-alt me-3"></i>
                        <span>تسجيل الخروج</span>
                    </a>
                </form>
            </div>
        </nav>
    </div>
</div>

<!-- Notifications Modal -->
<div class="modal fade" id="notificationsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-bell me-2"></i>
                    الإشعارات
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="notifications-container">
                    <!-- New Orders -->
                    <div class="notification-item border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="notification-icon bg-success rounded-circle p-2 me-3">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">طلبات جديدة</h6>
                                <p class="mb-1 text-muted">لديك {{ $stats['orders']['pending'] ?? 0 }} طلب جديد في انتظار المعالجة</p>
                                <small class="text-muted">منذ دقائق</small>
                            </div>
                            <span class="badge bg-success">{{ $stats['orders']['pending'] ?? 0 }}</span>
                        </div>
                    </div>

                    <!-- Product Approval -->
                    <div class="notification-item border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="notification-icon bg-warning rounded-circle p-2 me-3">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">موافقة على المنتجات</h6>
                                <p class="mb-1 text-muted">تم الموافقة على 3 منتجات من قبل الإدارة</p>
                                <small class="text-muted">منذ ساعة</small>
                            </div>
                        </div>
                    </div>

                    <!-- Withdrawal Status -->
                    <div class="notification-item border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="notification-icon bg-info rounded-circle p-2 me-3">
                                <i class="fas fa-money-bill-wave text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">حالة طلب السحب</h6>
                                <p class="mb-1 text-muted">تم معالجة طلب السحب بقيمة 500 جنيه</p>
                                <small class="text-muted">منذ يوم</small>
                            </div>
                        </div>
                    </div>

                    <!-- Low Stock Alert -->
                    <div class="notification-item">
                        <div class="d-flex align-items-start">
                            <div class="notification-icon bg-danger rounded-circle p-2 me-3">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">تنبيه مخزون منخفض</h6>
                                <p class="mb-1 text-muted">{{ $stats['products']['low_stock'] ?? 0 }} منتج لديه مخزون منخفض</p>
                                <small class="text-muted">منذ يومين</small>
                            </div>
                            <span class="badge bg-danger">{{ $stats['products']['low_stock'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">تحديد الكل كمقروء</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<style>
.sidebar {
    width: 280px;
    min-height: 100vh;
    position: fixed;
    top: 0;
    right: 0;
    z-index: 1000;
    transition: transform 0.3s ease;
}

.sidebar-content {
    height: calc(100vh - 80px);
    overflow-y: auto;
}

.nav-link {
    padding: 12px 16px;
    margin: 2px 0;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: translateX(-5px);
}

.nav-link.active {
    background-color: #007bff !important;
    box-shadow: 0 2px 4px rgba(0, 123, 255, 0.3);
}

.submenu .nav-link {
    padding: 8px 12px;
    font-size: 0.9em;
}

.notification-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.badge {
    font-size: 0.75em;
}

@media (max-width: 768px) {
    .sidebar {
        transform: translateX(100%);
        width: 100%;
    }
    
    .sidebar.show {
        transform: translateX(0);
    }
}

/* Main content adjustment */
.main-content {
    margin-right: 280px;
    transition: margin-right 0.3s ease;
}

@media (max-width: 768px) {
    .main-content {
        margin-right: 0;
    }
}
</style>

<script>
// Real-time updates for sidebar badges
function updateSidebarStats() {
    fetch('{{ route("vendor.api.dashboard.stats") }}')
        .then(response => response.json())
        .then(data => {
            // Update badges
            document.getElementById('dashboard-notifications').textContent = data.orders?.pending ?? 0;
            document.getElementById('products-count').textContent = data.products?.total ?? 0;
            document.getElementById('orders-count').textContent = data.orders?.total ?? 0;
            document.getElementById('wallet-balance').textContent = Math.floor(data.wallet?.available ?? 0);
            document.getElementById('notifications-count').textContent = 
                (data.orders?.pending ?? 0) + (data.products?.low_stock ?? 0);
        })
        .catch(error => console.error('Error updating sidebar stats:', error));
}

// Update every 30 seconds
setInterval(updateSidebarStats, 30000);

// Mobile sidebar toggle
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('vendorSidebar');
    const toggleBtn = document.querySelector('[data-bs-target="#sidebarContent"]');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
});
</script>
