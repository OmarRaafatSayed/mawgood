@extends('vendor.layouts.app')

@section('title', 'إعدادات المتجر')
@section('page-title', 'إعدادات المتجر')
@section('page-icon', '<i class="fas fa-store me-2"></i>')

@section('content')
<div class="row">
    <!-- Settings Navigation -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <a href="#profile" class="list-group-item list-group-item-action active" data-bs-toggle="tab">
                        <i class="fas fa-user me-2"></i>الملف الشخصي
                    </a>
                    <a href="#store-info" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        <i class="fas fa-info-circle me-2"></i>معلومات المتجر
                    </a>
                    <a href="#contact" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        <i class="fas fa-address-book me-2"></i>معلومات الاتصال
                    </a>
                    <a href="#business-hours" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        <i class="fas fa-clock me-2"></i>ساعات العمل
                    </a>
                    <a href="#payment-info" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        <i class="fas fa-credit-card me-2"></i>معلومات الدفع
                    </a>
                    <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        <i class="fas fa-bell me-2"></i>إعدادات الإشعارات
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Settings Content -->
    <div class="col-lg-9">
        <div class="tab-content">
            <!-- Profile Tab -->
            <div class="tab-pane fade show active" id="profile">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">الملف الشخصي</h5>
                    </div>
                    <div class="card-body">
                        <form id="profile-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">الاسم الأول</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ auth('customer')->user()->first_name ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">الاسم الأخير</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ auth('customer')->user()->last_name ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" name="email" value="{{ auth('customer')->user()->email ?? '' }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="tel" class="form-control" name="phone" value="{{ auth('customer')->user()->phone ?? '' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">تاريخ الميلاد</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ auth('customer')->user()->date_of_birth ?? '' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">الجنس</label>
                                <select class="form-select" name="gender">
                                    <option value="">اختر الجنس</option>
                                    <option value="male" {{ (auth('customer')->user()->gender ?? '') == 'male' ? 'selected' : '' }}>ذكر</option>
                                    <option value="female" {{ (auth('customer')->user()->gender ?? '') == 'female' ? 'selected' : '' }}>أنثى</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>حفظ التغييرات
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Store Info Tab -->
            <div class="tab-pane fade" id="store-info">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات المتجر</h5>
                    </div>
                    <div class="card-body">
                        <form id="store-form">
                            <div class="mb-3">
                                <label class="form-label">اسم المتجر</label>
                                <input type="text" class="form-control" name="store_name" value="{{ $vendor->store_name ?? '' }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">رابط المتجر</label>
                                <div class="input-group">
                                    <span class="input-group-text">{{ url('/') }}/store/</span>
                                    <input type="text" class="form-control" name="store_slug" value="{{ $vendor->store_slug ?? '' }}" required>
                                </div>
                                <small class="text-muted">يجب أن يكون فريداً ولا يحتوي على مسافات</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">وصف المتجر</label>
                                <textarea class="form-control" name="store_description" rows="4" placeholder="اكتب وصفاً مختصراً عن متجرك">{{ $vendor->store_description ?? '' }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">شعار المتجر</label>
                                <input type="file" class="form-control" name="store_logo" accept="image/*">
                                @if(isset($vendor->store_logo))
                                <div class="mt-2">
                                    <img src="{{ $vendor->store_logo }}" alt="Store Logo" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">صورة غلاف المتجر</label>
                                <input type="file" class="form-control" name="store_banner" accept="image/*">
                                @if(isset($vendor->store_banner))
                                <div class="mt-2">
                                    <img src="{{ $vendor->store_banner }}" alt="Store Banner" class="img-thumbnail" style="max-width: 300px;">
                                </div>
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">فئة المتجر</label>
                                        <select class="form-select" name="store_category">
                                            <option value="">اختر الفئة</option>
                                            <option value="electronics">إلكترونيات</option>
                                            <option value="fashion">أزياء</option>
                                            <option value="home">منزل وحديقة</option>
                                            <option value="books">كتب</option>
                                            <option value="sports">رياضة</option>
                                            <option value="beauty">جمال وعناية</option>
                                            <option value="food">طعام ومشروبات</option>
                                            <option value="other">أخرى</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">سنة التأسيس</label>
                                        <input type="number" class="form-control" name="established_year" min="1900" max="{{ date('Y') }}" value="{{ $vendor->established_year ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>حفظ معلومات المتجر
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info Tab -->
            <div class="tab-pane fade" id="contact">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات الاتصال</h5>
                    </div>
                    <div class="card-body">
                        <form id="contact-form">
                            <div class="mb-3">
                                <label class="form-label">عنوان المتجر</label>
                                <textarea class="form-control" name="address" rows="3" placeholder="العنوان الكامل للمتجر">{{ $vendor->address ?? '' }}</textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">المدينة</label>
                                        <input type="text" class="form-control" name="city" value="{{ $vendor->city ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">المحافظة</label>
                                        <select class="form-select" name="state">
                                            <option value="">اختر المحافظة</option>
                                            <option value="cairo">القاهرة</option>
                                            <option value="giza">الجيزة</option>
                                            <option value="alexandria">الإسكندرية</option>
                                            <option value="qalyubia">القليوبية</option>
                                            <option value="port_said">بورسعيد</option>
                                            <option value="suez">السويس</option>
                                            <option value="luxor">الأقصر</option>
                                            <option value="aswan">أسوان</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">الرمز البريدي</label>
                                        <input type="text" class="form-control" name="postal_code" value="{{ $vendor->postal_code ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">هاتف المتجر</label>
                                        <input type="tel" class="form-control" name="business_phone" value="{{ $vendor->business_phone ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">البريد الإلكتروني للمتجر</label>
                                        <input type="email" class="form-control" name="business_email" value="{{ $vendor->business_email ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">موقع المتجر الإلكتروني</label>
                                <input type="url" class="form-control" name="website" value="{{ $vendor->website ?? '' }}" placeholder="https://example.com">
                            </div>
                            
                            <h6 class="mb-3">وسائل التواصل الاجتماعي</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">فيسبوك</label>
                                        <input type="url" class="form-control" name="facebook" value="{{ $vendor->facebook ?? '' }}" placeholder="https://facebook.com/yourpage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">إنستغرام</label>
                                        <input type="url" class="form-control" name="instagram" value="{{ $vendor->instagram ?? '' }}" placeholder="https://instagram.com/yourpage">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>حفظ معلومات الاتصال
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Business Hours Tab -->
            <div class="tab-pane fade" id="business-hours">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">ساعات العمل</h5>
                    </div>
                    <div class="card-body">
                        <form id="hours-form">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="always-open" name="always_open">
                                    <label class="form-check-label" for="always-open">
                                        المتجر مفتوح 24/7
                                    </label>
                                </div>
                            </div>
                            
                            <div id="business-hours-container">
                                @php
                                    $days = [
                                        'sunday' => 'الأحد',
                                        'monday' => 'الاثنين',
                                        'tuesday' => 'الثلاثاء',
                                        'wednesday' => 'الأربعاء',
                                        'thursday' => 'الخميس',
                                        'friday' => 'الجمعة',
                                        'saturday' => 'السبت'
                                    ];
                                @endphp
                                
                                @foreach($days as $day => $dayName)
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input day-checkbox" type="checkbox" id="{{ $day }}" name="days[]" value="{{ $day }}">
                                            <label class="form-check-label" for="{{ $day }}">
                                                {{ $dayName }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time" class="form-control" name="{{ $day }}_open" placeholder="وقت الفتح">
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <span>إلى</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time" class="form-control" name="{{ $day }}_close" placeholder="وقت الإغلاق">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">المنطقة الزمنية</label>
                                <select class="form-select" name="timezone">
                                    <option value="Africa/Cairo" selected>القاهرة (GMT+2)</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>حفظ ساعات العمل
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Payment Info Tab -->
            <div class="tab-pane fade" id="payment-info">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات الدفع</h5>
                    </div>
                    <div class="card-body">
                        <form id="payment-form">
                            <h6 class="mb-3">معلومات البنك</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">اسم البنك</label>
                                        <input type="text" class="form-control" name="bank_name" value="{{ $vendor->bank_name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">رقم الحساب</label>
                                        <input type="text" class="form-control" name="account_number" value="{{ $vendor->account_number ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">اسم صاحب الحساب</label>
                                        <input type="text" class="form-control" name="account_holder" value="{{ $vendor->account_holder ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">IBAN (اختياري)</label>
                                        <input type="text" class="form-control" name="iban" value="{{ $vendor->iban ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <h6 class="mb-3">المحافظ الإلكترونية</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">فودافون كاش</label>
                                        <input type="text" class="form-control" name="vodafone_cash" value="{{ $vendor->vodafone_cash ?? '' }}" placeholder="01xxxxxxxxx">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">أورانج موني</label>
                                        <input type="text" class="form-control" name="orange_money" value="{{ $vendor->orange_money ?? '' }}" placeholder="01xxxxxxxxx">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>حفظ معلومات الدفع
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Notifications Tab -->
            <div class="tab-pane fade" id="notifications">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">إعدادات الإشعارات</h5>
                    </div>
                    <div class="card-body">
                        <form id="notifications-form">
                            <h6 class="mb-3">إشعارات الطلبات</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-new-orders" name="notify_new_orders" checked>
                                <label class="form-check-label" for="notify-new-orders">
                                    طلبات جديدة
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-order-updates" name="notify_order_updates" checked>
                                <label class="form-check-label" for="notify-order-updates">
                                    تحديثات الطلبات
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="notify-cancellations" name="notify_cancellations" checked>
                                <label class="form-check-label" for="notify-cancellations">
                                    إلغاء الطلبات
                                </label>
                            </div>
                            
                            <h6 class="mb-3">إشعارات المنتجات</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-product-approval" name="notify_product_approval" checked>
                                <label class="form-check-label" for="notify-product-approval">
                                    موافقة على المنتجات
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-low-stock" name="notify_low_stock" checked>
                                <label class="form-check-label" for="notify-low-stock">
                                    مخزون منخفض
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="notify-out-of-stock" name="notify_out_of_stock" checked>
                                <label class="form-check-label" for="notify-out-of-stock">
                                    نفاد المخزون
                                </label>
                            </div>
                            
                            <h6 class="mb-3">إشعارات المالية</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-payments" name="notify_payments" checked>
                                <label class="form-check-label" for="notify-payments">
                                    المدفوعات المستلمة
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="notify-withdrawals" name="notify_withdrawals" checked>
                                <label class="form-check-label" for="notify-withdrawals">
                                    حالة طلبات السحب
                                </label>
                            </div>
                            
                            <h6 class="mb-3">طرق الإشعار</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-email" name="notify_email" checked>
                                <label class="form-check-label" for="notify-email">
                                    البريد الإلكتروني
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify-sms" name="notify_sms">
                                <label class="form-check-label" for="notify-sms">
                                    رسائل SMS
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="notify-push" name="notify_push" checked>
                                <label class="form-check-label" for="notify-push">
                                    إشعارات المتصفح
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>حفظ إعدادات الإشعارات
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Always open checkbox handler
document.getElementById('always-open').addEventListener('change', function() {
    const container = document.getElementById('business-hours-container');
    const checkboxes = container.querySelectorAll('.day-checkbox');
    const timeInputs = container.querySelectorAll('input[type="time"]');
    
    if (this.checked) {
        container.style.opacity = '0.5';
        checkboxes.forEach(cb => cb.disabled = true);
        timeInputs.forEach(input => input.disabled = true);
    } else {
        container.style.opacity = '1';
        checkboxes.forEach(cb => cb.disabled = false);
        timeInputs.forEach(input => input.disabled = false);
    }
});

// Form submission handlers
document.getElementById('profile-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm(this, '{{ route("vendor.settings.profile.update") }}', 'تم تحديث الملف الشخصي بنجاح');
});

document.getElementById('store-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm(this, '{{ route("vendor.settings.index") }}', 'تم تحديث معلومات المتجر بنجاح');
});

document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm(this, '{{ route("vendor.settings.index") }}', 'تم تحديث معلومات الاتصال بنجاح');
});

document.getElementById('hours-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm(this, '{{ route("vendor.settings.index") }}', 'تم تحديث ساعات العمل بنجاح');
});

document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm(this, '{{ route("vendor.settings.index") }}', 'تم تحديث معلومات الدفع بنجاح');
});

document.getElementById('notifications-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm(this, '{{ route("vendor.settings.index") }}', 'تم تحديث إعدادات الإشعارات بنجاح');
});

// Generic form submission function
function submitForm(form, url, successMessage) {
    const formData = new FormData(form);
    
    showLoading();
    
    fetch(url, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showToast(successMessage, 'success');
        } else {
            showToast(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showToast('حدث خطأ أثناء الحفظ', 'error');
    });
}

// Store slug validation
document.querySelector('input[name="store_slug"]').addEventListener('input', function() {
    this.value = this.value.toLowerCase().replace(/[^a-z0-9-]/g, '');
});

// Real-time slug availability check
let slugTimeout;
document.querySelector('input[name="store_slug"]').addEventListener('input', function() {
    clearTimeout(slugTimeout);
    const slug = this.value;
    
    if (slug.length < 3) return;
    
    slugTimeout = setTimeout(() => {
        fetch('{{ route("vendor.onboarding.check-slug") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ slug: slug })
        })
        .then(response => response.json())
        .then(data => {
            const input = document.querySelector('input[name="store_slug"]');
            if (data.available) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }
        });
    }, 500);
});
</script>
@endpush