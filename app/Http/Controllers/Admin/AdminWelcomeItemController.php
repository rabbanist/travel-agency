<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeItem;
use Illuminate\Http\Request;

class AdminWelcomeItemController extends Controller
{
    public function index(){
        $item = WelcomeItem::where('id' , 1)->first();
        return view('admin.pages.welcome.index', compact('item'));
    }

    public function update(Request $request)
    {
        $item = WelcomeItem::where('id' , 1)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required',
        ]);

        if($request->hasfile('photo')){
            $request->validate([
                'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);

            unlink(public_path('uploads/'.$item->photo));

            $final_name = 'welcome_photo'.'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $item->photo = $final_name;
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->button_text = $request->button_text;
        $item->button_link = $request->button_link;
        $item->video = $request->video;
        $item->status = $request->status;
        $item->save();

        return redirect()->back()->with('success', 'Welcome Item Updated Successfully');
    }

}
