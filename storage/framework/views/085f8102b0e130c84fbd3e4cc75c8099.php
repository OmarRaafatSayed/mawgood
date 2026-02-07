<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'لوحة تحكم التاجر'); ?> - <?php echo e(config('app.name')); ?></title>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .main-content {
            margin-right: 280px;
            min-height: 100vh;
            transition: margin-right 0.3s ease;
        }
        
        .page-header {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }
        
        .stats-card {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .bg-gradient-primary { background: linear-gradient(45deg, #007bff, #0056b3); }
        .bg-gradient-success { background: linear-gradient(45deg, #28a745, #1e7e34); }
        .bg-gradient-warning { background: linear-gradient(45deg, #ffc107, #e0a800); }
        .bg-gradient-info { background: linear-gradient(45deg, #17a2b8, #138496); }
        .bg-gradient-danger { background: linear-gradient(45deg, #dc3545, #c82333); }
        
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        
        .btn {
            border-radius: 8px;
            min-height: 44px;
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        .modal-content {
            border-radius: 15px;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
        }
        
        .breadcrumb-item + .breadcrumb-item::before {
            content: "←";
        }

        /* Mobile Responsive */
        @media (max-width: 767px) {
            [dir="rtl"] body { direction: rtl; }
            
            .main-content {
                margin-right: 0;
                width: 100vw;
                overflow-x: hidden;
            }
            
            .page-header {
                padding: 10px;
            }
            
            .page-header h1 {
                font-size: 1.2rem;
            }
            
            .container-fluid {
                padding: 10px;
            }
            
            /* Stats Cards - Stack Vertically */
            .stats-card .card-body {
                padding: 15px;
            }
            
            .stats-card h2 {
                font-size: 1.5rem;
            }
            
            .stats-card h6 {
                font-size: 0.9rem;
            }
            
            /* Tables to Cards */
            .table-responsive {
                display: none;
            }
            
            .mobile-card-view {
                display: block !important;
            }
            
            .mobile-product-card {
                background: white;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                padding: 15px;
                margin-bottom: 10px;
            }
            
            .mobile-product-card .product-name {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 8px;
            }
            
            .mobile-product-card .product-attr {
                display: flex;
                justify-content: space-between;
                padding: 5px 0;
                border-bottom: 1px solid #f0f0f0;
            }
            
            .mobile-product-card .product-attr:last-child {
                border-bottom: none;
            }
            
            /* Buttons Full Width */
            .btn {
                width: 100%;
                min-height: 48px;
                font-size: 1rem;
                margin-bottom: 10px;
            }
            
            .btn-group .btn {
                width: auto;
            }
            
            /* Form Inputs */
            input, select, textarea {
                min-height: 48px;
                font-size: 16px;
            }
            
            /* Navigation Links */
            .nav-link {
                min-height: 48px;
                display: flex;
                align-items: center;
            }
            
            /* Modal Full Screen */
            .modal-dialog {
                margin: 0;
                max-width: 100%;
                height: 100vh;
            }
            
            .modal-content {
                height: 100vh;
                border-radius: 0;
            }
            
            /* RTL Dropdowns */
            [dir="rtl"] .dropdown-menu {
                right: 0;
                left: auto;
                text-align: right;
            }
            
            /* Hide Desktop Elements */
            .d-none.d-lg-flex {
                display: none !important;
            }
            
            /* Tabs Scrollable */
            .nav-pills {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .nav-pills .nav-link {
                white-space: nowrap;
                min-height: 44px;
            }
        }
        
        .mobile-card-view {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Include Sidebar -->
    <?php echo $__env->make('vendor.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Mobile Menu Toggle -->
                        <button class="btn btn-primary d-md-none me-3" type="button" onclick="toggleSidebar()" style="min-height: 44px;">
                            <i class="fas fa-bars"></i>
                        </button>
                        
                        <!-- Breadcrumb -->
                        <?php if(isset($breadcrumbs)): ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->last): ?>
                                        <li class="breadcrumb-item active"><?php echo e($breadcrumb['title']); ?></li>
                                    <?php else: ?>
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e($breadcrumb['url']); ?>"><?php echo e($breadcrumb['title']); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                        </nav>
                        <?php endif; ?>
                        
                        <!-- Page Title -->
                        <h1 class="h3 mb-0 mt-2">
                            <i class="<?php echo e(str_replace(['<i class="', '"></i>'], '', $pageIcon ?? 'fas fa-tachometer-alt')); ?> me-2"></i>
                            <?php echo e($pageTitle ?? 'لوحة التحكم'); ?>

                        </h1>
                    </div>
                    
                    <!-- Header Actions -->
                    <div class="col-auto">
                        <?php echo $__env->yieldContent('header-actions'); ?>
                        
                        <!-- Quick Stats -->
                        <div class="d-none d-lg-flex align-items-center">
                            <div class="me-3">
                                <small class="text-muted">الطلبات المعلقة</small>
                                <div class="fw-bold text-warning" id="header-pending-orders"><?php echo e($stats['orders']['pending'] ?? 0); ?></div>
                            </div>
                            <div class="me-3">
                                <small class="text-muted">الرصيد المتاح</small>
                                <div class="fw-bold text-success" id="header-wallet-balance"><?php echo e(number_format($stats['wallet']['available'] ?? 0, 0)); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Page Content -->
        <div class="container-fluid">
            <!-- Flash Messages -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if(session('warning')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?php echo e(session('warning')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if(session('info')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <?php echo e(session('info')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <!-- Main Content Area -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        
        <!-- Footer -->
        <footer class="mt-5 py-4 bg-white border-top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-muted">
                            © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. جميع الحقوق محفوظة.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small class="text-muted">
                            آخر تحديث: <span id="last-update"><?php echo e(now()->format('H:i')); ?></span>
                        </small>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50" style="z-index: 9999;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">جاري التحميل...</span>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Global JavaScript -->
    <script>
        // CSRF Token Setup
        window.Laravel = {
            csrfToken: '<?php echo e(csrf_token()); ?>'
        };
        
        // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Mobile Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('vendorSidebar');
            sidebar.classList.toggle('show');
        }
        
        // Loading Overlay Functions
        function showLoading() {
            document.getElementById('loadingOverlay').classList.remove('d-none');
        }
        
        function hideLoading() {
            document.getElementById('loadingOverlay').classList.add('d-none');
        }
        
        // Update header stats
        function updateHeaderStats() {
            fetch('<?php echo e(route("vendor.api.dashboard.stats")); ?>')
                .then(response => response.json())
                .then(data => {
                    const pendingOrders = document.getElementById('header-pending-orders');
                    const walletBalance = document.getElementById('header-wallet-balance');
                    const lastUpdate = document.getElementById('last-update');
                    
                    if (pendingOrders) pendingOrders.textContent = data.orders?.pending ?? 0;
                    if (walletBalance) walletBalance.textContent = Math.floor(data.wallet?.available ?? 0);
                    if (lastUpdate) lastUpdate.textContent = new Date().toLocaleTimeString('ar-EG');
                })
                .catch(error => console.error('Error updating header stats:', error));
        }
        
        // Auto-update stats every 30 seconds
        setInterval(updateHeaderStats, 30000);
        
        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
        
        // Confirm delete actions
        function confirmDelete(message = 'هل أنت متأكد من الحذف؟') {
            return confirm(message);
        }
        
        // Format numbers
        function formatNumber(num) {
            return new Intl.NumberFormat('ar-EG').format(num);
        }
        
        // Format currency
        function formatCurrency(amount, currency = 'EGP') {
            return new Intl.NumberFormat('ar-EG', {
                style: 'currency',
                currency: currency
            }).format(amount);
        }
        
        // Show toast notification
        function showToast(message, type = 'success') {
            const toastHtml = `
                <div class="toast align-items-center text-white bg-${type} border-0" role="alert">
                    <div class="d-flex">
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            
            let toastContainer = document.getElementById('toast-container');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toast-container';
                toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
                toastContainer.style.zIndex = '9999';
                document.body.appendChild(toastContainer);
            }
            
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            const toastElement = toastContainer.lastElementChild;
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
            
            toastElement.addEventListener('hidden.bs.toast', () => {
                toastElement.remove();
            });
        }
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/vendor/layouts/app.blade.php ENDPATH**/ ?>