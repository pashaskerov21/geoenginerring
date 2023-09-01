@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-xl-7">
            <a href="{{route('admin.banner.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Banner</h3>
                    <h3>{{$banners->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-7">
            <a href="{{route('admin.services.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Xidmətlər</h3>
                    <h3>{{$services->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-7">
            <a href="{{route('admin.projects.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Layihələr</h3>
                    <h3>{{$projects->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-7">
            <a href="{{route('admin.customers.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Müştərilər</h3>
                    <h3>{{$customers->count()}}</h3>
                </div>
            </a>
        </div>
    </div>
@endsection
