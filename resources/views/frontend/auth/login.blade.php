@extends('frontend.layout.master')
@section('title', 'Login | Komek E-Commerce')
@section('content')
    @php
        $dontCollapse = true;
    @endphp
    @include('frontend.widgets.topbar')
    @include('frontend.widgets.navbar')
    <div class="container card bg-light mt-2 px-3 py-2 pb-4" style="border-radius:8px">
        @if ($errors->any())
            <div id="alert" class="alert alert-danger" style="display:none;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="mt-4" method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="col-sm-12">
                <h2 class="display-4 text-center">Login</h2>
            </div>
            <div class="col-sm-12">
                <label for="email">E-Mail</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
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
            <div class="col-sm-12 mt-3">
                <input type="submit" value="Login" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            if ($('#alert')) {
                $('#alert').fadeIn('slow');
                setTimeout(() => {
                    $('#alert').fadeOut('slow');
                }, 4500);
            }
        });
    </script>
@endpush
