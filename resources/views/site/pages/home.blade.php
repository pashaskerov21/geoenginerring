@extends('site.layout')

@section('content')
    <!-- banner section start -->
    @include('site.sections.home.banner')
    <!-- banner section end -->

    <!-- about section start -->
    @include('site.sections.home.about')
    <!-- about section end -->

    <!-- services section start -->
    @include('site.sections.home.services')
    <!-- services section end -->

    <!-- projects section start -->
    @include('site.sections.home.projects')
    <!-- projects section end -->

    <!-- customers section start -->
    @include('site.sections.home.customers')
    <!-- customers section end -->

    <!-- contact section start -->
    @include('site.sections.home.contact')
    <!-- contact section end -->
@endsection
