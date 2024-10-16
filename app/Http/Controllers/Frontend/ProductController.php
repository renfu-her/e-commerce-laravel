<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $images = $product->images;
        $mainImage = $images->where('is_default', true)->first() ?? $images->first();
        $categories = $product->categories;
        return view('frontend.product_detail', compact('product', 'images', 'mainImage', 'categories'));
    }
}
