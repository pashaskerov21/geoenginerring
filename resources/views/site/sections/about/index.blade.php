<section class="about">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{route('about_'.Session('lang'))}}">{{__('main.about_us')}}</a>
        </div>
        <h2 class="page-title">{{__('main.about_us')}}</h2>
        <div class="text">
            {!! $about->getTranslate->where('lang', Session('lang'))->first()->main_text !!}
        </div>
    </div>
</section>