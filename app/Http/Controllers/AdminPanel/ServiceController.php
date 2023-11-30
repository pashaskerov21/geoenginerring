<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Menu;
use App\Models\Service;
use App\Models\ServiceTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.services.add', compact('menues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $new_icon = null;
        $new_cardimg1 = null;
        $new_cardimg2 = null;
        $new_textimg = null;
        $new_pdf = null;
        if ($request->hasFile('icon')) {
            $file = $request->icon;
            $new_icon = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/icon', $new_icon);
        }
        if ($request->hasFile('card_img_1')) {
            $file = $request->card_img_1;
            $new_cardimg1 = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/card-images', $new_cardimg1);
        }
        if ($request->hasFile('card_img_2')) {
            $file = $request->card_img_2;
            $new_cardimg2 = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/card-images', $new_cardimg2);
        }
        if ($request->hasFile('text_img')) {
            $file = $request->text_img;
            $new_textimg = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/text-images', $new_textimg);
        }
        if ($request->hasFile('catalog_pdf')) {
            $file = $request->catalog_pdf;
            $new_pdf = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/pdf', $new_pdf);
        }
        $homeStatus = 0;
        $headerStatus = 0;
        if($request->home_status){
            $homeStatus = 1;
        }
        if($request->header_status){
            $headerStatus = 1;
        }
        $service_id = Service::create([
            'icon' => $new_icon,
            'card_img_1' => $new_cardimg1,
            'card_img_2' => $new_cardimg2,
            'text_img' => $new_textimg,
            'catalog_pdf' => $new_pdf,
            'home_status' => $homeStatus,
            'header_status' => $headerStatus,
        ])->id;
        for ($i = 0; $i < count($request->lang); $i++) {
            ServiceTranslate::create([
                'service_id' => $service_id,
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'card_text' => $request['card_text'][$i],
                'main_text' => $request['main_text'][$i],
                'lang' => $request['lang'][$i]
            ]);
        }
        return redirect()->route('admin.services.index')->with('store_message', 'Uğurla əlavə edildi');
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
        $service = Service::findOrFail($id);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        return view('admin-panel.services.edit', compact(['service', 'menues']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        if ($request->hasFile('icon')) {
            $file = $request->icon;
            $new_icon = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/icon', $new_icon);
            $service->icon = $new_icon;
        }
        if ($request->hasFile('card_img_1')) {
            $file = $request->card_img_1;
            $new_cardimg1 = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/card-images', $new_cardimg1);
            $service->card_img_1 = $new_cardimg1;
        }
        if ($request->hasFile('card_img_2')) {
            $file = $request->card_img_2;
            $new_cardimg2 = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/card-images', $new_cardimg2);
            $service->card_img_2 = $new_cardimg2;
        }
        if ($request->hasFile('text_img')) {
            $file = $request->text_img;
            $new_textimg = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/text-images', $new_textimg);
            $service->text_img = $new_textimg;
        }
        if ($request->hasFile('catalog_pdf')) {
            $file = $request->catalog_pdf;
            $new_pdf = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services/pdf', $new_pdf);
            $service->catalog_pdf = $new_pdf;
        }
        $homeStatus = 0;
        $headerStatus = 0;
        if($request->home_status){
            $homeStatus = 1;
        }
        if($request->header_status){
            $headerStatus = 1;
        } 
        $service->home_status = $homeStatus;
        $service->header_status = $headerStatus;
        $service->save();
        for ($i = 0; $i < count($request->lang); $i++) {
            ServiceTranslate::where(['service_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'card_text' => $request['card_text'][$i],
                'main_text' => $request['main_text'][$i],
                'lang' => $request['lang'][$i]
            ]);
        }
        return redirect()->back()->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request)
    {

        $sorts = $request->sort;
        foreach ($sorts as $key => $sort) {
            Service::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->destroy = 1;
        $service->save();
        return redirect()->route('admin.services.index')->with('delete_message','Uğurla silindi');
    }
    public function updateHomeStatus(Request $request)
    {
        
        $serviceId = $request['serviceID'];
        $isChecked = $request['isChecked'];

        $service = Service::findOrFail($serviceId);
        $service->home_status = $isChecked;
        $service->save();

        return response()->json(['message' => 'Dəyər uğurla yeniləndi.']);
    }
}
