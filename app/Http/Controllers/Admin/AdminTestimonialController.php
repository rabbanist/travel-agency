<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::get();
        return view('admin.pages.testimonial.index', compact('testimonials'));
    }

    public function create(){
        return view('admin.pages.testimonial.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'icon' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->icon = $request->icon;
        $testimonial->photo = $final_name;
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success','Testimonial Created Successfully');
    }

    public function edit($id){
        $testimonial = Testimonial::find($id);
        return view('admin.pages.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id){

        $testimonial = Testimonial::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'icon' => 'required',
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            unlink(public_path('uploads/'.$testimonial->photo));

            $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $testimonial->photo = $final_name;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->icon = $request->icon;
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success','Testimonial Updated Successfully');
    }

    public function delete($id){
        $testimonial = Testimonial::find($id);
        unlink(public_path('uploads/'.$testimonial->photo));
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success','Testimonial Deleted Successfully');
    }
}
