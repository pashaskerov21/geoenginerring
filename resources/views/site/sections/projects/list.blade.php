<section class="projects">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">{{__('main.home_page')}}</a>
            <span>/</span>
            <a href="{{ route('projects_' . Session('lang')) }}">{{__('main.projects')}}</a>
            @if ($category)
            <span>/</span>
            <a href="{{ route('projects_' . Session('lang')) }}">
                {{ $category->getTranslate->where('lang', Session('lang'))->first()->title }}
            </a>     
            @endif
        </div>
        <h2 class="page-title">
            {{__('main.our_projects')}}
            @if ($category)
                - {{ $category->getTranslate->where('lang', Session('lang'))->first()->title }}
            @endif
        </h2>
        <div class="project-rows">
            @foreach ($projects as $project)
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="content">
                            <h4 class="title">
                                {{ $project->getTranslate->where('lang', Session('lang'))->first()->title }}
                            </h4>
                            <a href="{{ $project->address }}" target="_blank" class="location">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $project->getTranslate->where('lang', Session('lang'))->first()->address }}</span>
                            </a>
                            <div class="text">
                                {!! $project->getTranslate->where('lang', Session('lang'))->first()->card_text !!}
                            </div>
                            <a href="{{ route('project_inner_' . Session('lang'), [
                                'categorySlug' => $project->getCategory->first()->getTranslate->where('lang', Session('lang'))->first()->slug,
                                'projectSlug' => $project->getTranslate->where('lang', Session('lang'))->first()->slug,
                            ]) }}"
                                class="secondary-button">
                                {{__('main.see_project')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="project-img"
                            style="background-image: url('{{ asset('storage/uploads/projects/' . $project->image) }}');">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
