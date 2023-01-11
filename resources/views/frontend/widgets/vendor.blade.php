<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                @foreach ($brands as $brand)
                    <div class="vendor-item border p-4">
                        <img src="/storage/uploads/brands/{{ $brand->image_url }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>ƒ
