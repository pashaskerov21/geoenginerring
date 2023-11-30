@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @if (Auth::user()->user_type === 'admin')
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add
                                    User</a>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        @endif
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th style="width: 150px">Type</th>
                        @if (Auth::user()->user_type === 'admin')
                            <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="menu-links-tbody">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_type }}</td>
                            @if (Auth::user()->user_type === 'admin')
                                <td class="table-action d-flex" style="height: 70px">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="action-icon"> <i
                                            class="mdi mdi-square-edit-outline"></i></a>
                                    @if ($user->user_type !== 'admin')
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
