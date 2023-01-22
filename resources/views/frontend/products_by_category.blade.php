@extends('frontend.layout.master')
@section('title', 'Products | Komek E-Commerce')
@section('content')
    @include('frontend.widgets.products_by_category_widget');
    @include('frontend.widgets.subscribe')
    @include('frontend.widgets.vendor')
@endsection
