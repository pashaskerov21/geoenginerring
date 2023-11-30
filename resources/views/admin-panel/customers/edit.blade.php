@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Müştəri Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
                            @if ($customer->image)
                                <div class="image-review">
                                    <img src="{{asset('storage/uploads/customers/'.$customer->image)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">url</label>
                            <input type="text" class="form-control" name="url" value="{{$customer->url}}">
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
