@extends('vendor.layouts.app')

@section('title', 'المحفظة والمالية')
@section('page-title', 'المحفظة والمالية')
@section('page-icon', '<i class="fas fa-wallet me-2"></i>')

@section('header-actions')
<div class="d-flex gap-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#withdrawalModal">
        <i class="fas fa-money-bill-wave me-2"></i>طلب سحب
    </button>
    <button class="btn btn-outline-primary" onclick="exportTransactions()">
        <i class="fas fa-download me-2"></i>تصدير المعاملات
    </button>
</div>
@endsection

@section('content')
<!-- Wallet Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-4">
        <div class="card stats-card bg-gradient-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">الرصيد المتاح</h6>
                        <h2 class="mb-0" id="available-balance">{{ number_format($stats['wallet']['available'] ?? 0, 2) }}</h2>
                        <small>جنيه مصري</small>
                    </div>
                    <i class="fas fa-coins fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card stats-card bg-gradient-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">رصيد محجوز</h6>
                        <h2 class="mb-0" id="unavailable-balance">{{ number_format($stats['wallet']['unavailable'] ?? 0, 2) }}</h2>
                        <small>في انتظار التحويل</small>
                    </div>
                    <i class="fas fa-lock fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card stats-card bg-gradient-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">طلبات السحب المعلقة</h6>
                        <h2 class="mb-0" id="pending-withdrawals">{{ number_format($stats['wallet']['pending_payouts'] ?? 0, 2) }}</h2>
                        <small>قيد المراجعة</small>
                    </div>
                    <i class="fas fa-hourglass-half fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings Chart -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">تحليل الأرباح</h5>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="period" id="period-week" checked>
                    <label class="btn btn-outline-primary btn-sm" for="period-week">أسبوع</label>
                    <input type="radio" class="btn-check" name="period" id="period-month">
                    <label class="btn btn-outline-primary btn-sm" for="period-month">شهر</label>
                    <input type="radio" class="btn-check" name="period" id="period-year">
                    <label class="btn btn-outline-primary btn-sm" for="period-year">سنة</label>
                </div>
            </div>
            <div class="card-body">
                <canvas id="earningsChart" height="300"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">ملخص الأرباح</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span>إجمالي الأرباح:</span>
                    <strong class="text-success">{{ number_format($stats['revenue']['total'] ?? 0, 2) }} جنيه</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span>أرباح هذا الشهر:</span>
                    <strong class="text-primary">{{ number_format($stats['revenue']['monthly'] ?? 0, 2) }} جنيه</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span>عمولة المنصة:</span>
                    <span class="text-muted">5%</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>صافي الأرباح:</strong></span>
                    <strong class="text-success">{{ number_format(($stats['revenue']['total'] ?? 0) * 0.95, 2) }} جنيه</strong>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">طرق السحب</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-university text-primary me-2"></i>
                            <span>تحويل بنكي</span>
                        </div>
                        <small class="text-muted">1-3 أيام</small>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-mobile-alt text-success me-2"></i>
                            <span>محفظة إلكترونية</span>
                        </div>
                        <small class="text-muted">فوري</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Transaction History -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">سجل المعاملات</h5>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" id="transaction-filter">
                <option value="">جميع المعاملات</option>
                <option value="earning">أرباح</option>
                <option value="withdrawal">سحب</option>
                <option value="commission">عمولة</option>
                <option value="refund">استرداد</option>
            </select>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>التاريخ</th>
                        <th>النوع</th>
                        <th>الوصف</th>
                        <th>المبلغ</th>
                        <th>الحالة</th>
                        <th>الرصيد بعد المعاملة</th>
                    </tr>
                </thead>
                <tbody id="transactions-tbody">
                    @forelse($transactions ?? [] as $transaction)
                    <tr>
                        <td>{{ $transaction->created_at ? $transaction->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>
                            @php
                                $typeConfig = [
                                    'earning' => ['icon' => 'fas fa-plus-circle', 'class' => 'success', 'text' => 'ربح'],
                                    'withdrawal' => ['icon' => 'fas fa-minus-circle', 'class' => 'danger', 'text' => 'سحب'],
                                    'commission' => ['icon' => 'fas fa-percentage', 'class' => 'warning', 'text' => 'عمولة'],
                                    'refund' => ['icon' => 'fas fa-undo', 'class' => 'info', 'text' => 'استرداد']
                                ];
                                $config = $typeConfig[$transaction->type ?? 'earning'] ?? $typeConfig['earning'];
                            @endphp
                            <i class="{{ $config['icon'] }} text-{{ $config['class'] }} me-2"></i>
                            {{ $config['text'] }}
                        </td>
                        <td>{{ $transaction->description ?? 'معاملة' }}</td>
                        <td>
                            <span class="text-{{ $transaction->amount > 0 ? 'success' : 'danger' }}">
                                {{ $transaction->amount > 0 ? '+' : '' }}{{ number_format($transaction->amount ?? 0, 2) }} جنيه
                            </span>
                        </td>
                        <td>
                            @php
                                $status = $transaction->status ?? 'completed';
                                $statusConfig = [
                                    'completed' => ['class' => 'success', 'text' => 'مكتمل'],
                                    'pending' => ['class' => 'warning', 'text' => 'معلق'],
                                    'failed' => ['class' => 'danger', 'text' => 'فشل']
                                ];
                                $sConfig = $statusConfig[$status] ?? $statusConfig['completed'];
                            @endphp
                            <span class="badge bg-{{ $sConfig['class'] }}">{{ $sConfig['text'] }}</span>
                        </td>
                        <td>{{ number_format($transaction->balance_after ?? 0, 2) }} جنيه</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-receipt fa-3x text-muted mb-3"></i>
                            <p class="text-muted">لا توجد معاملات</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($transactions) && $transactions->hasPages())
    <div class="card-footer">
        {{ $transactions->links() }}
    </div>
    @endif
</div>

<!-- Withdrawal Request Modal -->
<div class="modal fade" id="withdrawalModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">طلب سحب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="withdrawal-form">
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        الرصيد المتاح للسحب: <strong>{{ number_format($stats['wallet']['available'] ?? 0, 2) }} جنيه</strong>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">المبلغ المطلوب سحبه</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="amount" step="0.01" min="10" max="{{ $stats['wallet']['available'] ?? 0 }}" required>
                            <span class="input-group-text">جنيه</span>
                        </div>
                        <small class="text-muted">الحد الأدنى للسحب: 10 جنيه</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">طريقة السحب</label>
                        <select class="form-select" name="method" required>
                            <option value="">اختر طريقة السحب</option>
                            <option value="bank_transfer">تحويل بنكي</option>
                            <option value="mobile_wallet">محفظة إلكترونية</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="bank-details" style="display: none;">
                        <label class="form-label">تفاصيل البنك</label>
                        <input type="text" class="form-control mb-2" name="bank_name" placeholder="اسم البنك">
                        <input type="text" class="form-control mb-2" name="account_number" placeholder="رقم الحساب">
                        <input type="text" class="form-control" name="account_holder" placeholder="اسم صاحب الحساب">
                    </div>
                    
                    <div class="mb-3" id="wallet-details" style="display: none;">
                        <label class="form-label">تفاصيل المحفظة الإلكترونية</label>
                        <select class="form-select mb-2" name="wallet_type">
                            <option value="">اختر نوع المحفظة</option>
                            <option value="vodafone_cash">فودافون كاش</option>
                            <option value="orange_money">أورانج موني</option>
                            <option value="etisalat_cash">اتصالات كاش</option>
                        </select>
                        <input type="text" class="form-control" name="wallet_number" placeholder="رقم المحفظة">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">ملاحظات (اختياري)</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="أضف أي ملاحظات إضافية"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">إرسال طلب السحب</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let earningsChart = null;

// Initialize earnings chart
function initEarningsChart() {
    const ctx = document.getElementById('earningsChart').getContext('2d');
    
    earningsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'الأرباح اليومية',
                data: [],
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + ' جنيه';
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y + ' جنيه';
                        }
                    }
                }
            }
        }
    });
    
    loadEarningsData('week');
}

// Load earnings data
function loadEarningsData(period) {
    fetch(`{{ route("vendor.wallet.earnings_chart") }}?period=${period}`)
        .then(response => response.json())
        .then(data => {
            earningsChart.data.labels = data.labels;
            earningsChart.data.datasets[0].data = data.values;
            earningsChart.update();
        })
        .catch(error => console.error('Error loading earnings data:', error));
}

// Period change handlers
document.querySelectorAll('input[name="period"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.checked) {
            loadEarningsData(this.id.replace('period-', ''));
        }
    });
});

// Withdrawal method change handler
document.querySelector('select[name="method"]').addEventListener('change', function() {
    const bankDetails = document.getElementById('bank-details');
    const walletDetails = document.getElementById('wallet-details');
    
    bankDetails.style.display = this.value === 'bank_transfer' ? 'block' : 'none';
    walletDetails.style.display = this.value === 'mobile_wallet' ? 'block' : 'none';
});

// Withdrawal form submission
document.getElementById('withdrawal-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const amount = parseFloat(formData.get('amount'));
    const availableBalance = {{ $stats['wallet']['available'] ?? 0 }};
    
    if (amount < 10) {
        alert('الحد الأدنى للسحب هو 10 جنيه');
        return;
    }
    
    if (amount > availableBalance) {
        alert('المبلغ المطلوب أكبر من الرصيد المتاح');
        return;
    }
    
    showLoading();
    
    fetch('{{ route("vendor.wallet.withdrawal") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showToast('تم إرسال طلب السحب بنجاح', 'success');
            bootstrap.Modal.getInstance(document.getElementById('withdrawalModal')).hide();
            location.reload();
        } else {
            showToast(data.message || 'حدث خطأ أثناء إرسال الطلب', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showToast('حدث خطأ أثناء إرسال الطلب', 'error');
    });
});

// Transaction filter
document.getElementById('transaction-filter').addEventListener('change', function() {
    const filterValue = this.value;
    const rows = document.querySelectorAll('#transactions-tbody tr');
    
    rows.forEach(row => {
        if (!filterValue || row.dataset.type === filterValue) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Export transactions
function exportTransactions() {
    const params = new URLSearchParams(window.location.search);
    params.set('export', 'excel');
    
    window.location.href = `{{ route("vendor.wallet.transactions") }}?${params.toString()}`;
}

// Auto-refresh wallet stats
setInterval(function() {
    fetch('{{ route("vendor.api.dashboard.stats") }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('available-balance').textContent = (data.wallet?.available ?? 0).toFixed(2);
            document.getElementById('unavailable-balance').textContent = (data.wallet?.unavailable ?? 0).toFixed(2);
            document.getElementById('pending-withdrawals').textContent = (data.wallet?.pending_payouts ?? 0).toFixed(2);
        })
        .catch(error => console.error('Error updating wallet stats:', error));
}, 30000);

// Initialize chart when page loads
document.addEventListener('DOMContentLoaded', function() {
    initEarningsChart();
});
</script>
@endpush