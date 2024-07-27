<div class="list-category image-bg-1">
    <div class="container">
        <h5 class="sub-title" style="margin-bottom: 0;">{{ $categorySlug->names ?? '' }}</h5>
        <div class="list-product-swiper">
            <div class="row">
                @foreach($categoryProducts as $categoryProduct)
                    <div class="col-lg-4 col-md-6 col-12" >
                        <div class="col-image" style="margin: 30px auto 0">
                            <div class="product-image">
                                <img src="{{ $categoryProduct->src }}" alt="Image"/>
                            </div>
                            <div class="product-describe">
                                <h5>{{ $categoryProduct->names ?? '' }}</h5>
                                <p>{{ $categoryProduct->describes ?? '' }}</p>
                                <a href="{{ route('detail-product', ['slug' => $categoryProduct->slug ?? '']) }}">{{__('category_product.see_more')}} -></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
