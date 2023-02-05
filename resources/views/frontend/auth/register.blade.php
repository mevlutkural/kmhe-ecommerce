@extends('frontend.layout.master')
@section('title', 'Products | Komek E-Commerce')
@section('content')
    @php
        $dontCollapse = true;
    @endphp
    @include('frontend.widgets.topbar')
    @include('frontend.widgets.navbar')
    <div class="container card bg-light mt-2 px-3 py-2 pb-4" style="border-radius:8px">
        <form class="mt-4" method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="col-sm-12">
                <label for="name_surname">Name Surname</label>
                <input id="name_surname" type="text" name="name_surname" class="form-control"
                    value="{{ old('name_surname') }}">
                @error('name_surname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12">
                <label for="email">E-Mail</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12">
                <label for="phone_number">Phone Number</label>
                <input id="phone_number" type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12">
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 mt-3">
                <input type="submit" value="Save" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
