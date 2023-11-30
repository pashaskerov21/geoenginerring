@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Haqqımızda</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.about.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#tab_az" data-bs-toggle="tab" class="nav-link rounded-0 active">
                                    <span>az</span>
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
                            @foreach ($about->getTranslate as $index=>$translate)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$translate->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">ana səhifə mətn {{$translate->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->home_text !!}</div>
                                        <textarea name="home_text[]" hidden></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">əsas mətn {{$translate->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->main_text !!}</div>
                                        <textarea name="main_text[]" hidden></textarea>
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                </div>
                            @endforeach
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">şəkil</label>
                            <input type="file" class="form-control" name="image">
                            @if ($about->image)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/about/'.$about->image)}}" alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
