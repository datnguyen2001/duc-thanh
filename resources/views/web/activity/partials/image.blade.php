<div class="container" style="padding-top: 215px">
    <span class="home">Trang chủ</span>
    <span class="activity">Hoạt động</span>
    <div class="list-image">
        <h5 class="sub-title">Hình ảnh</h5>
        <h1>
            Hình ảnh trải nghiệm sản phẩm <br>
            cùng Đức Thanh
        </h1>
        <div class="swiper-container">
            <div class="list-product swiper-wrapper">
                <div class="swiper-slide col-4">
                    <div class="product-image">
                        <img src="{{asset('assets/images/activity/frame-img.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset('assets/images/activity/image-product.webp')}}" alt="Image" class="image"/>
                    </div>
                    <div class="product-text">
                        <h5 class="product-title">Bút Sáp 12 Màu</h5>
                        <p class="product-detail">Bút sáp 12 màu có bao bì đa dạng, nhiều nhân vật ngộ nghĩnh, đáng yêu phù hợp với các bạn nhỏ ...</p>
                        <span><a href="#">Chi tiết -></a></span>
                    </div>
                </div>
                <div class="swiper-slide col-4">
                    <div class="product-image">
                        <img src="{{asset('assets/images/activity/frame-img.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset('assets/images/activity/image-product.webp')}}" alt="Image" class="image"/>
                    </div>
                    <div class="product-text">
                        <h5 class="product-title">Bút Sáp 18 Màu</h5>
                        <p class="product-detail">Bút sáp 18 màu có bao bì đa dạng, nhiều nhân vật ngộ nghĩnh, đáng yêu phù hợp với các bạn nhỏ ...</p>
                        <span><a href="#">Chi tiết -></a></span>
                    </div>
                </div>
                <div class="swiper-slide col-4">
                    <div class="product-image">
                        <img src="{{asset('assets/images/activity/frame-img.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset('assets/images/activity/image-product.webp')}}" alt="Image" class="image"/>
                    </div>
                    <div class="product-text">
                        <h5 class="product-title">Bút Sáp 24 Màu</h5>
                        <p class="product-detail">Bút sáp 24 màu có bao bì đa dạng, nhiều nhân vật ngộ nghĩnh, đáng yêu phù hợp với các bạn nhỏ ...</p>
                        <span><a href="#">Chi tiết -></a></span>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
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
