<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard');
    }

    public function profile(){
        return view ('admin.pages.profile');
    }
}
