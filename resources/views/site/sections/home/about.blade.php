<section class="home-about">
    <img src="{{asset('front-assets/images/logo/favicon.png')}}" class="design-logo right" alt="">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="content">
                <div class="text">
                    {!! $about->getTranslate->where('lang', Session('lang'))->first()->home_text !!}
                </div>
                <a href="{{route('about_'.Session('lang'))}}" class="primary-button"><span>{{__('main.details')}}</span></a>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="about-bg" style="background-image: url('{{asset('storage/uploads/about/'.$about->image)}}');"></div>
        </div>
    </div>
</section>