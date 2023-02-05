@extends('backend.layout.master')
@section('title', 'customers | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap5.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2 class="mb-3">customers</h2>
        <table id="customersTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name Surname</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr id="customer{{ $customer->customer_id }}">
                        <td>{{ $customer->name_surname }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/customers/' . $customer->customer_id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="{{ url('/dashboard/customers/change-password/'.$customer->customer_id) }}" class="btn btn-info ms-2">Change Password</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <button onclick="deleteCustomer('{{ url('/dashboard/customers/') }}',{{ $customer->customer_id }})"
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
    <script>
        function deleteCustomer(url, customer_id) {
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
                            'customer_id': customer_id
                        },
                        url: url + '/' + customer_id,
                        type: 'DELETE',
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'The customer has been deleted.',
                                'success'
                            )
                            $("#customer" + customer_id).hide('slow')
                        },
                        error: function(err) {
                            Swal.fire(
                                'Error!',
                                'Customer couldn\'t delete. ',
                                'error'
                            )
                        }
                    });
                }
            });
        }
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#customersTable').DataTable();
        });
    </script>
@endsection
@endsection
