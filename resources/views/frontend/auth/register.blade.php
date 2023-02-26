@extends('frontend.layout.master')
@section('title', 'Register | Komek E-Commerce')
@section('content')
    @php
        $dontCollapse = true;
    @endphp
    @include('frontend.widgets.topbar')
    @include('frontend.widgets.navbar')
    <div class="container card bg-light mt-2 px-3 py-2 pb-4" style="border-radius:8px">
        <form id="registerform" class="mt-4" method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="col-sm-12">
                <h2 class="display-4 text-center">Join US!</h2>
            </div>
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
                <input id="phone_number" type="text" name="phone_number" class="form-control"
                    value="{{ old('phone_number') }}">
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
@push('scripts')
    <script>
        let form = document.getElementById('registerform');

        form.addEventListener('submit', (event) => {
            let ruleList = [

            ];

            event.preventDefault();

            let errors = [];

            [...form.elements].forEach(element => {
                if (element.id == 'email') {
                    if (!validateEmail(element.value)) {
                        errors.push('email');
                        let errorElement = document.createElement('small');
                        errorElement.classList.add('text-danger');
                        errorElement.innerHTML = 'e posta formatı yanlış girildi.';
                        !element.nextElementSibling?.classList?.contains('text-danger') ? element.after(
                            errorElement) : null;
                        console.log('hata');
                        console.log(event.value);
                    } else {
                        errors.push('email');
                        if (element.nextElementSibling?.classList?.contains('text-danger')) {
                            element.nextElementSibling?.remove();
                        }
                    }

                }
            });
            if (errors.length < 0) {
                form.submit();
            }
        });

        function validateEmail(email) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                return (true)
            }
            return (false)
        }
    </script>
@endpush
