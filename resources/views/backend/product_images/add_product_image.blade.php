@extends('backend.layout.master')
@section('title', 'Add Product Image | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Products > Add Product Image</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/products/'.$product->product_id.'/product-images') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <label for="image_url">Image</label>
                        <input id="image_url" type="file" name="image_url" class="form-control-file">
                        @error('image_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-12 mx-auto">
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <input type="submit" value="Save" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
