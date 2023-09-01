<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
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
    public function store(ServiceStoreRequest $request)
    {
        if ($request->hasFile('icon')) {
            $file = $request->icon;
            $new_icon = time() . $file->getClientOriginalName();
            $file->move('uploads/services/icon', $new_icon);
        } else {
            $new_icon = null;
        }
        if ($request->hasFile('card_img_1')) {
            $file = $request->card_img_1;
            $new_cardimg1 = time() . $file->getClientOriginalName();
            $file->move('uploads/services/card-images', $new_cardimg1);
        } else {
            $new_cardimg1 = null;
        }
        if ($request->hasFile('card_img_2')) {
            $file = $request->card_img_2;
            $new_cardimg2 = time() . $file->getClientOriginalName();
            $file->move('uploads/services/card-images', $new_cardimg2);
        } else {
            $new_cardimg2 = null;
        }
        if ($request->hasFile('text_img')) {
            $file = $request->text_img;
            $new_textimg = time() . $file->getClientOriginalName();
            $file->move('uploads/services/text-images', $new_textimg);
        } else {
            $new_textimg = null;
        }
        if ($request->hasFile('catalog_pdf')) {
            $file = $request->catalog_pdf;
            $new_pdf = time() . $file->getClientOriginalName();
            $file->move('uploads/services/pdf', $new_pdf);
        } else {
            $new_pdf = null;
        }
        if ($request->home_status) {
            $homeStatus = 1;
        } else {
            $homeStatus = 0;
        }
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
        $service_id = Service::create([
            'parent_id' => $parentID,
            'icon' => $new_icon,
            'icon_old' => $new_icon,
            'card_img_1' => $new_cardimg1,
            'card_img_1_old' => $new_cardimg1,
            'card_img_2' => $new_cardimg2,
            'card_img_2_old' => $new_cardimg2,
            'text_img' => $new_textimg,
            'text_img_old' => $new_textimg,
            'catalog_pdf' => $new_pdf,
            'catalog_pdf_old' => $new_pdf,
            'home_status' => $homeStatus,
            'header_status' => $headerStatus
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
        return redirect()->route('admin.services.index')->with('success', 'Uğurla əlavə edildi');
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
    public function update(ServiceUpdateRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        if ($request->hasFile('icon')) {
            $file = $request->icon;
            $new_icon = time() . $file->getClientOriginalName();
            $file->move('uploads/services/icon', $new_icon);
            $service->icon = $new_icon;
            $service->icon_old = $new_icon;
        } else {
            $service->icon = $service->icon_old;
        }
        if ($request->hasFile('card_img_1')) {
            $file = $request->card_img_1;
            $new_cardimg1 = time() . $file->getClientOriginalName();
            $file->move('uploads/services/card-images', $new_cardimg1);
            $service->card_img_1 = $new_cardimg1;
            $service->card_img_1_old = $new_cardimg1;
        } else {
            $service->card_img_1 = $service->card_img_1_old;
        }
        if ($request->hasFile('card_img_2')) {
            $file = $request->card_img_2;
            $new_cardimg2 = time() . $file->getClientOriginalName();
            $file->move('uploads/services/card-images', $new_cardimg2);
            $service->card_img_2 = $new_cardimg2;
            $service->card_img_2_old = $new_cardimg2;
        } else {
            $service->card_img_2 = $service->card_img_2_old;
        }
        if ($request->hasFile('text_img')) {
            $file = $request->text_img;
            $new_textimg = time() . $file->getClientOriginalName();
            $file->move('uploads/services/text-images', $new_textimg);
            $service->text_img = $new_textimg;
            $service->text_img_old = $new_textimg;
        } else {
            $service->text_img = $service->text_img_old;
        }

        if ($request->hasFile('catalog_pdf')) {
            $file = $request->catalog_pdf;
            $new_pdf = time() . $file->getClientOriginalName();
            $file->move('uploads/services/pdf', $new_pdf);
            $service->catalog_pdf = $new_pdf;
            $service->catalog_pdf_old = $new_pdf;
        } else {
            $service->catalog_pdf = $service->catalog_pdf_old;
        }
        if (!$request->home_status) {
            $service->home_status = 0;
        }
        if ($request->header_status) {
            if ($service->parent_id && $request->parent_id_old !== $request->parent_id) {
                $oldMainMenu = Menu::findOrFail($request->parent_id_old);
                $oldMainMenu->parent = $oldMainMenu->parent - 1;
                $oldMainMenu->save();

                $newMainMenu = Menu::findOrFail($request->parent_id);
                $newMainMenu->parent = $newMainMenu->parent + 1;
                $newMainMenu->save();
                $service->parent_id = $request->parent_id;
                $service->header_status = 1;
            }else{
                if ($request->parent_id) {
                    $newMainMenu = Menu::findOrFail($request->parent_id);
                    $newMainMenu->parent = $newMainMenu->parent + 1;
                    $newMainMenu->save();
                    $service->parent_id = $request->parent_id;
                    $service->header_status = 1;
                } else {
                    return redirect()->back()->with('menuError', 'Əsas Menyu seçin');
                }
            }
            $service->header_status = 1;
        } else {
            if ($service->parent_id) {
                $oldMainMenu = Menu::findOrFail($service->parent_id);
                $oldMainMenu->parent = $oldMainMenu->parent - 1;
                $oldMainMenu->save();
            }
            $service->parent_id = null;
            $service->header_status = 0;
        }
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
        return redirect()->back()->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
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
        if ($service->header_status == 1) {
            $mainMenu = Menu::findOrFail($service->parent_id);
            $mainMenu->parent = $mainMenu->parent - 1;
            $mainMenu->save();
        }
        $service->save();
        return redirect()->route('admin.services.index')->with('success', 'Uğurla silindi');
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
