@extends('backend.layout.master')
@section('title', 'Create Category | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Products > Create Product</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/products') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" id="product_name" name="product_name" class="form-control"
                            value="{{ old('product_name') }}">
                        @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category.</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number" id="product_price" name="product_price" class="form-control"
                            value="{{ old('product_price') }}">
                        @error('product_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="short_description" class="form-label">Short Description</label>
                        <input type="text" id="short_description" name="short_description" class="form-control"
                            value="{{ old('short_description') }}">
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2 pl-5">
                        <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ old('testtesttest') ? 'checked' : ''}} value="1">
                        <label for="is_active" class="form-label">Is Active?</label>
                        @error('testtesttest')
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
