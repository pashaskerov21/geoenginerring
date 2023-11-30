@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Mesajlar</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>ad</th>
                        <th>email</th>
                        <th>mövzu</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody id="menu-links-tbody">
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a href="{{route('admin.messages.show', $message->id)}}" class="action-icon me-1"> <i class="ri-eye-line"></i></a>
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
