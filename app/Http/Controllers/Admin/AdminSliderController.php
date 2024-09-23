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

    // Edit Slider
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.pages.slider.edit', compact('slider'));
    }

    // Update Slider

    public function update(Request $request, $id){

        $slider = Slider::where('id', $id)->first();

       $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            unlink(public_path('uploads/'.$slider->photo));
            $final_name = 'slider_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $slider->photo = $final_name;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->update();

        return redirect()->route('admin.slider.index')->with('success','Slider Updated Successfully');
    }

    // Delete Slider
    public function delete($id){
        $slider = Slider::find($id);
        unlink(public_path('uploads/'.$slider->photo));
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success','Slider Deleted Successfully');
    }
}
