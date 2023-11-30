@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Vakansiya əlavə et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.vacancy.store') }}" method="POST" class="needs-validation" novalidate>
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
                                <input type="hidden" name="lang[]" value="az">
                                <div class="mb-3">
                                    <label class="form-label">başlıq az</label>
                                    <input type="text" class="form-control" name="title[]" required>
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
                                    <input type="text" class="form-control" name="title[]" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mətn en</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_ru">
                                <input type="hidden" name="lang[]" value="ru">
                                <div class="mb-3">
                                    <label class="form-label">başlıq ru</label>
                                    <input type="text" class="form-control" name="title[]" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mətn ru</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
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
