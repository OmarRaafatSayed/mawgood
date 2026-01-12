@extends('admin::layouts.master')

@section('page_title')
    إضافة تاجر جديد
@stop

@section('content-wrapper')
    <div class="content">
        <form method="POST" action="{{ route('admin.vendors.store') }}">
            @csrf
            <div class="page-header">
                <div class="page-title">
                    <h1>إضافة تاجر جديد</h1>
                </div>
                <div class="page-action">
                    <button type="submit" class="btn btn-primary">
                        حفظ التاجر
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
                            :value="old('name')"
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
                            :value="old('email')"
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
                            :value="old('phone')"
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
                            :value="old('status', 'pending')"
                        >
                            <option value="pending">في الانتظار</option>
                            <option value="approved">موافق عليه</option>
                            <option value="rejected">مرفوض</option>
                            <option value="suspended">معلق</option>
                        </x-admin::form.control-group.control>
                        <x-admin::form.control-group.error control-name="status" />
                    </x-admin::form.control-group>
                </div>
            </div>
        </form>
    </div>
@stop