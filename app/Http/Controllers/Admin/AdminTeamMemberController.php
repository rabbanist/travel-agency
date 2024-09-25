<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AdminTeamMemberController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::get();
        return view('admin.pages.team-member.index', compact('team_members'));
    }

    public function create()
    {
        return view('admin.pages.team-member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:team_members',
            'designation' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $team_member = new TeamMember();
        $team_member->name = $request->name;
        $team_member->slug = $request->slug;
        $team_member->designation = $request->designation;
        $team_member->email = $request->email;
        $team_member->phone = $request->phone;
        $team_member->address = $request->address;
        $team_member->biography = $request->biography;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->instagram = $request->instagram;

        $final_name = 'team_member_' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $team_member->photo = $final_name;
        $team_member->save();

        return redirect()->route('admin.team_member.index')->with('success', 'Team Member Created Successfully');
    }

    public function edit($id)
    {
        $team_member = TeamMember::find($id);
        return view('admin.pages.team-member.edit', compact('team_member'));
    }

    public function update(Request $request, $id)
    {
        $team_member = TeamMember::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:team_members,slug,'.$team_member->id,
            'designation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            unlink(public_path('uploads/'.$team_member->photo));

            $final_name = 'team_member_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $team_member->photo = $final_name;
        }

        $team_member->name = $request->name;
        $team_member->slug = $request->slug;
        $team_member->designation = $request->designation;
        $team_member->address = $request->address;
        $team_member->email = $request->email;
        $team_member->phone = $request->phone;
        $team_member->biography = $request->biography;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->instagram = $request->instagram;
        $team_member->save();

        return redirect()->route('admin.team_member.index')->with('success', 'Team Member Updated Successfully');
    }

    public function delete($id)
    {
        $team_member = TeamMember::find($id);
        unlink(public_path('uploads/' . $team_member->photo));
        $team_member->delete();
        return redirect()->route('admin.team_member.index')->with('success', 'Team Member Deleted Successfully');
    }

}
