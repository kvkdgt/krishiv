<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Portfolio;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }
    public function portfolio()
    {
        $categories = Category::all();
        $activeCategory = "All";
        $portfolios = Portfolio::with('category')->where('status', 'Active')->get(); 
        return view('portfolio', compact('categories', 'portfolios', 'activeCategory'));
    }
    public function contactUs()
    {
        return view('contact-us');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function portfolioByCategory($categoryName)
    {
        $category = Category::where('name', $categoryName)->firstOrFail();
        $portfolios = Portfolio::where('category_id', $category->id)->where('status', 'Active')->get();
        $categories = Category::all();
        $activeCategory = $categoryName;
        return view('portfolio', compact('categories', 'portfolios','activeCategory'));
    }

    public function productDetail($product)
    {
        $portfolio = Portfolio::with('category')->where('name', $product)->firstOrFail();
        return view('portfolio-detail', compact('portfolio'));

    }
}


