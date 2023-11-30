<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $banner_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $banner_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/banner', $banner_img);
        }
        Banner::create([
            'image' => $banner_img,
        ]);
        return redirect()->route('admin.banner.index')->with('store_message', 'Uğurla əlavə edildi');
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
        $banner = Banner::findOrFail($id);
        return view('admin-panel.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $banner_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/banner', $banner_img);

            $banner->image = $banner_img;
        }
        $banner->save();
        return redirect()->route('admin.banner.index')->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Banner::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->destroy = 1;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('delete_message','Uğurla silindi');
    }
}

