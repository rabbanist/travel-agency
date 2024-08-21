<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.pages.login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $adminData = $request->all();
        $data = [
          'email' => $adminData['email'],
            'password' => $adminData['password']
        ];

        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully' );
        }else{
            return redirect()->back()->with('error','Invalid Email or Password');
        }
    }


    public function forgetPassword(){
        return view('admin.pages.forget-password');
    }

    public function resetPassword(){
        return view('admin.pages.reset-password');
    }
}
