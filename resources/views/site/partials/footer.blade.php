<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="footer-links">
                        <h5 class="title"><span>{{__('main.pages')}}</span></h5>
                        @foreach ($menues as $menu)
                        <a @if (Session('lang') == 'az')
                            href="{{url($menu->getTranslate->where('lang',Session('lang'))->first()->slug)}}"
                            @else
                            href="{{url(Session('lang').'/'.$menu->getTranslate->where('lang',Session('lang'))->first()->slug)}}"
                            @endif
                        >{{ $menu->getTranslate->where('lang', Session('lang'))->first()->name }}
                    </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="footer-links">
                        <h5 class="title">{{__('main.our_services')}}</h5>
                        @foreach ($services as $service)
                            <a href="{{route('service_inner_'.Session('lang'), ['slug' => $service->getTranslate->where('lang', Session('lang'))->first()->slug])}}"><span>{{ $service->getTranslate->where('lang', Session('lang'))->first()->title }}</span></a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="contact-links">
                        <h5 class="title">{{__('main.contact')}}</h5>
                        <a href="#">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ $settings->phone_az }}</span>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ $settings->phone_tr }}</span>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{{ $settings->mail }}</span>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $settings->getTranslate->where('lang', Session('lang'))->first()->address_az }}</span>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $settings->getTranslate->where('lang', Session('lang'))->first()->address_tr }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{ asset('uploads/settings/'.$settings->logo_white) }}" alt="logo">
                </a>
                <div class="right">
                    <div class="copyright">{{$settings->getTranslate->where('lang', Session('lang'))->first()->copyright}}</div>
                    <div class="r-bottom">
                        <div class="rb-left">
                            Powered by <a href="#">Proton.az</a>
                        </div>
                        <div class="social-icons">
                            <a href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $settings->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $settings->instagram }}"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $settings->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
