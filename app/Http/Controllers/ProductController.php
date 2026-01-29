<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)->paginate('4');
        $category = Category::where('status', 1)->get();

        return view('pages.shop', compact('products','category'));
    }
}
