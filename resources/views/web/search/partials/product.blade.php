<div class="list-category image-bg-1">
    <div class="container">
        <h5 class="sub-title" style="margin-bottom: 0;">{{__('product.sub_home')}}</h5>
        <div class="list-product-swiper">
            @if(count($categoryProducts) > 0)
                <div class="row" id="productContainer">
                    @foreach($categoryProducts as $index => $categoryProduct)
                        <div class="col-lg-4 col-md-6 col-12 product-item" style="margin: 30px auto 0; display: {{ $index < 6 ? 'block' : 'none' }};">
                            <div class="col-image">
                                <div class="product-image">
                                    <img src="{{ $categoryProduct->src }}" alt="Image"/>
                                </div>
                                <div class="product-describe">
                                    <a href="{{ route('detail-product', ['slug' => $categoryProduct->slug ?? '']) }}">
                                    <h5>{{ $categoryProduct->names ?? '' }}</h5>
                                    </a>
                                    <p>{{ $categoryProduct->describes ?? '' }}</p>
                                    <a href="{{ route('detail-product', ['slug' => $categoryProduct->slug ?? '']) }}">{{__('category_product.see_more')}} -></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if(count($categoryProducts) > 6)
                    <div class="text-center d-flex justify-content-center" style="column-gap: 10px; margin-top: 20px;">
                        <button id="seeMoreButton" class="more-btn" onclick="toggleItems('more')">{{__('activity.see_more')}}</button>
                        <button id="showLessButton" class="less-btn" onclick="toggleItems('less')" style="display: none;">{{__('activity.see_less')}}</button>
                    </div>
                @endif
            @else
                <div class="text-center" style="margin-top: 20px;">
                    <p>{{__('activity.no_products_found')}}</p>
                </div>
            @endif
        </div>
    </div>
</div>
<script>
    let currentItems = 6;

    function toggleItems(action) {
        const productItems = document.querySelectorAll('.product-item');
        const seeMoreButton = document.getElementById('seeMoreButton');
        const showLessButton = document.getElementById('showLessButton');

        if (action === 'more') {
            currentItems += 6;
        } else if (action === 'less') {
            currentItems -= 6;
        }

        productItems.forEach((item, index) => {
            if (index < currentItems) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        if (currentItems >= productItems.length) {
            seeMoreButton.style.display = 'none';
        } else {
            seeMoreButton.style.display = 'block';
        }

        if (currentItems > 6) {
            showLessButton.style.display = 'block';
        } else {
            showLessButton.style.display = 'none';
        }
    }

</script>
