@extends('admin::layouts.master')

@section('page_title')
    إدارة التجار
@stop

@section('content-wrapper')
    <div class="content full-page">
        <div class="page-header">
            <div class="page-title">
                <h1>إدارة التجار</h1>
            </div>
            <div class="page-action">
                <a href="{{ route('admin.vendors.create') }}" class="btn btn-primary">
                    إضافة تاجر جديد
                </a>
            </div>
        </div>

        <div class="page-content">
            <x-admin::datagrid :src="route('admin.vendors.index')" />
        </div>
    </div>
@stop