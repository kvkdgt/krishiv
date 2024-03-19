<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function cms()
    {
        return view('admin/cms');
    }
    public function blogs()
    {
        return view('admin/blogs');
    }
    public function enquiries()
    {
        return view('admin/enquiries');
    }
}
