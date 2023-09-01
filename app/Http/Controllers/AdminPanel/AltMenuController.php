<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AltMenuRequest;
use App\Models\AltMenu;
use App\Models\AltMenuTranslate;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AltMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $altMenues = AltMenu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.alt-menu.index', compact('altMenues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.alt-menu.add', compact('menues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AltMenuRequest $request)
    {
        $altmenu_id = AltMenu::create([
            'parent_id' => $request->parent_id,
        ])->id;
        $mainMenu = Menu::findOrFail($request->parent_id);
        $mainMenu->parent = $mainMenu->parent + 1;
        $mainMenu->save();
        for ($i = 0; $i < count($request->lang); $i++) {
            AltMenuTranslate::create([
                'alt_menu_id' => $altmenu_id,
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.alt-menu.index')->with('success', 'Uğurla əlavə edildi');
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
        $altmenu = AltMenu::findOrFail($id);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.alt-menu.edit', compact(['altmenu', 'menues']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AltMenuRequest $request, string $id)
    {
        $altmenu = AltMenu::findOrFail($id);
        $altmenu->parent_id = $request->parent_id;
        $altmenu->save();

        $oldMainMenu = Menu::findOrFail($request->old_parent_id);
        $oldMainMenu->parent = $oldMainMenu->parent - 1;
        $oldMainMenu->save();

        $newMainMenu = Menu::findOrFail($request->parent_id);
        $newMainMenu->parent = $newMainMenu->parent + 1;
        $newMainMenu->save();


        for ($i = 0; $i < count($request->lang); $i++) {
            AltMenuTranslate::where(['alt_menu_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.alt-menu.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request)
    {

        $sorts = $request->sort;
        foreach ($sorts as $key => $sort) {
            AltMenu::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $altmenu = AltMenu::findOrFail($id);
        $mainMenu = Menu::findOrFail($altmenu->parent_id);
        $mainMenu->parent = $mainMenu->parent - 1;
        $mainMenu->save();
        $altmenu->destroy = 1;
        $altmenu->save();
        return redirect()->route('admin.alt-menu.index')->with('success', 'Uğurla silindi');
    }
}
