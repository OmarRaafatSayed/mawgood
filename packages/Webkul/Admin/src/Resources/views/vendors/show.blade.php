@extends('admin::layouts.master')

@section('page_title')
    عرض التاجر
@stop

@section('content-wrapper')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>تفاصيل التاجر: {{ $vendor->name }}</h1>
            </div>
            <div class="page-action">
                <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-primary">
                    تعديل التاجر
                </a>
            </div>
        </div>

        <div class="page-content">
            <div class="form-container">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">معلومات التاجر</div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم التاجر:</label>
                                    <p>{{ $vendor->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البريد الإلكتروني:</label>
                                    <p>{{ $vendor->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف:</label>
                                    <p>{{ $vendor->phone ?: 'غير محدد' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الحالة:</label>
                                    <p>
                                        @php
                                            $statusLabels = [
                                                'pending' => 'في الانتظار',
                                                'approved' => 'موافق عليه',
                                                'rejected' => 'مرفوض',
                                                'suspended' => 'معلق'
                                            ];
                                        @endphp
                                        <span class="badge badge-{{ $vendor->status == 'approved' ? 'success' : ($vendor->status == 'rejected' ? 'danger' : 'warning') }}">
                                            {{ $statusLabels[$vendor->status] ?? $vendor->status }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نسبة العمولة:</label>
                                    <p>{{ $vendor->commission_rate }}%</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاريخ التسجيل:</label>
                                    <p>{{ $vendor->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop