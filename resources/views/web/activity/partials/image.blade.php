<div class="container" style="padding-top: 215px">
    <span class="home">Trang chủ</span>
    <span class="activity">Hoạt động</span>
    <div class="list-image">
        <h5 class="sub-title">Hình ảnh</h5>
        <h1>
            Hình ảnh trải nghiệm sản phẩm cùng Đức Thanh
        </h1>
        <div class="swiper-container">
            <div class="list-product swiper-wrapper">
                @foreach($image as $images)
                <div class="swiper-slide">
                    <div class="product-image">
                        <img src="{{asset('assets/images/activity/frame-img.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset($images->src)}}" alt="Image" class="image"/>
                    </div>
                    <div class="product-text">
                        <h5 class="product-title">{{$images->names}}</h5>
                        <p class="product-detail">{{$images->describes}}</p>
                        <span><a href="{{$images->link}}">Chi tiết -></a></span>
                    </div>
                </div>
                    @endforeach
            </div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"><img src="{{asset('assets/images/activity/next-btn.png')}}" alt="Next"/></div>
            <div class="swiper-button-prev"><img src="{{asset('assets/images/activity/prev-btn.png')}}" alt="Prev"/></div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });
    });
</script>
