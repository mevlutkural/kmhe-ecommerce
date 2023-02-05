@extends('backend.layout.master')
@section('title', 'Change Password | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>customers > Change Password</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/customers/change-password/'.$customer->customer_id) }}">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}">
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="password_confirmation">Password Confirmmation</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                                @error('password')
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
