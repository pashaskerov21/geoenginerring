<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Settings;
use App\Models\SettingTranslate;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Settings::findOrFail(1);
        return view('admin-panel.settings.index', compact('settings'));
    }
    public function update(SettingRequest $request){

        $settings = Settings::findOrFail(1);
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_logo = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/settings', $new_logo);

            $settings->logo = $new_logo;
        }
        if ($request->hasFile('logo_white')) {
            $file = $request->logo_white;
            $new_logo = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/settings', $new_logo);

            $settings->logo_white = $new_logo;
        }
        if ($request->hasFile('favicon')) {
            $file = $request->favicon;
            $new_favicon = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/settings', $new_favicon);

            $settings->favicon = $new_favicon;
        }
        if ($request->hasFile('favicon_white')) {
            $file = $request->favicon_white;
            $new_favicon = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/settings', $new_favicon);

            $settings->favicon_white = $new_favicon;
        }
        for($i = 0; $i < count($request->lang); $i++){
            SettingTranslate::where(['setting_id' => 1, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'address' => $request['address'][$i],
                'description' => $request['description'][$i],
                'keywords' => $request['keywords'][$i],
                'author' => $request['author'][$i],
                'copyright' => $request['copyright'][$i]
            ]);
        }
        $settings->address_url = $request->address_url;
        $settings->mail = $request->mail;
        $settings->phone = $request->phone;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->linkedin = $request->linkedin;
        $settings->save();
        return redirect()->route('admin.settings')->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }
}
