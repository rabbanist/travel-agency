<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard');
    }

    public function profile(){
        return view ('admin.pages.profile');
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $admin = Auth::guard('admin')->user();

       if($request->photo){
            $request->validate([
                'photo' => ['required','mimes:jpg,jpeg,png','max:2048']
            ]);
            $photo_name = 'admin_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/'),$photo_name);
            unlink(public_path('uploads/'.$admin->photo));
            $admin->photo = $photo_name;
       }

        if($request->password){
            $request->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]);
            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->back()->with('success','Profile Updated Successfully');
    }
}
