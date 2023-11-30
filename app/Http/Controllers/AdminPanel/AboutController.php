<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutTranslate;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = About::findOrFail(1);
        return view('admin-panel.about.index', compact('about'));
    }
    public function update(Request $request){
        $about = About::findOrFail(1);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/about', $new_image);

            $about->image = $new_image;
        }
        for($i = 0; $i < count($request->lang); $i++){
            AboutTranslate::where(['about_id' => 1, 'lang' => $request['lang'][$i]])->update([
                'home_text' => $request->home_text[$i],
                'main_text' => $request->main_text[$i],
            ]);
        }
        $about->save();
        return redirect()->route('admin.about')->with('update_message','Məlumatlar uğurla yeniləndi');
    }
}
