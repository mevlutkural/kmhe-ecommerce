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
        <h2 class="mb-3">Products</h2>
        <table id="productsTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Short Description</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr id="product{{ $product->product_id }}">
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->short_description }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/products/' . $product->product_id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="{{ url('/dashboard/products/' . $product->product_id . '/product-images' ) }}"
                                        class="btn btn-info">Product Images</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <button onclick="deleteProduct('{{ url('/dashboard/products/') }}',{{ $product->product_id }})"
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
        var table = '';
        $(function() {
            table = $('#productsTable').DataTable();
        });
        function test(url, id) {
            var product = $('tbody tr#product' + id);
            console.log(table.row(product).remove().draw());
            /* $("#product" + id).hide('slow'); */
        }

        function deleteProduct(url, id) {
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
                            Swal.fire(
                                'Deleted!',
                                'The product has been deleted.',
                                'success'
                            )
                            $("#product" + id).hide('slow')
                            setTimeout(() => {
                                var product = $('#product' + id);
                                table.row(product).remove().draw()
                                /* $("#product" + id).remove() */
                                if ($('#productsTable tbody tr').length < 1) {
                                    $("#productsTable").find('tbody').append(
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
