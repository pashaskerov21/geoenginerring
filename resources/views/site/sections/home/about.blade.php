<section class="home-about">
    <img src="{{asset('front-assets/images/logo/favicon.png')}}" class="design-logo right" alt="">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="content">
                <div class="text">
                    {!! $about->getTranslate->where('lang', Session('lang'))->first()->hometext !!}
                </div>
                <a href="{{route('about_'.Session('lang'))}}" class="primary-button"><span>{{__('main.details')}}</span></a>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="about-bg" style="background-image: url('{{asset('uploads/about/'.$about->home_image)}}');"></div>
        </div>
    </div>
</section>