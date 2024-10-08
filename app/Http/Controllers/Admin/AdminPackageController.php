<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Destination;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        return view('admin.pages.package.index',compact('packages'));
    }

    public function create()
    {
        $destinations = Destination::orderBy('name','asc')->get();
        return view('admin.pages.package.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:packages',
            'slug' => 'required|alpha_dash|unique:packages',
            'description' => 'required',
            'price' => 'required|numeric',
            'old_price' => 'numeric',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'package_featured_'.time().'.'.$request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name);

        $final_name1 = 'package_banner_'.time().'.'.$request->banner->extension();
        $request->banner->move(public_path('uploads'), $final_name1);

        $obj = new Package();
        $obj->destination_id = $request->destination_id;
        $obj->featured_photo = $final_name;
        $obj->banner = $final_name1;
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->old_price = $request->old_price;
        $obj->map = $request->map;
        $obj->total_rating = 0;
        $obj->total_score = 0;
        $obj->save();

        return redirect()->route('admin.package.index')->with('success','Package is Created Successfully');
    }

    public function edit($id)
    {
        $package = Package::where('id',$id)->first();
        $destinations = Destination::orderBy('name','asc')->get();
        return view('admin.pages.package.edit',compact('package','destinations'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::where('id',$id)->first();

        $request->validate([
            'name' => 'required|unique:packages,name,'.$id,
            'slug' => 'required|alpha_dash|unique:packages,slug,'.$id,
            'description' => 'required',
            'price' => 'required|numeric',
            'old_price' => 'numeric',
        ]);

        if($request->hasFile('featured_photo'))
        {
            $request->validate([
                'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            unlink(public_path('uploads/'.$package->featured_photo));
            $final_name = 'package_featured_'.time().'.'.$request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name);
            $package->featured_photo = $final_name;
        }

        if($request->hasFile('banner'))
        {
            $request->validate([
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            unlink(public_path('uploads/'.$package->banner));
            $final_name1 = 'package_banner_'.time().'.'.$request->banner->extension();
            $request->banner->move(public_path('uploads'), $final_name1);
            $package->banner = $final_name1;
        }

        $package->destination_id = $request->destination_id;
        $package->name = $request->name;
        $package->slug = $request->slug;
        $package->description = $request->description;
        $package->price = $request->price;
        $package->old_price = $request->old_price;
        $package->map = $request->map;
        $package->save();

        return redirect()->route('admin.package.index')->with('success','Package is Updated Successfully');
    }

    public function delete($id)
    {

        $package = Package::where('id',$id)->first();
        unlink(public_path('uploads/'.$package->featured_photo));
        unlink(public_path('uploads/'.$package->banner));
        $package->delete();
        return redirect()->route('admin.package.index')->with('success','Package is Deleted Successfully');
    }
}
