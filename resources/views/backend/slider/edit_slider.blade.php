@extends('backend.layout.master')
@section('title', 'Edit Slider | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Sliders > Edit Slider</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/sliders') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="image_url" class="form-label">Image</label>
                        <input type="file" name="image_url" id="image_url">
                        @error('image_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="big_title" class="form-label">Big Title</label>
                        <input type="text" id="big_title" name="big_title" class="form-control"
                            value="{{ old('big_title') }}">
                        @error('big_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-start mt-4 ml-4  ">
                        <div class="mt-1">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input"
                            {{ old('is_active') ? 'checked' : '' }} value="1">
                        <label for="is_active" class="form-label">Is Active?</label>
                        </div>
                        @error('is_active')
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
