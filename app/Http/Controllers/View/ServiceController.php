<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\AltMenu;
use App\Models\Menu;
use App\Models\ProjectCategories;
use App\Models\Service;
use App\Models\ServiceTranslate;
use App\Models\Settings;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $lang = ['az' => '/xidmetler', 'tr' => '/tr/hizmetler', 'en' => '/en/services', 'ru' => '/ru/servis'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $altMenues = AltMenu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('site.pages.services.index', compact(['settings', 'lang', 'menues', 'altMenues', 'services', 'projectcategories']));
    }
    public function details($slug)
    {

        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $altMenues = AltMenu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();

        $serviceTranslate = ServiceTranslate::where('slug', $slug)->first();
        if ($serviceTranslate) {
            $service = Service::findOrFail($serviceTranslate->service_id);
            if ($service) {
                $serviceSlugs = ServiceTranslate::where('service_id', $service->id)->get();
                $lang = [
                    'az' => '/xidmetler/' . $serviceSlugs->where('lang', 'az')->first()->slug,
                    'tr' => '/tr/hizmetler/' . $serviceSlugs->where('lang', 'tr')->first()->slug,
                    'en' => '/en/services/' . $serviceSlugs->where('lang', 'en')->first()->slug,
                    'ru' => '/ru/servis/' . $serviceSlugs->where('lang', 'ru')->first()->slug
                ];

                $altcontents = $service->getAltContents;
                return view('site.pages.services.detail', compact(['settings', 'lang', 'menues', 'altMenues', 'services', 'projectcategories', 'service', 'altcontents']));
            } else {
                return redirect()->route('not_found');
            }
        } else {
            return redirect()->route('not_found');
        }
    }
}
