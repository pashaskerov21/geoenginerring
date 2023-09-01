<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use App\Models\VacancyTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = Vacancy::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.vacancy.index',compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.vacancy.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancyRequest $request)
    {
        $vacancy_id = Vacancy::create()->id;
        for($i = 0; $i < count($request->lang); $i++){
            VacancyTranslate::create([
                'vacancy_id' => $vacancy_id,
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.vacancy.index')->with('success', 'Uğurla əlavə edildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin-panel.vacancy.edit',compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacancyRequest $request, string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->save();
        for($i = 0; $i < count($request->lang); $i++){
            VacancyTranslate::where(['vacancy_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.vacancy.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Vacancy::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->destroy = 1;
        $vacancy->save();
        return redirect()->route('admin.vacancy.index')->with('success','Uğurla silindi');
    }
}
