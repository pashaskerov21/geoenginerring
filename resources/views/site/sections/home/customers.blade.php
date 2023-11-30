<section class="customers">
    <div class="container">
        <h2 class="section-title">{{__('main.our_customers')}}</h2>
        <div class="swiper customer-swiper">
            <div class="swiper-wrapper">
                @foreach ($customers as $customer)
                    <div class="swiper-slide">
                        <a href="{{$customer->url}}" target="_blank" class="customer-logo">
                            <img src="{{ asset('storage/uploads/customers/'.$customer->image) }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
