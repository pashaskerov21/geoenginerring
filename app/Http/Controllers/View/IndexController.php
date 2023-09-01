<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AltMenu;
use App\Models\Banner;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Project;
use App\Models\ProjectCategories;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $lang = ['az' => '/', 'tr' => '/tr/', 'en' => '/en/', 'ru' => '/ru/'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $altMenues = AltMenu::where('destroy', 0)->orderBy('sort')->get();
        $banners = Banner::where('destroy', 0)->orderBy('sort')->get();
        $about = About::findOrFail(1);
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        $projects = Project::where('destroy', 0)->orderBy('sort')->get();
        $customers = Customer::where('destroy', 0)->orderBy('sort')->get();
        return view('site.pages.home', compact(['settings', 'lang', 'menues', 'altMenues', 'banners', 'about', 'services', 'projectcategories', 'projects', 'customers']));
    }

    public function home()
    {
        return redirect()->route('index');
    }
}
