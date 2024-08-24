<?php

namespace App\Http\Controllers\Fornt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForntendController extends Controller
{
    public function index(){
        return view('fornt.pages.home');
    }

}
