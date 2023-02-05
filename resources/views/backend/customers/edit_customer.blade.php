@extends('backend.layout.master')
@section('title', 'Edit Customer | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Customers > Edit Customer</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/customers/'.$customer->customer_id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}">
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name_surname">Name Surname</label>
                                <input id="name_surname" type="text" name="name_surname" class="form-control" value="{{ old('name_surname', $customer->name_surname) }}">
                                @error('name_surname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="email">E-Mail</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="phone_number">Phone Number</label>
                                <input id="phone_number" type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $customer->phone_number) }}">
                                @error('email')
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
