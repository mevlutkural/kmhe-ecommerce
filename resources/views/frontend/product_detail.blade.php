@extends('frontend.layout.master')
@section('title', 'Product Details | Komek | E-Commerce')
@include('frontend.widgets.topbar')
@section('content')
    {{--  <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i
                                    class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.html" class="nav-item nav-link">Home</a>
                            <a href="shop.html" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link active">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="" class="nav-item nav-link">Login</a>
                            <a href="" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End --> --}}
    @php
        $dontCollapse = true;
    @endphp
    @include('frontend.widgets.navbar')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @if (count($product->images) > 0)
                            @foreach ($product->images as $image)
                                <div class="carousel-item @if ($loop->iteration == 1) {{ 'active' }} @endif">
                                    <img class="w-100 h-100" src="/storage/uploads/product-images/{{ $image->image_url }}"
                                        alt="Image">
                                </div>
                            @endforeach
                            @if (count($product->images) > 0)
                                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                                </a>
                                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->product_name }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">({{ count($reviews) }} Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{ $product->product_price }}$</h3>
                <p class="mb-4">{{ $product->short_description }}</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus"
                                onclick="updateStockQuantity('stockQuantity', {{ $product->product_id }})">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input id="stockQuantity" type="text" class="form-control bg-secondary text-center"
                            value="{{ $product->stock_quantity }}"
                            oninput="updateStockQuantity('stockQuantity', {{ $product->product_id }})">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus"
                                onclick="updateStockQuantity('stockQuantity', {{ $product->product_id }})">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews
                        ({{ count($reviews) }})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt
                            duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam,
                            ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr
                            sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                @isset($reviews)
                                    @if (count($reviews) > 0)
                                        <h4 class="mb-4">{{ count($reviews) }} review for {{ $product->product_name }}
                                            @foreach ($reviews as $review)
                                        </h4>
                                        <div class="media mb-4">
                                            @if ($review->image == 'null')
                                                <img src="{{ asset('assets/img/default_user.webp') }}"
                                                    alt="product_review{{ $review->review_id }}" class="img-fluid mr-3 mt-1"
                                                    style="width: 45px;" alt="default-user-image" title="default user image">
                                            @else
                                                <img src="{{ asset('assets/img/default_user.webp') }}"
                                                    alt="product_review{{ $review->review_id }}" class="img-fluid mr-3 mt-1"
                                                    style="width: 45px;" alt="user-image" title="user image">
                                            @endif
                                            <div class="media-body">
                                                <h6>{{ $review->name }}<small> -
                                                        <i>{{ $review->created_at->format('d M Y') }}</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    @for ($i = 1; $i <= $review->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                                <p>{{ $review->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4 class="mb-4">There is not any review for {{ $product->product_name }} yet.</h4>
                                    @endif
                                @endisset
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i id="rate{{ $i }}" class="far fa-star"
                                                onclick="setRate({{ $i }})"></i>
                                        @endfor
                                    </div>
                                </div>
                                <form id="newReviewForm" type="POST" action="/dashboard/reviews">
                                    <input id="rating" type="hidden" name="rating" value="5">
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <div class="form-group">
                                        <label for="content">Your Review *</label>
                                        <textarea id="content" cols="30" rows="5" class="form-control" name="content"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                    <div id="alert" class="alert" role="alert" style="display: none"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    {{-- <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @isset($products)
                        @foreach ($products as $product)
                            <div class="card product-item border-0">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100"
                                        src="/storage/uploads/product-images/{{ count($product->images) > 0 ? $product->images[0]->image_url : '' }}"
                                        alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ $product->product_price }}$</h6>
                                        <h6 class="text-muted ml-2"><del>{{ $product->product_price * 1.5 }}$</del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Products End -->
    <script>
        function setRate(rate) {
            $("input#rating").val(rate);
            for (let i = 1; i <= 5; i++) {
                $("#rate" + i).removeClass('fas');
            }
            for (let i = 1; i <= Number(rate); i++) {
                $("#rate" + i).addClass('fas')
            }
        }

        $(function() {
            let forms = document.getElementsByTagName("form");
            [...forms].forEach((element) => {
                $(element).on("submit", function(e) {
                    e.preventDefault();
                    let url = e.currentTarget.action;
                    let isConfirmed = true; /* confirm('Ok?'); */
                    let formData = $(e.currentTarget).serialize();
                    formData += '&_token=' + '{{ csrf_token() }}'
                    if (isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: 'http://127.0.0.1:8000/dashboard/reviews',
                            data: formData,
                            success: function(res) {
                                if (res) {
                                    let alert = $("#alert");
                                    $(alert).text(res)
                                    $(alert).fadeIn('slow')
                                    if ($(alert).hasClass('alert-danger')) {
                                        $(alert).removeClass('alert-danger');
                                    }
                                    $(alert).addClass('alert-success');
                                    setTimeout(() => {
                                        $(alert).fadeOut('slow');
                                    }, 5500)
                                }
                            },
                            error: function(err) {
                                let alert = $("#alert");
                                $(alert).text(err)
                                $(alert).fadeIn('slow')
                                if ($(alert).hasClass('alert-success')) {
                                    $(alert).removeClass('alert-success');
                                }
                                $(alert).addClass('alert-danger');
                                setTimeout(() => {
                                    $(alert).fadeOut('slow');
                                }, 5500)
                            },
                        });
                    }
                });
            });
        });

        function updateStockQuantity(elementId, productId) {
            setTimeout(() => {
                let stockQuantity = Number(document.getElementById(elementId).value);
                postData();

                function postData() {
                    let url = `http://127.0.0.1:8000/dashboard/products/${productId}/update-stock-quantity`;
                    $.ajax({
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'stock_quantity': stockQuantity
                        },
                        url: url,
                        type: 'POST',
                        success: function(res) {

                        },
                        error: function(err) {}
                    });
                }

                /* function newReview(rating, review, name, email, productId) {
                    let form = document.getElementById('newReviewForm');
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        [...this.elements].forEach(input => {

                        })
                    });
                    let url = `http://127.0.0.1:8000/dashboard/reviews`;
                    $.ajax({
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'rating': rating,
                            'review': review,
                            'name': name,
                            'email': email,
                            'product_id': productId
                        },
                        url: url,
                        type: 'POST',
                        success: function(res) {
                            console.log(res);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } */


            }, 500);
        }

        /* function newReview() {
            let form = document.getElementById('newReviewForm');
            $.ajax({
                data: {
                    ...$(this).serialize(),
                    _token: "{{ csrf_token() }}"

                },
                url: 'http://127.0.0.1:8000/dashboard/reviews',
                type: 'POST',
                success: function(res) {
                    console.log(res)
                },
                error: function(err) {
                    console.log(err)
                }
            });
        } */
    </script>
@endsection
