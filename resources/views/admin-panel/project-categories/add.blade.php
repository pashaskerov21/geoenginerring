@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Layihə kateqoriyası əlavə et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.project-categories.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-7">
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
                            <div class="tab-pane show active" id="tab_az">
                                <div class="mb-3">
                                    <label class="form-label">title az</label>
                                    <input type="text" class="form-control" name="title[]" required>
                                    <input type="hidden" name="lang[]" value="az">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="mb-3">
                                    <label class="form-label">title en</label>
                                    <input type="text" class="form-control" name="title[]" required>
                                    <input type="hidden" name="lang[]" value="en">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_ru">
                                <div class="mb-3">
                                    <label class="form-label">title ru</label>
                                    <input type="text" class="form-control" name="title[]" required>
                                    <input type="hidden" name="lang[]" value="ru">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">Header-də görünsün?</label>
                            <div>
                                <input type="checkbox" id="switch2" data-switch="bool" name="header_status" value="1" class="header-status-checkbox" />
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
