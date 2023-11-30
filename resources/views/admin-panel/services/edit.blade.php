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
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
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
                                        <input type="text" class="form-control" name="title[]" value="{{ $translate->title }}" required>
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
                            @if ($service->icon)
                                <div class="image-review">
                                    <img src="{{ asset('storage/uploads/services/icon/' . $service->icon) }}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">card image 1</label>
                            <input type="file" class="form-control" name="card_img_1">
                            @if ($service->card_img_1)
                                <div class="image-review">
                                    <img src="{{ asset('storage/uploads/services/card-images/' . $service->card_img_1) }}"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">card image 2</label>
                            <input type="file" class="form-control" name="card_img_2">
                            @if ($service->card_img_2)
                                <div class="image-review">
                                    <img src="{{ asset('storage/uploads/services/card-images/' . $service->card_img_2) }}"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">text image</label>
                            <input type="file" class="form-control" name="text_img">
                            @if ($service->text_img)
                                <div class="image-review">
                                    <img src="{{ asset('storage/uploads/services/text-images/' . $service->text_img) }}"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">catalog pdf</label>
                            <input type="file" class="form-control" name="catalog_pdf">
                            @if ($service->catalog_pdf)
                                <div class="image-review">
                                    <a target="_blank"
                                        href="{{ asset('storage/uploads/services/pdf/' . $service->catalog_pdf) }}">
                                        Catalog PDF
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ana səhifədə görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch1" data-switch="bool" name="home_status"
                                    value="1" @checked( $service->home_status == 1 ? true : false) />
                                <label for="switch1" data-on-label="Hə" data-off-label="Yox"></label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Header-də görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch2" data-switch="bool" name="header_status" class="header-status-checkbox" 
                                value="1" @checked($service->header_status == 1 ? true : false) />
                                <label for="switch2" data-on-label="Hə" data-off-label="Yox"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
