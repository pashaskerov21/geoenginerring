<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\ApplicationCertificate;
use App\Models\ApplicationEducation;
use App\Models\ApplicationLanguage;
use App\Models\ApplicationWork;
use App\Models\Menu;
use App\Models\ProjectCategories;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Vacancy;
use App\Models\VacancyApplication;
use App\Models\VacancyTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function index()
    {
        $lang = ['az' => '/insan-resurslari/vakansiyalar', 'en' => '/en/human-resources/vacancies', 'ru' => '/ru/celoveceskie-resursy/vakansii'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        $vacancies = Vacancy::where('destroy', 0)->orderBy('sort')->get();
        if ($vacancies->count() > 0) {
            return view('site.pages.career.index', compact(['settings', 'lang', 'menues', 'services', 'projectcategories', 'vacancies']));
        } else {
            return redirect()->route('apply_page_' . Session('lang'));
        }
    }
    public function career()
    {
        return redirect()->route('vacancies_' . Session('lang'));
    }
    public function applypage()
    {
        $lang = [
            'az' => '/insan-resurslari/is-ucun-muraciet',
            'en' => '/en/human-resources/apply-for-a-job',
            'ru' => '/ru/celoveceskie-resursy/zaiavka-na-rabotu'
        ];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        $vacancies = Vacancy::where('destroy', 0)->orderBy('sort')->get();
        $selectedVacancy = null;
        return view('site.pages.career.form', compact(['settings', 'lang', 'menues', 'services', 'projectcategories', 'vacancies', 'selectedVacancy']));
    }
    public function selectvacancy($slug)
    {

        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        $vacancies = Vacancy::where('destroy', 0)->orderBy('sort')->get();
        $vacancTranslate = VacancyTranslate::where('slug', $slug);
        if ($vacancTranslate) {
            $selectedVacancy = Vacancy::findOrFail($vacancTranslate->first()->vacancy_id);
            if ($selectedVacancy) {
                $vacancySlugs = VacancyTranslate::where('vacancy_id', $selectedVacancy->id)->get();
                $lang = [
                    'az' => '/insan-resurslari/is-ucun-muraciet/' . $vacancySlugs->where('lang', 'az')->first()->slug,
                    'en' => '/en/human-resources/apply-for-a-job/' . $vacancySlugs->where('lang', 'en')->first()->slug,
                    'ru' => '/ru/celoveceskie-resursy/zaiavka-na-rabotu/' . $vacancySlugs->where('lang', 'ru')->first()->slug
                ];
                return view('site.pages.career.form', compact(['settings', 'lang', 'menues', 'services', 'projectcategories', 'vacancies', 'selectedVacancy']));
            } else {
                return redirect()->route('not_found');
            }
        } else {
            return redirect()->route('not_found');
        }
    }

    public function submit(Request $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/applications/images', $image);
        }
        $cv = null;
        if ($request->hasFile('cv')) {
            $file = $request->cv;
            $cv = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/applications/cv', $cv);
        }
        $application_id = VacancyApplication::create([
            'selected_vacancy' => $request->selected_vacancy,
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'father_name' => $request->father_name, 
            'gender' => $request->gender, 
            'birth' => $request->birth, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'linkedin_url' => $request->linkedin_url, 
            'address' => $request->address, 
            'image' => $image,
            'cv' => $cv,
        ])->id;

        $educationJSON = json_decode($request->education[0], true);
        $workJSON = json_decode($request->work[0], true);
        $certificateJSON = json_decode($request->certificate[0], true);
        $languageJSON = json_decode($request->language[0], true);
        
        if($educationJSON){
            for($i = 0; $i < count($educationJSON); $i++){
                ApplicationEducation::create([
                    'application_id' => $application_id,
                    'education_level' => $educationJSON[$i]['levelValue'],
                    'education_name' => $educationJSON[$i]['nameValue'],
                    'education_field' => $educationJSON[$i]['fieldValue'],
                    'education_start_date' => $educationJSON[$i]['startDate'],
                    'education_end_date' => $educationJSON[$i]['endDate'],
                ]);
            }
        }
        if($workJSON){
            for($i = 0; $i < count($workJSON); $i++){
                ApplicationWork::create([
                    'application_id' => $application_id,
                    'company_name' => $workJSON[$i]['nameValue'],
                    'position' => $workJSON[$i]['positionValue'],
                    'work_start_date' => $workJSON[$i]['startDate'],
                    'work_end_date' => $workJSON[$i]['endDate'],
                ]);
            }
        }
        if($certificateJSON){
            for($i = 0; $i < count($certificateJSON); $i++){
                ApplicationCertificate::create([
                    'application_id' => $application_id,
                    'certificate_name' => $certificateJSON[$i]['nameValue'],
                    'certificate_date' => $certificateJSON[$i]['certificateDate'],
                ]);
            }
        }
        if($languageJSON){
            for($i = 0; $i < count($languageJSON); $i++){
                ApplicationLanguage::create([
                    'application_id' => $application_id,
                    'language_name' => $languageJSON[$i]['nameValue'],
                    'language_level' => $languageJSON[$i]['levelValue'],
                ]);
            }
        }

        $vacancyName = null;
        if($request->selected_vacancy){
            $vacancy = Vacancy::findOrFail($request->selected_vacancy);
            $vacancyName = $vacancy->getTranslate->first()->title;
        }
        $applicationData = [
            'vacancy' => $vacancyName,
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'father_name' => $request->father_name, 
            'gender' => $request->gender, 
            'birth' => $request->birth, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'linkedin_url' => $request->linkedin_url, 
            'address' => $request->address, 
            'image' => $image,
            'cv' => $cv,
        ];
        Mail::send('admin-panel.email.vacancy', ['applicationData' => $applicationData], function($message) use($applicationData){
            $message->to('askerovpasha21@gmail.com');
            $message->subject('Vakansiya müraciəti');
        });



        return redirect()->back()->with('vacancy-submit', 'true');
    }
}
