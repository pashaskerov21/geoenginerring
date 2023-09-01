@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Layihə Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    {{ $error }}
                                </div>
                            @endforeach
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
                            @foreach ($project->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($project->getTranslate as $index => $translate)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{ $translate->lang }}">
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">başlıq {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{$translate->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ünvan {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="address[]" value="{{$translate->address}}">
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
                    <div class="col-12 col-lg-5">
                        <div class="mb-3">
                            <input type="hidden" name="service_id_old" value="{{$project->category_id}}">
                            <label class="form-label">xidmət seçin</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{$project->category_id == $category->id ? 'selected' : ''}}>{{ $category->getTranslate->first()->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
                            @if ($project->image_old)
                                <div class="image-review">
                                    <img src="{{asset('uploads/projects/'.$project->image_old)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ünvan url</label>
                            <input type="text" class="form-control" name="address_url" value="{{$project->address_url}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ana səhifədə görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch1" data-switch="bool" name="home_status"
                                    value="1" {{ $project->home_status == 1 ? 'checked' : '' }} />
                                <label for="switch1" data-on-label="Hə" data-off-label="Yox"></label>
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
