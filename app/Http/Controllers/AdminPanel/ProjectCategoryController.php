<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCategoryRequest;
use App\Models\Menu;
use App\Models\ProjectCategories;
use App\Models\ProjectCategoryTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.project-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.project-categories.add', compact('menues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCategoryRequest $request)
    {
        $headerStatus = 0;
        if($request->header_status){
            $headerStatus = 1;
        }
        $category_id = ProjectCategories::create([
            'header_status' => $headerStatus,
        ])->id;
        for ($i = 0; $i < count($request->lang); $i++) {
            ProjectCategoryTranslate::create([
                'category_id' => $category_id,
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.project-categories.index')->with('store_message', 'Uğurla əlavə edildi');
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
        $category = ProjectCategories::findOrFail($id);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.project-categories.edit', compact(['category', 'menues']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCategoryRequest $request, string $id)
    {
        $category = ProjectCategories::findOrFail($id);
        $headerStatus = 0;
        if($request->header_status){
            $headerStatus = 1;
        }
        $category->header_status = $headerStatus;
        $category->save();

        for ($i = 0; $i < count($request->lang); $i++) {
            ProjectCategoryTranslate::where(['category_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.project-categories.index')->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request)
    {

        $sorts = $request->sort;
        foreach ($sorts as $key => $sort) {
            ProjectCategories::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProjectCategories::findOrFail($id);
        $category->destroy = 1;
        if ($category->header_status == 1) {
            $mainMenu = Menu::findOrFail($category->parent_id);
            $mainMenu->parent = $mainMenu->parent - 1;
            $mainMenu->save();
        }
        $category->save();
        return redirect()->route('admin.project-categories.index')->with('delete_message','Uğurla silindi');
    }
}
