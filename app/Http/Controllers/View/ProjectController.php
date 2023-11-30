<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Project;
use App\Models\ProjectCategories;
use App\Models\ProjectCategoryTranslate;
use App\Models\ProjectTranslate;
use App\Models\Service;
use App\Models\Settings;

class ProjectController extends Controller
{
    public function index()
    {
        $lang = ['az' => '/layiheler', 'en' => '/en/projects', 'ru' => '/ru/proekty'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        $projects = Project::where('destroy', 0)->orderBy('sort')->get();
        $category = null;
        return view('site.pages.projects.index', compact(['settings', 'lang', 'menues', 'services', 'projectcategories', 'category', 'projects']));
    }
    public function category($categorySlug)
    {

        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();

        $categoryTranslate = ProjectCategoryTranslate::where('slug', $categorySlug)->first();
        if ($categoryTranslate) {
            $category = ProjectCategories::findOrFail($categoryTranslate->category_id);
            if ($category) {
                $projects = $category->getProjects;
                $lang = [
                    'az' => '/layiheler/' . $category->getTranslate->where('lang', 'az')->first()->slug,
                    'en' => '/en/projects/' . $category->getTranslate->where('lang', 'en')->first()->slug,
                    'ru' => '/ru/proekty/' . $category->getTranslate->where('lang', 'ru')->first()->slug
                ];
                return view('site.pages.projects.index', compact(['settings', 'lang', 'menues', 'services', 'projectcategories', 'category', 'projects']));
            } else {
                return redirect()->route('not_found');
            }
        } else {
            return redirect()->route('not_found');
        }
    }
    public function details($categorySlug,$projectSlug)
    {
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();

        $projectTranslate = ProjectTranslate::where('slug', $projectSlug)->first();
        $categoryTranslate = ProjectCategoryTranslate::where('slug', $categorySlug)->first();
        if ($categoryTranslate && $projectTranslate) {
            $category = ProjectCategories::findOrFail($categoryTranslate->category_id);
            $project = Project::findOrFail($projectTranslate->project_id);
            if ($category && $project) {
                $projectSlugs = ProjectTranslate::where('project_id', $project->id)->get();
                $lang = [
                    'az' => '/layiheler/' . $category->getTranslate->where('lang', 'az')->first()->slug .'/'.$projectSlugs->where('lang', 'az')->first()->slug,
                    'en' => '/en/projects/' .$category->getTranslate->where('lang', 'az')->first()->slug .'/'. $projectSlugs->where('lang', 'en')->first()->slug,
                    'ru' => '/ru/proekty/' .$category->getTranslate->where('lang', 'az')->first()->slug .'/'. $projectSlugs->where('lang', 'ru')->first()->slug
                ];
                return view('site.pages.projects.detail', compact(['settings', 'lang', 'menues', 'services', 'projectcategories', 'project']));
            } else {
                return redirect()->route('not_found');
            }
        } else {
            return redirect()->route('not_found');
        }
    }
}
