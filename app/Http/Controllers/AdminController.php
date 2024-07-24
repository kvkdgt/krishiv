<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Category;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $totalEnquiriesCount = Enquiry::count();
            $seenEnquiriesCount = Enquiry::where('status', 'Seen')->count();
            $pendingEnquiriesCount = Enquiry::where('status', 'Pending')->count();
            $todayEnquiriesCount = Enquiry::whereDate('created_at', Carbon::today())->count();
        return view('admin/dashboard', compact('totalEnquiriesCount', 'seenEnquiriesCount', 'pendingEnquiriesCount', 'todayEnquiriesCount'));
    }

    public function login()
    {
        return view('admin/login');
    }

    public function loginCheck(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;
            
            return to_route('admin/dashboard');
        } else {
            $request->session()->put('error', 'Invalid Credentials');
            return to_route('login');
        }
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
    public function Categories()
    {
        $categories = Category::get();
        return view('admin/categories', ['categories' => $categories]);
    }
    public function enquiries()
    {
        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();
        return view('admin/enquiries', ['enquiries' => $enquiries]);
    }
}
