<div class="container">
    <div class="list-video">
        <h5 class="sub-title">Video sản phẩm</h5>
        <h1>Video ngắn giới thiệu sản phẩm</h1>
        <div class="swiper-container">
            <div class="list-video-product swiper-wrapper">
                <div class="swiper-slide">
                    <div class="video-image">
                        <img src="{{asset('assets/images/activity/frame-video.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset('assets/images/activity/video-product.webp')}}" alt="Image" class="video"/>
                        <img src="{{asset('assets/images/activity/tiktok.png')}}" alt="TikTok" class="tiktok"/>
                    </div>
                    <div class="video-text">
                        <div class="d-flex justify-content-between">
                            <p class="d-flex align-items-center">Xem thêm các video ...</p>
                            <a href="#" class="video-btn">Xem ngay</a>
                        </div>
                        <p>@tbgdducthanh</p>
                        <p>Bộ bút sáp màu"Cô bé quàng khăn đỏ" mới ra mắt nhà Đức Thanh với màu sắc ...</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="video-image">
                        <img src="{{asset('assets/images/activity/frame-video.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset('assets/images/activity/video-product.webp')}}" alt="Image" class="video"/>
                        <img src="{{asset('assets/images/activity/tiktok.png')}}" alt="TikTok" class="tiktok"/>
                    </div>
                    <div class="video-text">
                        <div class="d-flex justify-content-between">
                            <p class="d-flex align-items-center">Xem thêm các video ...</p>
                            <a href="#" class="video-btn">Xem ngay</a>
                        </div>
                        <p>@tbgdducthanh</p>
                        <p>Bộ bút sáp màu"Cô bé quàng khăn đỏ" mới ra mắt nhà Đức Thanh với màu sắc ...</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="video-image">
                        <img src="{{asset('assets/images/activity/frame-video.png')}}" alt="Frame" class="frame"/>
                        <img src="{{asset('assets/images/activity/video-product.webp')}}" alt="Image" class="video"/>
                        <img src="{{asset('assets/images/activity/tiktok.png')}}" alt="TikTok" class="tiktok"/>
                    </div>
                    <div class="video-text">
                        <div class="d-flex justify-content-between">
                            <p class="d-flex align-items-center">Xem thêm các video ...</p>
                            <a href="#" class="video-btn">Xem ngay</a>
                        </div>
                        <p>@tbgdducthanh</p>
                        <p>Bộ bút sáp màu"Cô bé quàng khăn đỏ" mới ra mắt nhà Đức Thanh với màu sắc ...</p>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"><img src="{{asset('assets/images/activity/next-btn.png')}}" alt="Next"/></div>
            <div class="swiper-button-prev" style="position: absolute; left: 0">
                <img src="{{asset('assets/images/activity/prev-btn.png')}}" alt="Prev"/>
            </div>
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
