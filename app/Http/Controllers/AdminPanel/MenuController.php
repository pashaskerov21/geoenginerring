<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\MenuTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menues = Menu::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.menu.index',compact('menues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $menu_id = Menu::create()->id;
        for($i = 0; $i < count($request->lang); $i++){
            MenuTranslate::create([
                'menu_id' => $menu_id,
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.menu.index')->with('success', 'Uğurla əlavə edildi');
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
        $menu = Menu::findOrFail($id);
        return view('admin-panel.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->save();
        for($i = 0; $i < count($request->lang); $i++){
            MenuTranslate::where(['menu_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->back()->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Menu::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->destroy = 1;
        $menu->save();
        return redirect()->route('admin.menu.index')->with('success','Uğurla silindi');
    }
}
