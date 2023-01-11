@extends('backend.layout.master')
@section('title', 'Products | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap5.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row mb-2">
            <div class="col">
                <h2 class="mb-3">Products > Product Images</h2>

            </div>
            <div class="col d-flex justify-content-end">
                <button onclick="addProduct('{{ url('/dashboard/products/'.$product->product_id.'/product-images/create') }}')" class="btn btn-primary"><span data-feather="plus"></span> Add Photo</button>
            </div>
        </div>
        <table id="productImagesTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productImages as $product_image)
                    <tr id="product-image{{ $product_image->image_id }}">
                        <td>
                            <img src="/storage/uploads/product-images/{{ $product_image->image_url }}"
                                alt="" style="max-width: 80px">
                        </td>
                        <td>{{ $product_image->alt }}</td>
                        <td>{{ $product_image->created_at }}</td>
                        <td>{{ $product_image->updated_at }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item ml-2">
                                    <button
                                        onclick="deleteImage('{{ url('/dashboard/products/'.$product->product_id).'/product-images' }}',{{ $product_image->image_id }})"
                                        class="btn btn-danger ms-2">Remove</button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@section('bottom')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        function addProduct(url) {
            window.location.href = url
        }

        var table = '';
        $(function() {
            table = $('#productImagesTable').DataTable();
        });

        function test(url, id) {
            var product = $('tbody tr#product' + id);
            console.log(table.row(product).remove().draw());
            /* $("#product" + id).hide('slow'); */
        }

        function deleteImage(url, id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id
                        },
                        url: url + '/' + id,
                        type: 'DELETE',
                        success: function(res) {
                            console.log(res)
                            Swal.fire(
                                'Deleted!',
                                'The image has been deleted.',
                                'success'
                            )
                            $("#product-image" + id).hide('slow')
                            setTimeout(() => {
                                var productImage = $('#product-image' + id);
                                table.row(productImage).remove().draw()
                                /* $("#product" + id).remove() */
                                if ($('#productImagesTable tbody tr').length < 1) {
                                    $("#productImagesTable").find('tbody').append(
                                        '<tr><td colspan="6" class="text-center">There is no any record.</td></tr>'
                                    )
                                }
                            }, 1500);
                        },
                        error: function(err) {
                            Swal.fire(
                                'Error!',
                                'The product couldn\'t delete. ',
                                'error'
                            )
                        }
                    });
                }
            })
        }
    </script>
@endsection
@endsection
