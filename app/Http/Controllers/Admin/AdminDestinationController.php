<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use Illuminate\Http\Request;

class AdminDestinationController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        return view('admin.pages.destination.index',compact('destinations'));
    }

    public function create(){
        return view('admin.pages.destination.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'featured_image_'.time().'.'.$request->featured_image->extension();
        $request->featured_image->move(public_path('uploads'), $final_name);

        $destination = new Destination();
        $destination->name = $request->name;
        $destination->slug = $request->slug;
        $destination->description = $request->description;
        $destination->country = $request->country;
        $destination->currency = $request->currency;
        $destination->language = $request->language;
        $destination->timezone = $request->timezone;
        $destination->area = $request->area;
        $destination->activities = $request->activities;
        $destination->visa_required = $request->visa_required;
        $destination->best_time = $request->best_time;
        $destination->health_safety = $request->health_safety;
        $destination->map = $request->map;
        $destination->featured_image = $final_name;
        $destination->view_count = 0;
        $destination->save();

        return redirect()->route('admin.destination.index')->with('success','Destination created successfully');
    }

    public function edit($id){
        $destination = Destination::find($id);
        return view('admin.pages.destination.edit',compact('destination'));
    }

    public function update(Request $request, $id){
        $destination = Destination::find($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('featured_image')){
            $request->validate([
                'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            unlink(public_path('uploads/'.$destination->featured_image));
            $final_name = 'featured_image_'.time().'.'.$request->featured_image->extension();
            $request->featured_image->move(public_path('uploads'), $final_name);
            $destination->featured_image = $final_name;
        }

        $destination->name = $request->name;
        $destination->slug = $request->slug;
        $destination->description = $request->description;
        $destination->country = $request->country;
        $destination->currency = $request->currency;
        $destination->language = $request->language;
        $destination->timezone = $request->timezone;
        $destination->area = $request->area;
        $destination->activities = $request->activities;
        $destination->visa_required = $request->visa_required;
        $destination->best_time = $request->best_time;
        $destination->health_safety = $request->health_safety;
        $destination->map = $request->map;
        $destination->save();

        return redirect()->route('admin.destination.index')->with('success','Destination updated successfully');
    }

    public function delete($id){
        $destination = Destination::find($id);
        unlink(public_path('uploads/'.$destination->featured_image));
        $destination->delete();
        return redirect()->route('admin.destination.index')->with('success','Destination deleted successfully');
    }

    public function destinationPhotos($id){
        $destination = Destination::find($id);
        $destination_photos = DestinationPhoto::where('destination_id',$id)->get();
        return view('admin.pages.destination.destination_photos',compact('destination','destination_photos'));
    }

    public function destinationPhotosStore(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'destination_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $obj = new DestinationPhoto;
        $obj->destination_id = $id;
        $obj->photo = $final_name;
        $obj->save();

        return redirect()->back()->with('success','Photo is Inserted Successfully');
    }

    public function destinationPhotosDelete($id)
    {
        $destination_photo = DestinationPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$destination_photo->photo));
        $destination_photo->delete();
        return redirect()->back()->with('success','Photo is Deleted Successfully');
    }

    public function destinationVideos($id)
    {
        $destination = Destination::where('id',$id)->first();
        $destination_videos = DestinationVideo::where('destination_id',$id)->get();
        return view('admin.pages.destination.destination_videos',compact('destination', 'destination_videos'));
    }

    public function destinationVideoStore(Request $request, $id)
    {
        $request->validate([
            'video' => 'required',
        ]);

        $obj = new DestinationVideo;
        $obj->destination_id = $id;
        $obj->video = $request->video;
        $obj->save();

        return redirect()->back()->with('success','Video is Inserted Successfully');
    }

    public function destinationVideoDelete($id)
    {
        $destination_video = DestinationVideo::where('id',$id)->first();
        $destination_video->delete();
        return redirect()->back()->with('success','Video is Deleted Successfully');
    }
}

