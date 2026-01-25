<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    public function index(){
        $banners = HomeBanner::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();

        return view('pages.index', compact('banners', 'categories'));
    }
}
