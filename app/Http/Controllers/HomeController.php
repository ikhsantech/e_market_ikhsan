<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('templates.layout');
    }

    public function dashboard(){
        return view('dashboard.dashboard');
    }

    public function profile(){
        return view('dashboard.profile');
    }

    public function contact(){
        return view('dashboard.contact');
    }

    
    public function faq(){
        return view('dashboard.faq');
    }
    
}
