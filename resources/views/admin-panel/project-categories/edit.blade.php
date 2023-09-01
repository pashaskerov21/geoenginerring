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
            <form action="{{ route('admin.project-categories.update', $category->id) }}" method="POST">
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
                                        <label class="form-label">name {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="name[]"
                                            value="{{ $translate->name }}">
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
                                    class="header-status-checkbox" value="1"
                                    {{ $category->header_status == 1 ? 'checked' : '' }} />
                                <label for="switch2" data-on-label="Hə" data-off-label="Yox"></label>
                            </div>
                        </div>
                        <div class="mb-3 main-menu-select {{ $category->header_status == 1 ? '' : 'd-none' }}">
                            <label class="form-label">əsas menyu seçin</label>
                            <input type="hidden" name="parent_id_old" value="{{ $category->parent_id }}">
                            <select name="parent_id" class="form-select">
                                <option disabled {{ $category->parent_id == null ? 'selected' : '' }}>Seçin</option>
                                @foreach ($menues as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ $category->parent_id == $menu->id ? 'selected' : '' }}>
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
            $('.header-status-checkbox').on('input', function() {
                var isChecked = $(this).prop('checked') ? true : false;
                if (isChecked) {
                    $('.main-menu-select').removeClass('d-none');
                } else {
                    $('.main-menu-select').addClass('d-none');
                }
            })
        </script>
    @endpush
@endsection
