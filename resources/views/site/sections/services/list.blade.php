<section class="services">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{ route('services_'.Session('lang'))}}">{{__('main.services')}}</a>
        </div>
        <h2 class="page-title">{{__('main.our_services')}}</h2>
        <div class="service-rows">
            @foreach ($services as $service)
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="service-banner banner-primary"
                            style="background-image: url('{{ asset('storage/uploads/services/card-images/' . $service->card_img_1) }}');">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="service-banner banner-secondary"
                            style="background-image: url('{{ asset('storage/uploads/services/card-images/' . $service->card_img_1) }}');">
                            <div class="content">
                                <h4 class="title">
                                    {{ $service->getTranslate->where('lang', Session('lang'))->first()->title }}</h4>
                                <div class="text">
                                    <p>{!! $service->getTranslate->where('lang', Session('lang'))->first()->card_text !!}</p>
                                </div>
                                <a href="{{route('service_inner_'.Session('lang'), ['slug' => $service->getTranslate->where('lang', Session('lang'))->first()->slug])}}">{{__('main.details')}}</a>
                                <img class="icon" src="{{ asset('storage/uploads/services/icon/' . $service->icon) }}"
                                    alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
