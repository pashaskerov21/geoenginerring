@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Alt Məzmun əlavə et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.service-contents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <div class="col-12 col-lg-7">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#tab_az" data-bs-toggle="tab" class="nav-link rounded-0 active">
                                    <span>az</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_tr" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <span>tr</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_en" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <span>en</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_ru" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <span>ru</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab_az">
                                <input type="hidden" name="lang[]" value="az">
                                <div class="mb-3">
                                    <label class="form-label">başlıq az</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mətn az</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                            <div class="tab-pane show" id="tab_tr">
                                <input type="hidden" name="lang[]" value="tr">
                                <div class="mb-3">
                                    <label class="form-label">başlıq tr</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mətn az</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <input type="hidden" name="lang[]" value="en">
                                <div class="mb-3">
                                    <label class="form-label">başlıq en</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mətn az</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_ru">
                                <input type="hidden" name="lang[]" value="ru">
                                <div class="mb-3">
                                    <label class="form-label">başlıq ru</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mətn az</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="mb-3">
                            <label class="form-label">xidmət seçin</label>
                            <select name="service_id" class="form-select">
                                <option disabled selected>{{ $services->count() == 0 ? 'Xidmət yoxdur' : 'Seçin' }}</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->getTranslate->first()->title }}</option>
                                @endforeach
                            </select>
                            @if ($services->count() == 0)
                                <a href="{{ route('admin.services.create') }}" class="btn btn-danger my-2">
                                    Xidmət əlavə et
                                </a>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
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
