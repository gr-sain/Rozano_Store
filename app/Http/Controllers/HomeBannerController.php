<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    public function index(Request $request){
        $banners = HomeBanner::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();

        
        $filter = $request->get('filter', 'all');
        
        $productsQuery = Product::where('status', 1);
        
        if ($filter === 'featured') {
            $productsQuery->where('is_featured', 1);
        } elseif ($filter === 'popular') {
            $productsQuery->where('is_popular', 1);
        } elseif ($filter === 'new') {
            $productsQuery->where('is_new', 1)->latest();
        }
                    
        $products = $productsQuery->get();

        return view('pages.index', compact('banners', 'categories', 'products', 'filter'));
    }
}
