<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function cms()
    {
        return view('admin/cms');
    }
    public function blogs()
    {
        return view('admin/blogs');
    }
    public function portfolio()
    {
        return view('admin/portfolio');
    }
    public function enquiries()
    {
        return view('admin/enquiries');
    }
}
