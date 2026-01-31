@extends('mawgood-vendor::layouts.app')

@section('title', 'تعديل المنتج')
@section('page-title', 'تعديل المنتج')

@section('content')
    @include('mawgood-vendor::products.form', ['product' => $product])
@endsection
