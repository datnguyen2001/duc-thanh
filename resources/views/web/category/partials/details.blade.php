@foreach($categories as $index => $category)
    <div class="list-category {{ $index == 0 ? 'image-bg-1' : ($index == 2 ? 'image-bg-2' : ($index == 4 ? 'image-bg-3' : '')) }}">
        <div class="container">
            <h5 class="sub-title">{{ $category->names }}</h5>
            <div class="swiper list-product-swiper">
                <div class="swiper-wrapper">
                    @foreach($category->products as $product)
                        <div class="swiper-slide">
                            <div class="col-image">
                                <div class="product-image">
                                    <img src="{{ $product->src }}" alt="Image"/>
                                </div>
                                <div class="product-describe">
                                    <h5>{{ $product->names }}</h5>
                                    <p>{{ $product->describes }}</p>
                                    <a href="#">Chi tiết -></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination-video"></div>
            </div>
        </div>
    </div>
@endforeach

{{--<div class="pagination">--}}
{{--    {{ $categories->links() }}--}}
{{--</div>--}}
