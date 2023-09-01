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
                            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-lg-6">
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
                            @foreach ($about->getTranslate as $index=>$translate)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$translate->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">ana səhifə mətn {{$translate->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->hometext !!}</div>
                                        <textarea name="hometext[]" hidden></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">əsas mətn {{$translate->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->maintext !!}</div>
                                        <textarea name="maintext[]" hidden></textarea>
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                </div>
                            @endforeach
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">ana səhifə şəkil</label>
                            <input type="file" class="form-control" name="home_image">
                            @if ($about->home_image)
                                <div class="image-review">
                                    <img src="{{asset('uploads/about/'.$about->home_image)}}" alt="">
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
