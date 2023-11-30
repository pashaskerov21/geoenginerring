<section class="banner">
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <div class="banner-img"style="background-image: url('{{ asset('storage/uploads/banner/'.$banner->image) }}');"></div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
