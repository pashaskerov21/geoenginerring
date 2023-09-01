<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\AltMenu;
use App\Models\Menu;
use App\Models\Message;
use App\Models\ProjectCategories;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $lang = ['az' => '/bizimle-elaqe', 'tr' => '/tr/iletisim', 'en' => '/en/contact-us', 'ru' => '/ru/kontakt'];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy', 0)->orderBy('sort')->get();
        $altMenues = AltMenu::where('destroy', 0)->orderBy('sort')->get();
        $services = Service::where('destroy', 0)->orderBy('sort')->get();
        $projectcategories = ProjectCategories::where('destroy', 0)->orderBy('sort')->get();
        return view('site.pages.contact', compact(['settings', 'lang', 'menues', 'altMenues', 'services', 'projectcategories']));
    }
    public function send(Request $request){
        Message::create($request->all());

        $msg = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'text' => $request->text,
        ];

        Mail::send('admin-panel.email.message', ['msg' => $msg], function($message) use($msg){
            $message->to('askerovpasha21@gmail.com');
            $message->subject($msg['subject']);
        });
        return redirect()->back()->with('message-success','true');
    }
}
