<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get(); 
        $sliders = Slider::latest()->get();    
        $products = Product::latest()->take(9)->get();
        
        return view('frontend.index', compact('categories', 'sliders', 'products'));
    }
}
