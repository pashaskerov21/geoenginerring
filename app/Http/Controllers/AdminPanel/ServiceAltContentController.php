<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceAltContentStoreRequest;
use App\Http\Requests\ServiceAltContentUpdateRequest;
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
    public function store(ServiceAltContentStoreRequest $request)
    {
        $service = Service::findOrFail($request->service_id);
        $service->content_count = $service->content_count + 1;
        $service->save();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->move('uploads/services/altcontents', $new_image);
        }else{
            $new_image = null;
        }
        $content_id = ServiceAltContent::create([
            'service_id' => $request->service_id,
            'image' => $new_image,
            'image_old' => $new_image,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            ServiceAltContentTranslate::create([
                'content_id' => $content_id,
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.service-contents.index')->with('success', 'Uğurla əlavə edildi');
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
    public function update(ServiceAltContentUpdateRequest $request, string $id)
    {

        $altcontent = ServiceAltContent::findOrFail($id);
        $altcontent->service_id = $request->service_id;
        if($request->service_id_old !== $request->service_id){
            $oldService = Service::findOrFail($request->service_id_old);
            $oldService->content_count = $oldService->content_count - 1;
            $oldService->save();
            $newService = Service::findOrFail($request->service_id);
            $newService->content_count = $newService->content_count + 1;
            $newService->save();    
        };
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->move('uploads/services/altcontents', $new_image);

            $altcontent->image = $new_image;
            $altcontent->image_old = $new_image;
            
        }else{
            $altcontent->image = $altcontent->image_old;
        }
        $altcontent->save();
        for($i = 0; $i < count($request->lang); $i++){
            ServiceAltContentTranslate::where(['content_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->back()->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
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
        $service = Service::findOrFail($altcontent->service_id);
        $service->content_count = $service->content_count - 1;
        $service->save();
        return redirect()->route('admin.service-contents.index')->with('success','Uğurla silindi');
    }
}
