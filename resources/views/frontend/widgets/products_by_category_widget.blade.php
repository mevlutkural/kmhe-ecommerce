@include('frontend.widgets.topbar')
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">{{ $category->category_name }}</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @isset($productsByCategory)
            @foreach ($productsByCategory as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ url('/products/' . $product->product_id . '/product-details') }}"></a><img
                                class="img-fluid w-100"
                                src="/storage/uploads/product-images/{{ count($product->images) > 0 ? $product->images[0]->image_url : '' }}"
                                alt="">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $product->product_price }}$</h6>
                                <h6 class="text-muted ml-2">
                                    <del>{{ $product->product_price = $product->product_price * 1.5 }}$</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ url('/products/' . $product->product_id . '/product-details') }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
</div>
