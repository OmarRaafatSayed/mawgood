@extends('admin::layouts.master')

@section('page_title')
    تعديل التاجر
@stop

@section('content-wrapper')
    <div class="content">
        <form method="POST" action="{{ route('admin.vendors.update', $vendor->id) }}">
            @csrf
            @method('PUT')
            <div class="page-header">
                <div class="page-title">
                    <h1>تعديل التاجر: {{ $vendor->name }}</h1>
                </div>
                <div class="page-action">
                    <button type="submit" class="btn btn-primary">
                        حفظ التغييرات
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            اسم التاجر
                        </x-admin::form.control-group.label>
                        <x-admin::form.control-group.control
                            type="text"
                            name="name"
                            rules="required"
                            :value="old('name', $vendor->name)"
                        />
                        <x-admin::form.control-group.error control-name="name" />
                    </x-admin::form.control-group>

                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            البريد الإلكتروني
                        </x-admin::form.control-group.label>
                        <x-admin::form.control-group.control
                            type="email"
                            name="email"
                            rules="required|email"
                            :value="old('email', $vendor->email)"
                        />
                        <x-admin::form.control-group.error control-name="email" />
                    </x-admin::form.control-group>

                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            رقم الهاتف
                        </x-admin::form.control-group.label>
                        <x-admin::form.control-group.control
                            type="text"
                            name="phone"
                            :value="old('phone', $vendor->phone)"
                        />
                        <x-admin::form.control-group.error control-name="phone" />
                    </x-admin::form.control-group>

                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            الحالة
                        </x-admin::form.control-group.label>
                        <x-admin::form.control-group.control
                            type="select"
                            name="status"
                            :value="old('status', $vendor->status)"
                        >
                            <option value="pending" {{ $vendor->status == 'pending' ? 'selected' : '' }}>في الانتظار</option>
                            <option value="approved" {{ $vendor->status == 'approved' ? 'selected' : '' }}>موافق عليه</option>
                            <option value="rejected" {{ $vendor->status == 'rejected' ? 'selected' : '' }}>مرفوض</option>
                            <option value="suspended" {{ $vendor->status == 'suspended' ? 'selected' : '' }}>معلق</option>
                        </x-admin::form.control-group.control>
                        <x-admin::form.control-group.error control-name="status" />
                    </x-admin::form.control-group>

                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            نسبة العمولة %
                        </x-admin::form.control-group.label>
                        <x-admin::form.control-group.control
                            type="number"
                            name="commission_rate"
                            step="0.01"
                            min="0"
                            max="100"
                            :value="old('commission_rate', $vendor->commission_rate)"
                        />
                        <x-admin::form.control-group.error control-name="commission_rate" />
                    </x-admin::form.control-group>
                </div>
            </div>
        </form>
    </div>
@stop