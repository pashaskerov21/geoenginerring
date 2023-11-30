<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Menu;
use App\Models\ProjectCategories;
use App\Models\Service;
use App\Models\Settings;

class AboutController extends Controller
{
    public function index()
    {
        $lang = ['az' => '/haqqimizda', 'en' => '/en/about-us', 'ru' => '/ru/o-nas'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $about = About::findOrFail(1);
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('site.pages.about', compact(['settings', 'lang', 'menues', 'about', 'services', 'projectcategories']));
    }
}
