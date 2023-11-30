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
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
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
                                        <input type="text" class="form-control" name="title[]" value="{{$translate->title}}" required>
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
                            <select name="category_id" class="form-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{$project->category_id == $category->id ? 'selected' : ''}}>
                                        {{ $category->getTranslate->first()->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
                            @if ($project->image_old)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/projects/'.$project->image)}}" alt="">
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
                                    value="1" @checked($project->home_status == 1 ? true : false)/>
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
