@extends('backend.layout.master')
@section('title', 'Categories | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap5.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2 class="mb-3">Categories</h2>
        <table id="categoriesTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Parent Category</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr id="category{{ $category->id }}">
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->category_slug }}</td>
                        <td>{{ $category->parent->category_name ?? 'Main Category' }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/categories/' . $category->id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <button
                                        onclick="deleteCategory('{{ url('/dashboard/categories/') }}',{{ $category->id }}, '@foreach ($category->children as $child){{ $child->id . ',' }} @endforeach')"
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
        $(document).ready(function() {
            table = $('#categoriesTable').DataTable();
        });
        function test(url, id, children) {
            var splitted = children.split(',')
            for (let i = 0; i <= splitted.length; i++) {
                if (typeof(splitted[i]) !== null && splitted[i] != '' && splitted[i] != ' ') {
                    $("#category" + splitted[i]).hide('slow')
                }
            }
        }

        function deleteCategory(url, id, children) {
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
                                'The category has been deleted.',
                                'success'
                            )
                            var splitted = children.split(',')
                            for (let i = 0; i <= splitted.length; i++) {
                                if (typeof(splitted[i]) !== null && splitted[i] != '' && splitted[i] !=
                                    ' ') {
                                    $("#category" + splitted[i]).hide('slow')
                                    setTimeout(() => {
                                        $("#category" + splitted[i]).remove()
                                    }, 1500);
                                }
                            }
                            $("#category" + id).hide('slow')
                            setTimeout(() => {
                                var category = $('#category' + id);
                                table.row(category).remove().draw()
                                if ($('#categoriesTable tbody tr').length < 1) {
                                    $("#categoriesTable").find('tbody').append(
                                        '<tr><td colspan="6" class="text-center">There is no any record.</td></tr>'
                                        )
                                }
                            }, 1500);
                        },
                        error: function(err) {
                            Swal.fire(
                                'Error!',
                                'The category couldn\'t delete. ',
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
