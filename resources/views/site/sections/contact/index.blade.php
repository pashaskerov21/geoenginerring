<section class="contact">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{route('contact_'.Session('lang'))}}">{{__('main.contact_us')}}</a>
        </div>
        <h2 class="page-title">{{__('main.contact')}}</h2>
        <div class="row">
            <div class="col-12 col-lg-6 p-0">
                <form action="{{route('contact_send_message_'.Session('lang'))}}" method="POST" class="row contact-form">
                    @csrf
                    <div class="col-12 col-md-6 pe-md-2">
                        <input type="text" class="form-control contact-validate" placeholder="{{__('main.name')}}" name="name">
                    </div>
                    <div class="col-12 col-md-6 ps-md-2">
                        <input type="number" class="form-control contact-validate" placeholder="{{__('main.phone')}}" name="phone">
                    </div>
                    <div class="col-12 col-md-6 pe-md-2">
                        <input type="email" class="form-control contact-validate" placeholder="{{__('main.email')}}" name="email">
                    </div>
                    <div class="col-12 col-md-6 ps-md-2">
                        <input type="text" class="form-control contact-validate" placeholder="{{__('main.subject')}}" name="subject">
                    </div>
                    <div class="col-12">
                        <textarea rows="5" class="form-control contact-validate" placeholder="{{__('main.message')}}" name="text"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="submit-button secondary-button">{{__('main.send')}}</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-6 p-0 p-lg-4">
                <div class="contact-info">
                    <a href="#" class="contact-link">
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ $settings->phone }}</span>
                    </a>
                    <a href="#" class="contact-link">
                        <i class="fa-solid fa-envelope"></i>
                        <span>{{ $settings->mail }}</span>
                    </a>
                    <a href="#" class="contact-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $settings->getTranslate->where('lang', Session('lang'))->first()->address }}</span>
                    </a>
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
</section>