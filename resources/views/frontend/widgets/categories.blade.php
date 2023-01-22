<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @isset($categories)
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">15 Products</p>
                        <a href="{{ url('/category/'.$category->category_slug) }}" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="/storage/uploads/categories/{{ $category->category_slug }}.png" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">{{ $category->category_name }}</h5>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
</div>
