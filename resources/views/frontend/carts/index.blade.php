@extends('frontend.layout.master')
@section('title', 'Products | Komek E-Commerce')
@php
    $dontCollapse = true;
@endphp
@include('frontend.widgets.topbar')
@include('frontend.widgets.navbar')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantitiy</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->product->product_name }}</td>
                            <td>
                                <input type="number" name="" id="" value="{{ $cart->quantity }}" style="max-width:70px">
                            </td>
                            <td><button onclick="deleteCartItem({{ $cart->cart_id }})"
                                    class="btn btn-sm btn-danger">delete</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deleteCartItem(id) {
            if (confirm('are you sure you want to delete this item')) {
                $.ajax({
                    type: 'DELETE',
                    url:'{{ url("/delete-cart-item/") }}' + '/' +  id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        alert('successfully deleted');
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    },
                    error: function (err) {
                        alert('error')
                    }
                });
            }
        }
    </script>
@endpush
