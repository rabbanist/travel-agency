<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function index(){
        $features = Feature::get();
        return view('admin.pages.feature.index',compact('features'));
    }

    public function create(){
        return view('admin.pages.feature.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $feature = new Feature();
        $feature->title = $request->title;
        $feature->icon = $request->icon;
        $feature->description = $request->description;
        $feature->save();

        return redirect()->route('admin.feature.index')->with('success','Feature Created Successfully');
    }

    //Edit Feature
    public function edit($id){
        $feature = Feature::find($id);
        return view('admin.pages.feature.edit',compact('feature'));
    }

    //Update Feature
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $feature = Feature::find($id);
        $feature->title = $request->title;
        $feature->icon = $request->icon;
        $feature->description = $request->description;
        $feature->save();

        return redirect()->route('admin.feature.index')->with('success','Feature Updated Successfully');
    }

    //Delete Feature
    public function delete($id){
        $feature = Feature::find($id);
        $feature->delete();
        return redirect()->route('admin.feature.index')->with('success','Feature Deleted Successfully');
    }
}
