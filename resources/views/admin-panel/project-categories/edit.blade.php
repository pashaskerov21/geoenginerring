@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Kateqoriya Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.project-categories.update', $category->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($category->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($category->getTranslate as $index => $translate)
                                <div class="tab-pane show @if ($index == 0) active @endif"
                                    id="tab_{{ $translate->lang }}">
                                    <div class="mb-3">
                                        <label class="form-label">title {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{ $translate->title }}" required>
                                        <input type="hidden" name="lang[]" value="{{ $translate->lang }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">Header-də görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch2" data-switch="bool" name="header_status"
                                    class="header-status-checkbox" value="1" @checked($category->header_status == 1 ? true : false)/>
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
