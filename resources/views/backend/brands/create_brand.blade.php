@extends('backend.layout.master')
@section('title', 'Create Category | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Brands > Create A Brand</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/brands') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="image_url" class="form-label">Brand Image</label>
                        <input type="file" name="image_url" id="image_url">
                        @error('image_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">Brand Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="alt" class="form-label">Alt</label>
                        <input type="text" id="alt" name="alt" class="form-control"
                            value="{{ old('alt') }}">
                        @error('alt')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center mt-4">
                        <div class="">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input"
                            {{ old('is_active') ? 'checked' : '' }}>
                        <label for="is_active" class="form-label">Is Active?</label>
                        </div>
                        @error('is_active')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sequence" class="form-label">Sequence</label>
                        <select type="text" id="sequence" name="sequence" class="form-control">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}"{{ $i == old('sequence') ? 'selected' : '' }}>{{$i}}</option>
                            @endfor
                        </select>
                        @error('sequence')
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
