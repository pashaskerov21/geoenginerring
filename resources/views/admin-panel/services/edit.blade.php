@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Xidmət Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @if ($errors->any())
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                                @foreach ($errors->all() as $error)
                                    <div class="mb-1">{{ $error }}</div>
                                @endforeach
                            </div>

                        </div>
                    @endif
                    @if (session('menuError'))
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ session('menuError') }}
                            </div>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-lg-7">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($service->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($service->getTranslate as $index => $translate)
                                <div class="tab-pane show @if ($index == 0) active @endif"
                                    id="tab_{{ $translate->lang }}">
                                    <input type="hidden" name="lang[]" value="{{ $translate->lang }}">
                                    <div class="mb-3">
                                        <label class="form-label">başlıq {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="title[]"
                                            value="{{ $translate->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">card mətn {{ $translate->lang }}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->card_text !!}</div>
                                        <textarea name="card_text[]" hidden></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">əsas mətn {{ $translate->lang }}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->main_text !!}</div>
                                        <textarea name="main_text[]" hidden></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">icon</label>
                            <input type="file" class="form-control" name="icon">
                            @if ($service->icon_old)
                                <div class="image-review">
                                    <img src="{{ asset('uploads/services/icon/' . $service->icon_old) }}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">card image 1</label>
                            <input type="file" class="form-control" name="card_img_1">
                            @if ($service->card_img_1_old)
                                <div class="image-review">
                                    <img src="{{ asset('uploads/services/card-images/' . $service->card_img_1_old) }}"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">card image 2</label>
                            <input type="file" class="form-control" name="card_img_2">
                            @if ($service->card_img_2_old)
                                <div class="image-review">
                                    <img src="{{ asset('uploads/services/card-images/' . $service->card_img_2_old) }}"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">text image</label>
                            <input type="file" class="form-control" name="text_img">
                            @if ($service->text_img_old)
                                <div class="image-review">
                                    <img src="{{ asset('uploads/services/text-images/' . $service->text_img_old) }}"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">catalog pdf</label>
                            <input type="file" class="form-control" name="catalog_pdf">
                            @if ($service->catalog_pdf_old)
                                <div class="image-review">
                                    <a target="_blank"
                                        href="{{ asset('uploads/services/pdf/' . $service->catalog_pdf_old) }}">Catalog
                                        PDF</a>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ana səhifədə görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch1" data-switch="bool" name="home_status"
                                    value="1" {{ $service->home_status == 1 ? 'checked' : '' }} />
                                <label for="switch1" data-on-label="Hə" data-off-label="Yox"></label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Header-də görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch2" data-switch="bool" name="header_status" class="header-status-checkbox"
                                    value="1" {{ $service->header_status == 1 ? 'checked' : '' }} />
                                <label for="switch2" data-on-label="Hə" data-off-label="Yox"></label>
                            </div>
                        </div>
                        <div class="mb-3 main-menu-select {{ $service->header_status == 1 ? '' : 'd-none' }}">
                            <label class="form-label">əsas menyu seçin</label>
                            <input type="hidden" name="parent_id_old" value="{{$service->parent_id}}">
                            <select name="parent_id" class="form-select">
                                <option disabled {{ $service->parent_id == null ? 'selected' : '' }}>Seçin</option>
                                @foreach ($menues as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ $service->parent_id == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->getTranslate->first()->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('js')
        <script>
            $('.header-status-checkbox').on('input', function(){
                var isChecked = $(this).prop('checked') ? true : false; 
                if(isChecked){
                    $('.main-menu-select').removeClass('d-none');
                }else{
                    $('.main-menu-select').addClass('d-none');
                }
            })
        </script>
    @endpush
@endsection
