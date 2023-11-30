<section class="service-details">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{ route('services_' . Session('lang')) }}">{{__('main.services')}}</a>
            <span>/</span>
            <a
                href="{{ route('service_inner_' . Session('lang'), ['slug' => $service->getTranslate->where('lang', Session('lang'))->first()->slug]) }}">{{ $service->getTranslate->where('lang', Session('lang'))->first()->title }}</a>
        </div>
        <h3 class="page-title">{{ $service->getTranslate->where('lang', Session('lang'))->first()->title }}</h3>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="content">
                    <div class="text">
                        {!! $service->getTranslate->where('lang', Session('lang'))->first()->main_text !!}
                    </div>
                    @if ($service->catalog_pdf)
                        <a href="{{ asset('storage/uploads/services/pdf/' . $service->catalog_pdf) }}" target="_blank"
                            class="secondary-button">
                            <i class="fa-regular fa-file-pdf"></i>
                            <span>{{__('main.download_catalog')}}</span>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="service-img">
                    <img src="{{ asset('storage/uploads/services/text-images/' . $service->text_img) }}" alt="">
                </div>
            </div>
        </div>
        @if ($altcontents->count() > 0)
            <div class="service-contents">
                <div class="row">
                    <div class="col-12 col-lg-4 col-xxl-3">
                        <div class="content-triggers">
                            @foreach ($altcontents as $content)
                                <div class="trigger" data-id="{{ $content->id }}">
                                    {{ $content->getTranslate->where('lang', Session('lang'))->first()->title }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xxl-9 px-lg-4">
                        <div class="contents">
                            @foreach ($altcontents as $content)
                                <div class="row content-row d-none" data-id="{{ $content->id }}">
                                    <div class="col-12 col-xl-8 pe-xl-4">
                                        <div class="left">
                                            <h5 class="title">{{ $content->getTranslate->where('lang', Session('lang'))->first()->title }}</h5>
                                            <div class="text">
                                                {!! $content->getTranslate->where('lang', Session('lang'))->first()->text !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <div class="right">
                                            <div class="content-img">
                                                <img src="{{ asset('storage/uploads/services/altcontents/'.$content->image) }}"alt="">
                                                <a href="{{ asset('storage/uploads/services/altcontents/'.$content->image) }}"data-fancybox="">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
