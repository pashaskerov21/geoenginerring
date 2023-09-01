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
        $parentID = $request->parent_id;
        if ($request->header_status) {
            if ($request->parent_id) {
                $headerStatus = 1;
                $mainMenu = Menu::findOrFail($request->parent_id);
                $mainMenu->parent = $mainMenu->parent + 1;
                $mainMenu->save();
            } else {
                return redirect()->back()->with('menuError', 'Əsas Menyu seçin');
            }
        } else {
            $headerStatus = 0;
        }
        $category_id = ProjectCategories::create([
            'parent_id' => $parentID,
            'header_status' => $headerStatus
        ])->id;
        for ($i = 0; $i < count($request->lang); $i++) {
            ProjectCategoryTranslate::create([
                'category_id' => $category_id,
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.project-categories.index')->with('success', 'Uğurla əlavə edildi');
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
        if ($request->header_status) {
            if ($category->parent_id && $request->parent_id_old !== $request->parent_id) {
                $oldMainMenu = Menu::findOrFail($request->parent_id_old);
                $oldMainMenu->parent = $oldMainMenu->parent - 1;
                $oldMainMenu->save();

                $newMainMenu = Menu::findOrFail($request->parent_id);
                $newMainMenu->parent = $newMainMenu->parent + 1;
                $newMainMenu->save();
                $category->parent_id = $request->parent_id;
                $category->header_status = 1;
            }else{
                if ($request->parent_id) {
                    $newMainMenu = Menu::findOrFail($request->parent_id);
                    $newMainMenu->parent = $newMainMenu->parent + 1;
                    $newMainMenu->save();
                    $category->parent_id = $request->parent_id;
                    $category->header_status = 1;
                } else {
                    return redirect()->back()->with('menuError', 'Əsas Menyu seçin');
                }
            }
            $category->header_status = 1;
        } else {
            if ($category->parent_id) {
                $oldMainMenu = Menu::findOrFail($category->parent_id);
                $oldMainMenu->parent = $oldMainMenu->parent - 1;
                $oldMainMenu->save();
            }
            $category->parent_id = null;
            $category->header_status = 0;
        }
        $category->save();


        for ($i = 0; $i < count($request->lang); $i++) {
            ProjectCategoryTranslate::where(['category_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.project-categories.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
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
        return redirect()->route('admin.project-categories.index')->with('success', 'Uğurla silindi');
    }
}
