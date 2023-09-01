@include('admin-panel.partials.head.head_main')

<div class="wrapper">
    @include('admin-panel.partials.navbar')
    @include('admin-panel.partials.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('admin-panel.partials.theme_settings')

@include('admin-panel.partials.foot.foot_main')
