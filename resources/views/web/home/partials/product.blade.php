<div class="home-product">
    <h5>Sản phẩm</h5>
    <h1>
        Các dòng sản phẩm tự hào của <br>
        ĐỨC THANH
    </h1>
    <div class="list-product-desktop">
        <div class="d-flex flex-wrap">
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-1.webp') }}" alt="Product 1" class="product-img">
                <span class="product-title">PHẤN</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-2.webp') }}" alt="Product 2" class="product-img">
                <span class="product-title">BẢNG</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-3.webp') }}" alt="Product 3" class="product-img">
                <span class="product-title">BÚT SÁP MÀU</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-4.webp') }}" alt="Product 4" class="product-img">
                <span class="product-title">SÁP NẶN</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-5.webp') }}" alt="Product 5" class="product-img">
                <span class="product-title">MỰC VÀ BÚT MÁY</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-6.webp') }}" alt="Product 6" class="product-img">
                <span class="product-title">MÀU NƯỚC</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/product-7.webp') }}" alt="Product 7" class="product-img">
                <span class="product-title">SẢN PHẨM KHÁC</span>
            </div>
            <div class="col-3">
                <img src="{{ asset('assets/images/home/product/seemore.png') }}" alt="See More" class="product-img">
                <span class="product-title">XEM TẤT CẢ</span>
            </div>
        </div>
    </div>
    <div class="swiper-wrapper-container">
        <div class="swiper-container list-product-mobile">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-1.webp') }}" alt="Product 1" class="product-img">
                    <span class="product-title">PHẤN</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-2.webp') }}" alt="Product 2" class="product-img">
                    <span class="product-title">BẢNG</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-3.webp') }}" alt="Product 3" class="product-img">
                    <span class="product-title">BÚT SÁP MÀU</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-4.webp') }}" alt="Product 4" class="product-img">
                    <span class="product-title">SÁP NẶN</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-5.webp') }}" alt="Product 5" class="product-img">
                    <span class="product-title">MỰC VÀ BÚT MÁY</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-6.webp') }}" alt="Product 6" class="product-img">
                    <span class="product-title">MÀU NƯỚC</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/product-7.webp') }}" alt="Product 7" class="product-img">
                    <span class="product-title">SẢN PHẨM KHÁC</span>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/home/product/seemore.png') }}" alt="See More" class="product-img">
                    <span class="product-title">XEM TẤT CẢ</span>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>


</div>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            425: {
                slidesPerView: 1,
                spaceBetween: 10,
            }
        }
    });
</script>
