<section class="vacancy">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{ route('vacancies_' . Session('lang')) }}">{{__('main.vacancies')}}</a>
        </div>
        <h2 class="page-title">{{__('main.vacancies')}}</h2>
        <div class="vacancy-accordion">
            @foreach ($vacancies as $vacancy)
                <div class="acc-item">
                    <div class="acc-button">
                        <div class="title">
                            {{ $vacancy->getTranslate->where('lang', Session('lang'))->first()->title }}
                        </div>
                        <button>
                            <i class="fa-solid fa-minus"></i>
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class="acc-collapse">
                        <div class="content">
                            <div class="text">
                                {!! $vacancy->getTranslate->where('lang', Session('lang'))->first()->text !!}
                            </div>
                            <a href="{{route('select_vacancy_'.Session('lang'), ['slug' => $vacancy->getTranslate->where('lang',Session('lang'))->first()->slug])}}" class="secondary-button">bu iş üçün müraciət</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
