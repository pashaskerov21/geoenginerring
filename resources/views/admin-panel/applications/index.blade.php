@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Müraciətlər</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>ad soyad</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody id="menu-links-tbody">
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a href="{{route('admin.applications.show', $application->id)}}" class="action-icon me-1"> <i class="ri-eye-line"></i></a>
                                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="post">
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
