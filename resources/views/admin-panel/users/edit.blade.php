@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">User düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">type</label>
                            <select class="form-select" name="user_type">
                                <option {{ $user->user_type === 'user' ? 'selected' : '' }} value="user">user</option>
                                <option {{ $user->user_type === 'admin' ? 'selected' : '' }} value="admin">admin</option>
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

@endsection
