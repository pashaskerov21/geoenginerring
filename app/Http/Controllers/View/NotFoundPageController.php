<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\ProjectCategories;
use App\Models\Service;
use App\Models\Settings;

class NotFoundPageController extends Controller
{
    public function index(){
        $lang = ['az' => '/404', 'en' => '/en/404', 'ru' => '/ru/404'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('site.page-404', compact(['settings', 'lang', 'menues', 'services', 'projectcategories']));
    }
}
