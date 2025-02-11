<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\PackageAmenity;
use App\Models\PackageItinerary;
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


    //package edit start
    public function edit($id)
    {
        $package = Package::where('id',$id)->first();
        $destinations = Destination::orderBy('name','asc')->get();
        return view('admin.pages.package.edit',compact('package','destinations'));
    }
    //package edit end

    //package update start
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

    //package update end

    public function delete($id)
    {

        $package = Package::where('id',$id)->first();
        unlink(public_path('uploads/'.$package->featured_photo));
        unlink(public_path('uploads/'.$package->banner));
        $package->delete();
        return redirect()->route('admin.package.index')->with('success','Package is Deleted Successfully');
    }


    //package amenities start
    public function packageAmenities($id)
    {
        $package = Package::where('id',$id)->first();

        $package_amenities_include = PackageAmenity::with('amenity')
            ->orWhere('package_id', $id)
            ->where('type', 'included')
            ->get();

        $package_amenities_exclude = PackageAmenity::with('amenity')
            ->where('package_id', $id)
            ->where('type', 'excluded')
            ->get();
        $amenities = Amenity::orderBy('name','asc')->get();
        return view('admin.pages.package.package_amenity',compact('package','package_amenities_include','package_amenities_exclude','amenities'));
    }

    public function packageAmenitiesStore(Request $request, $id)
    {
        $request->validate([
            'amenity_id' => 'required|unique:package_amenities',
            'type' => 'required',
        ]);

        $obj = new PackageAmenity();
        $obj->package_id = $id;
        $obj->amenity_id = $request->amenity_id;
        $obj->type = $request->type;
        $obj->save();

        return redirect()->route('admin.package_amenity',$id)->with('success','Amenity is Added Successfully');
    }


    //package amenities delete
    public function packageAmenitiesDelete($id)
    {
        $package_amenity = PackageAmenity::where('id',$id)->first();
        $package_id = $package_amenity->package_id;
        $package_amenity->delete();
        return redirect()->route('admin.package_amenity',$package_id)->with('success','Amenity is Deleted Successfully');
    }
    //package amenities end


//    package itinerary start
    public function packageItineraries($id)
    {
        $package = Package::where('id',$id)->first();
        $packageItineraries = PackageItinerary::where('package_id',$id)->get();
        return view('admin.pages.package.package_itinerary',compact('package','packageItineraries',));
    }

    public function packageItinerariesStore(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $obj = new PackageItinerary();
        $obj->package_id = $id;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->save();

        return redirect()->route('admin.package_itinerary',$id)->with('success','Itinerary is Added Successfully');
    }


    //package itinerary delete
    public function packageItinerariesDelete($id)
    {
        $obj = PackageItinerary::where('id',$id)->first();
        $obj->delete();
       return redirect()->back()->with('success','Itinerary is Deleted Successfully');
    }
}
