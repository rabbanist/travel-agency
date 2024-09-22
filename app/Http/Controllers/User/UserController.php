<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('front.user.dashboard');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('success','User Logout Successfully');
    }
}
