@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Layihə kateqoriyaları</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.project-categories.create') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Kateqoriya əlavə et</a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>Name</th>
                        <th style="width: 150px">Action</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody id="sortable-tbody">
                    @foreach ($categories as $category)
                        <tr id="sort_{{ $category->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->getTranslate->first()->title }}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a href="{{route('admin.project-categories.edit', $category->id)}}" class="action-icon me-1"> <i class="mdi mdi-square-edit-outline"></i></a>
                                <form action="{{ route('admin.project-categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                            <td>
                                <button class="btn action-icon handle"><i class="ri-drag-move-2-line"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
            $('#sortable-tbody').sortable({
                handle: 'button.handle',
                cancel: '',
                update: function() {
                    let siralama = $('#sortable-tbody').sortable('serialize');
                    $.get("{{ route('admin.project-categories.sort') }}?"+siralama, function(response) {});
                }
            });
        </script>
    @endpush
@endsection
