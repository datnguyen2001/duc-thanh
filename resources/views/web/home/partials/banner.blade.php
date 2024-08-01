<div id="imageCarousel" class="carousel slide slider" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($banners as $index => $banner)
            <li data-target="#imageCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach($banners as $index => $banner)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ $banner->src }}" alt="Slide {{ $index + 1 }}" class="banner-home-desktop">
                <img src="{{ $banner->src_mobile }}" alt="Slide {{ $index + 1 }}" class="banner-home-mobile">
            </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
