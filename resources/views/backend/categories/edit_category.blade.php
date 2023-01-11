@extends('backend.layout.master')
@section('title', 'Edit Category | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Users > Edit Category</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/categories/' . $category->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="category_name">Category Name</label>
                                <input id="category_name" type="text" name="category_name" class="form-control"
                                    value="{{ old('category_name', $category->category_name) }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="category_id">Parent Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Empty</option>
                                    @foreach ($categories as $categoryItem)
                                        @if ($categoryItem->id != $category->id)
                                            <option value="{{ $categoryItem->id }}"
                                                {{ $categoryItem->id == $category->category_id ? 'selected' : '' }}>
                                                {{ $categoryItem->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_parent')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
