@extends('backend.layout.master')
@section('title', 'Sliders | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap5.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2 class="mb-3">Sliders</h2>
        <table id="slidersTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Big Title</th>
                    <th>Status</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr id="slider{{ $slider->slider_id }}">
                        <td>
                            <img src="/storage/uploads/slider-images/{{ $slider->image_url }}" alt=""
                                style="max-width: 80px;max-height:50px">
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->big_title }}</td>
                        <td>{{ $slider->is_active }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/sliders/' . 1 . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <button
                                        onclick="deleteslider('{{ url('/dashboard/sliders/') }}',{{ $slider->slider_id }})"
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
            table = $('#slidersTable').DataTable();
        });

        function test(url, id) {
            var slider = $('tbody tr#slider' + id);
            console.log(table.row(slider).remove().draw());
            /* $("#slider" + id).hide('slow'); */
        }

        function deleteslider(url, id) {
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
                                'The slider has been deleted.',
                                'success'
                            )
                            $("#slider" + id).hide('slow')
                            setTimeout(() => {
                                var slider = $('#slider' + id);
                                table.row(slider).remove().draw()
                                /* $("#slider" + id).remove() */
                                if ($('#slidersTable tbody tr').length < 1) {
                                    $("#slidersTable").find('tbody').append(
                                        '<tr><td colspan="6" class="text-center">There is no any record.</td></tr>'
                                    )
                                }
                            }, 1500);
                        },
                        error: function(err) {
                            console.log(err);
                            Swal.fire(
                                'Error!',
                                'The slider couldn\'t delete. ',
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
