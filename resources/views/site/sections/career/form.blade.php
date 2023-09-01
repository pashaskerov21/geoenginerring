<section class="vacancy-form">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="#">{{__('main.apply_for_job')}}</a>
        </div>
        <h3 class="page-title">{{__('main.application_form')}} {{$selectedVacancy ? '- '.$selectedVacancy->getTranslate->where('lang', Session('lang'))->first()->title : ''}}</h3>
        <form action="{{route('vacancy_form_submit_'.Session('lang'))}}" method="POST" class="vacancy-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if ($selectedVacancy)
                    <input type="hidden" name="selected_vacancy" value="{{$selectedVacancy->id}}">
                @endif
                @if ( !$selectedVacancy)
                    <div class="col-12 p-0">
                        <div class="form-item">
                            <label>{{__('main.selected_vacany')}}</label>
                            <select class="form-select" name="selected_vacancy">
                                <option disabled selected>{{$vacancies->count() > 0 ? __('main.choose') : __('main.empty')}}</option>
                                @foreach ($vacancies as $vacancy)
                                    <option value="{{$vacancy->id}}">{{ $vacancy->getTranslate->where('lang', Session('lang'))->first()->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="col-12 col-lg-6 p-0 pe-lg-2">
                    <div class="row inner-row">
                        <div class="col-12">
                            <div class="f-title">
                                <span>{{__('main.personal_info')}}</span>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="user-photo row">
                                <div class="col-12 col-md-6">
                                    <div class="file-input">
                                        <input type="file" name="image">
                                        <div class="label">
                                            <i class="fa-solid fa-user"></i>
                                            <span>{{__('main.upload_photo')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="file-result">
                                        <img src="{{ asset('front-assets/images/form/person.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-0 pe-md-2">
                            <div class="form-item">
                                <label>{{__('main.name')}}</label>
                                <input type="text" class="form-control vacancy-validate" name="first_name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-0 ps-md-2">
                            <div class="form-item">
                                <label>{{__('main.surname')}}</label>
                                <input type="text" class="form-control vacancy-validate" name="last_name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-0 pe-md-2">
                            <div class="form-item">
                                <label>{{__('main.father_name')}}</label>
                                <input type="text" class="form-control vacancy-validate" name="father_name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-0 ps-md-2">
                            <div class="form-item">
                                <label>{{__('main.gender')}}</label>
                                <select class="form-select" name="gender">
                                    <option value="male">{{__('main.male')}}</option>
                                    <option value="female">{{__('main.female')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-0 pe-md-2">
                            <div class="form-item">
                                <label>{{__('main.birth_date')}}</label>
                                <input type="date" class="form-control vacancy-validate" name="birth">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-0 ps-md-2">
                            <div class="form-item">
                                <label>{{__('main.cv')}}</label>
                                <input type="file" class="form-control vacancy-validate" name="cv">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-0 ps-lg-2">
                    <div class="f-wrapper">
                        <div class="f-title">
                            <span>{{__('main.contact')}}</span>
                            <div class="line"></div>
                        </div>
                        <div class="form-item">
                            <label>{{__('main.email')}}</label>
                            <input type="email" class="form-control vacancy-validate" name="email">
                        </div>
                        <div class="form-item">
                            <label>{{__('main.phone')}}</label>
                            <input type="number" class="form-control vacancy-validate" name="phone">
                        </div>
                        <div class="form-item">
                            <label>{{__('main.linkedin_url')}}</label>
                            <input type="url" class="form-control" placeholder="https://www.linkedin.com/"
                                name="linkedin_url">
                        </div>
                        <div class="form-item">
                            <label>{{__('main.address')}}</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="row inner-row">
                        <div class="col-12">
                            <div class="f-title">
                                <span>{{__('main.education')}}</span>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-wrapper education">
                                <div class="detail-row">
                                    <div class="inner">
                                        <div class="form-item">
                                            <label>{{__('main.education_level')}}</label>
                                            <select class="form-select" name="education_level">
                                                <option value="school">{{__('main.school')}}</option>
                                                <option value="collage">{{__('main.collage')}}</option>
                                                <option value="unvercity">{{__('main.unvercity')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.education_instution_name')}}</label>
                                            <input type="text" class="form-control v-detail-validate"
                                                name="education_name">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.field')}}</label>
                                            <input type="text" class="form-control v-detail-validate"
                                                name="education_field">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.start_date')}}</label>
                                            <input type="date" class="form-control v-detail-validate"
                                                name="education_start_date">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.end_date')}}</label>
                                            <input type="date" class="form-control v-detail-validate"
                                                name="education_end_date">
                                        </div>
                                        <div class="add-button">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-result">
                                    <div class="empty">
                                        <span>{{__('main.empty')}}</span>
                                    </div>
                                    <table class="table table-bordered d-none"></table>
                                    <input type="hidden" name="education[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="row inner-row">
                        <div class="col-12">
                            <div class="f-title">
                                <span>{{__('main.work')}}</span>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-wrapper work">
                                <div class="detail-row">
                                    <div class="inner">
                                        <div class="form-item">
                                            <label>{{__('main.company_name')}}</label>
                                            <input type="text" class="form-control v-detail-validate"
                                                name="company_name">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.position')}}</label>
                                            <input type="text" class="form-control v-detail-validate"
                                                name="position">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.start_date')}}</label>
                                            <input type="date" class="form-control v-detail-validate"
                                                name="work_start_date">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.end_date')}}</label>
                                            <input type="date" class="form-control v-detail-validate"
                                                name="work_end_date">
                                        </div>
                                        <div class="add-button">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-result">
                                    <div class="empty">
                                        <span>{{__('main.empty')}}</span>
                                    </div>
                                    <table class="table table-bordered d-none"></table>
                                    <input type="hidden" name="work[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="row inner-row">
                        <div class="col-12">
                            <div class="f-title">
                                <span>{{__('main.certificates')}}</span>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-wrapper certificate">
                                <div class="detail-row">
                                    <div class="inner">
                                        <div class="form-item">
                                            <label>{{__('main.certificate_name')}}</label>
                                            <input type="text" class="form-control v-detail-validate"
                                                name="certificate_name">
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.expiry_date')}}</label>
                                            <input type="date" class="form-control v-detail-validate"
                                                name="certificate_date">
                                        </div>
                                        <div class="add-button">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-result">
                                    <div class="empty">
                                        <span>{{__('main.empty')}}</span>
                                    </div>
                                    <table class="table table-bordered d-none"></table>
                                    <input type="hidden" name="certificate[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="row inner-row">
                        <div class="col-12">
                            <div class="f-title">
                                <span>{{__('main.foreign_lang')}}</span>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-wrapper language">
                                <div class="detail-row">
                                    <div class="inner">
                                        <div class="form-item">
                                            <label>{{__('main.language')}}</label>
                                            <select class="form-select" name="language_name">
                                                <option value="Azərbaycan">Azərbaycan</option>
                                                <option value="İngilis">İngilis</option>
                                                <option value="Rus">Rus</option>
                                            </select>
                                        </div>
                                        <div class="form-item">
                                            <label>{{__('main.lang_level')}}</label>
                                            <select class="form-select" name="language_level">
                                                <option value="Poor">{{__('main.poor')}}</option>
                                                <option value="Medium">{{__('main.medium')}}</option>
                                                <option value="Excellent">{{__('main.excellent')}}</option>
                                            </select>
                                        </div>
                                        <div class="add-button">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-result">
                                    <div class="empty">
                                        <span>{{__('main.empty')}}</span>
                                    </div>
                                    <table class="table table-bordered d-none"></table>
                                    <input type="hidden" name="language[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <button type="submit" class="secondary-button submit-button">{{__('main.send')}}</button>
                </div>
            </div>
        </form>
    </div>
</section>
