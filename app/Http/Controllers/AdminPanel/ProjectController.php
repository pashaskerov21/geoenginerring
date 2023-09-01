<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\ProjectCategories;
use App\Models\ProjectTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.projects.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->move('uploads/projects', $new_image);
        }else{
            $new_image = null;
        }
        if ($request->home_status) {
            $homeStatus = 1;
        } else {
            $homeStatus = 0;
        }
        $project_id = Project::create([
            'category_id' => $request->category_id,
            'image' => $new_image,
            'image_old' => $new_image,
            'address_url' => $request->address_url,
            'home_status' => $homeStatus,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            ProjectTranslate::create([
                'project_id' => $project_id,
                'title' => $request['title'][$i],
                'address' => $request['address'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'card_text' => $request['card_text'][$i],
                'main_text' => $request['main_text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.projects.index')->with('success', 'Uğurla əlavə edildi');
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
        $project = Project::findOrFail($id);
        $categories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.projects.edit', compact(['categories', 'project']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, string $id)
    {
        $project = Project::findOrFail($id);
        $project->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->move('uploads/projects', $new_image);

            $project->image = $new_image;
            $project->image_old = $new_image;
            
        }else{
            $project->image = $project->image_old;
        }
        if ($request->home_status) {
            $project->home_status = 1;
        }else{
            $project->home_status = 0;
        }
        $project->save();
        for($i = 0; $i < count($request->lang); $i++){
            ProjectTranslate::where(['project_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'address' => $request['address'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'card_text' => $request['card_text'][$i],
                'main_text' => $request['main_text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->back()->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Project::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->destroy = 1;
        $project->save();
        return redirect()->route('admin.projects.index')->with('success','Uğurla silindi');

    }
    public function updateHomeStatus(Request $request)
    {
        
        $projectID = $request['projectID'];
        $isChecked = $request['isChecked'];

        $project = Project::findOrFail($projectID);
        $project->home_status = $isChecked;
        $project->save();

        return response()->json(['message' => 'Dəyər uğurla yeniləndi.']);
    }
}
