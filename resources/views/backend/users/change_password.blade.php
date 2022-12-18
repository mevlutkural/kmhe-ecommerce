@extends('backend.layout.master')
@section('title', 'Change Password | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2>Users > Change Password</h2>
        <div class="card-body">
            <form class="mt-4" method="POST" action="{{ url('/dashboard/users/change-password/'.$user->user_id) }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="password">Password</label>
                                <input id="password" type="text" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="password_confirmation">Password Confirmmation</label>
                                <input id="password_confirmation" type="text" name="password_confirmation" class="form-control">
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
