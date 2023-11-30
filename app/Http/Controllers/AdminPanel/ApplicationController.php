<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\VacancyApplication;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = VacancyApplication::where('destroy', 0)->get();
        return view('admin-panel.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = VacancyApplication::findOrFail($id);
        $vacancy = null;
        if($application->selected_vacancy){
            $vacancy = Vacancy::findOrFail($application->selected_vacancy);
        }
        return view('admin-panel.applications.view', compact(['application', 'vacancy']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = VacancyApplication::findOrFail($id);
        $application->destroy = 1;
        $application->save();
        return redirect()->route('admin.applications.index')->with('delete_message','Uğurla silindi');
    }
}
