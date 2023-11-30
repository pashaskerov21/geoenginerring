<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceAltContentRequest;
use App\Models\Service;
use App\Models\ServiceAltContent;
use App\Models\ServiceAltContentTranslate;
use Illuminate\Http\Request;

class ServiceAltContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $altcontents = ServiceAltContent::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.service-contents.index', compact('altcontents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.service-contents.add', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceAltContentRequest $request)
    {

        $new_image = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/altcontents', $new_image);
        }
        $content_id = ServiceAltContent::create([
            'service_id' => $request->service_id,
            'image' => $new_image,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            ServiceAltContentTranslate::create([
                'content_id' => $content_id,
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.service-contents.index')->with('store_message', 'Uğurla əlavə edildi');
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
        $altcontent = ServiceAltContent::findOrFail($id);
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.service-contents.edit', compact(['services', 'altcontent']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceAltContentRequest $request, string $id)
    {

        $altcontent = ServiceAltContent::findOrFail($id);
        $altcontent->service_id = $request->service_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/altcontents', $new_image);

            $altcontent->image = $new_image;            
        }
        $altcontent->save();
        for($i = 0; $i < count($request->lang); $i++){
            ServiceAltContentTranslate::where(['content_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->back()->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            ServiceAltContent::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $altcontent = ServiceAltContent::findOrFail($id);
        $altcontent->destroy = 1;
        $altcontent->save();
        return redirect()->route('admin.service-contents.index')->with('delete_message','Uğurla silindi');
    }
}
