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
        $this->validate($request, [
            'home_image' => 'image|mimes:png,jpg,jpeg,svg',
        ]);
        $about = About::findOrFail(1);
        if ($request->hasFile('home_image')) {
            $file = $request->home_image;
            $new_image = time() . $file->getClientOriginalName();
            $file->move('uploads/about', $new_image);

            $about->home_image = $new_image;
        }
        for($i = 0; $i < count($request->lang); $i++){
            AboutTranslate::where(['about_id' => 1, 'lang' => $request['lang'][$i]])->update([
                'hometext' => $request->hometext[$i],
                'maintext' => $request->maintext[$i],
            ]);
        }
        $about->save();
        return redirect()->route('admin.about')->with('success','Məlumatlar uğurla yeniləndi');
    }
}
