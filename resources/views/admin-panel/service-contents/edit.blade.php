@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Alt Məzmun Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.service-contents.update', $altcontent->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($altcontent->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($altcontent->getTranslate as $index => $translate)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{ $translate->lang }}">
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">başlıq {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{$translate->title}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">mətn {{$translate->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->text !!}</div>
                                        <textarea name="text[]" hidden></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="mb-3">
                            <input type="hidden" name="service_id_old" value="{{$altcontent->service_id}}">
                            <label class="form-label">xidmət seçin</label>
                            <select name="service_id" class="form-select">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" @selected($altcontent->service_id == $service->id ? true : false)>
                                        {{ $service->getTranslate->first()->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
                            @if ($altcontent->image)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/services/altcontents/'.$altcontent->image)}}" alt="">
                                </div>
                            @endif
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
