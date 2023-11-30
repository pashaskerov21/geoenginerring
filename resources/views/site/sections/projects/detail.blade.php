<section class="project-details">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{ route('projects_'.Session('lang'))}}">{{__('main.projects')}}</a>
            <span>/</span>
            <a href="#">{{$project->getTranslate->where('lang',Session('lang'))->first()->title}}</a>
        </div>
        <h3 class="page-title">{{$project->getTranslate->where('lang',Session('lang'))->first()->title}}</h3>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="content">
                    <a href="#" class="location">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{$project->getTranslate->where('lang',Session('lang'))->first()->address}}</span>
                    </a>
                    <div class="text">
                        {!! $project->getTranslate->where('lang',Session('lang'))->first()->main_text !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="project-img">
                    <img src="{{ asset('storage/uploads/projects/' . $project->image) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>