@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tənzimləmələr</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
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
                            @foreach ($settings->getTranslate as $index=>$translate)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$translate->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">başlıq {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{$translate->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ünvan {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="address[]" value="{{$translate->address}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">description {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="description[]" value="{{$translate->description}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">keywords {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="keywords[]" value="{{$translate->keywords}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">author {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="author[]" value="{{$translate->author}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">copyright {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="copyright[]" value="{{$translate->copyright}}">
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                </div>
                            @endforeach
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">logo</label>
                            <input type="file" class="form-control" name="logo">
                            @if ($settings->logo)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/settings/'.$settings->logo)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">logo ağ</label>
                            <input type="file" class="form-control" name="logo_white">
                            @if ($settings->logo_white)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/settings/'.$settings->logo_white)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">favicon</label>
                            <input type="file" class="form-control" name="favicon">
                            @if ($settings->favicon)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/settings/'.$settings->favicon)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">favicon ağ</label>
                            <input type="file" class="form-control" name="favicon_white">
                            @if ($settings->favicon_white)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/settings/'.$settings->favicon_white)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ünvan (map url)</label>
                            <input type="text" class="form-control" name="address_url" value="{{$settings->address_url}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">mail</label>
                            <input type="text" class="form-control" name="mail" value="{{$settings->mail}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">telefon</label>
                            <input type="text" class="form-control" name="phone" value="{{$settings->phone}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{$settings->twitter}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{$settings->instagram}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">linkedin</label>
                            <input type="text" class="form-control" name="linkedin" value="{{$settings->linkedin}}">
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
