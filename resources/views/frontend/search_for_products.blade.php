@extends('frontend.layout.master')
@section('title', 'Products | Komek E-Commerce')
@section('content')
    @include('frontend.widgets.search_for_products_category_widget')
    @include('frontend.widgets.subscribe')
    @include('frontend.widgets.vendor')
@endsection
