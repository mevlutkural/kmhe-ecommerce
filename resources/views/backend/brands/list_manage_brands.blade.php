@extends('backend.layout.master')
@section('title', 'brands | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap5.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2 class="mb-3">Brands</h2>
        <table id="brandsTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Sequence</th>
                    <th>Image</th>
                    <th>Brand Name</th>
                    <th>Alt</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr id="brand{{ $brand->brand_id }}">
                        <td>{{ $brand->sequence }}</td>
                        <td>
                            <img src="/storage/uploads/brands/{{ $brand->image_url }}" alt="" style="max-width: 80px;max-height:50px">
                        </td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->alt }}</td>
                        <td>{{ $brand->is_active }}</td>
                        <td>{{ $brand->created_at }}</td>
                        <td>{{ $brand->updated_at }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/brands/' . $brand->brand_id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <button onclick="deletebrand('{{ url('/dashboard/brands/') }}',{{ $brand->brand_id }})"
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
            table = $('#brandsTable').DataTable();
        });
        function test(url, id) {
            var brand = $('tbody tr#brand' + id);
            console.log(table.row(brand).remove().draw());
            /* $("#brand" + id).hide('slow'); */
        }

        function deletebrand(url, id) {
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
                                'The brand has been deleted.',
                                'success'
                            )
                            $("#brand" + id).hide('slow')
                            setTimeout(() => {
                                var brand = $('#brand' + id);
                                table.row(brand).remove().draw()
                                /* $("#brand" + id).remove() */
                                if ($('#brandsTable tbody tr').length < 1) {
                                    $("#brandsTable").find('tbody').append(
                                        '<tr><td colspan="6" class="text-center">There is no any record.</td></tr>'
                                    )
                                }
                            }, 1500);
                        },
                        error: function(err) {
                            Swal.fire(
                                'Error!',
                                'The brand couldn\'t delete. ',
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
