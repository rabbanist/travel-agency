<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    // Slider Index
    public function index(){
        $sliders = Slider::get();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    // Create Slider
    public function create(){
        return view('admin.pages.slider.create');
    }

    // Store Slider
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'slider_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->photo = $final_name;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('success','Slider Created Successfully');
    }
}
