@extends('backend.layout.master')
@section('title', 'Reviews | Komek E-Commerce')
@section('head')
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap5.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <h2 class="mb-3">Reviews</h2>
        <table id="reviewsTable" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Content</th>
                    <th>Product</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr id="review{{ $review->review_id }}">
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->email }}</td>
                        <td>{{ $review->phone_number }}</td>
                        <td>{{ $review->content }}</td>
                        <td>{{ $review->product->product_name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="isActiveButton{{ $review->review_id }}"
                                    onchange="updateIsActive('isActiveButton{{ $review->review_id }}', {{ $review->review_id }})"
                                    {{ $review->is_active == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="isActiveButton{{ $review->review_id }}"></label>
                            </div>
                        </td>
                        <td>{{ $review->created_at }}</td>
                        <td>{{ $review->updated_at }}</td>
                        <td>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/reviews/' . $review->id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <button
                                        onclick="deletereview('{{ url('/dashboard/reviews/') }}',{{ $review->review_id }})"
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
                function updateIsActive(elementId, reviewId) {
            console.log('hello')
            let isActive = document.getElementById(elementId).checked ? '1' : '0';
             function postData() {
                let url = `http://127.0.0.1:8000/dashboard/reviews/${reviewId}/update-is-active`;
                $.ajax({
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'is_active': isActive
                        },
                        url: url,
                        type: 'POST',
                        success: function(res) {

                        },
                        error: function(err) {

                        }
                    });
            }

            postData();
        }

        var table = '';
        $(document).ready(function() {
            table = $('#reviewsTable').DataTable();
        });
        function test(url, id, children) {
            var splitted = children.split(',')
            for (let i = 0; i <= splitted.length; i++) {
                if (typeof(splitted[i]) !== null && splitted[i] != '' && splitted[i] != ' ') {
                    $("#review" + splitted[i]).hide('slow')
                }
            }
        }

        function deletereview(url, id) {
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
                                'The review has been deleted.',
                                'success'
                            )
                            $("#review" + id).hide('slow')
                            setTimeout(() => {
                                var review = $('#review' + id);
                                table.row(review).remove().draw()
                                if ($('#reviewsTable tbody tr').length < 1) {
                                    $("#reviewsTable").find('tbody').append(
                                        '<tr><td colspan="6" class="text-center">There is no any record.</td></tr>'
                                        )
                                }
                            }, 1500);
                        },
                        error: function(err) {
                            Swal.fire(
                                'Error!',
                                'The review couldn\'t delete. ',
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
