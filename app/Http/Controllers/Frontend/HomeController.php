<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    // 首頁
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $products = Product::with('category', 'images')->get();

        return view('frontend.home.index', compact('products', 'categories'));
    }
}
