@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Account</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.account.update', Auth::user()->id) }}" method="POST">
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
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control" name="name" value="{{ $admin->name ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="email" class="form-control" name="email" value="{{ $admin->email ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">current password</label>
                            <input type="password" class="form-control" name="current_password" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">new password</label>
                            <input type="password" class="form-control" name="new_password" value="">
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
