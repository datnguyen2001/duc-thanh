@foreach($categories as $index => $category)
    <div class="list-category {{ $index == 0 ? 'image-bg-1' : ($index == 2 ? 'image-bg-2' : ($index == 4 ? 'image-bg-3' : '')) }}">
        <div class="container">
            <h5 class="sub-title @if($index == 4 || $index == 5) title-sub-note @endif @if($index == 2) title-sub-note2 @endif">{{ $category->names ?? '' }}</h5>
            <div class="swiper list-product-swiper">
                <div class="swiper-wrapper">
                    @foreach($category->products as $product)
                        <div class="swiper-slide">
                            <div class="col-image">
                                <div class="product-image">
                                    <a href="{{ route('detail-product', ['slug' => $product->slug ?? '']) }}">
                                        <img src="{{ $product->src }}" alt="Image"/>
                                    </a>
                                </div>
                                <div class="product-describe">
                                    <a href="{{ route('detail-product', ['slug' => $product->slug ?? '']) }}">
                                        <h5>{{ $product->names ?? '' }}</h5>
                                    </a>
                                    <p>{{ $product->describes ?? '' }}</p>
                                    <a href="{{ route('detail-product', ['slug' => $product->slug ?? '']) }}">{{__('category.see_more')}} -></a>
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
