@extends('mawgood-vendor::layouts.app')

@section('title', 'إضافة منتج جديد')
@section('page-title', 'إضافة منتج جديد')

@section('content')
    @include('mawgood-vendor::products.form', ['product' => $product])
@endsection
