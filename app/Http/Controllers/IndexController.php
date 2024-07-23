<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }
    public function portfolio()
    {
        return view('portfolio');
    }
    public function contactUs()
    {
        return view('contact-us');
    }

    public function aboutUs()
    {
        return view('about-us');
    }
}


