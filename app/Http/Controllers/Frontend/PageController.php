<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function productsByCategory($slug)
    {

        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)->get();


        return view('frontend.pages.products_by_category', compact('products', 'category'));
    }


    public function allProducts()
    {

        $products = Product::latest()->get();

        return view('frontend.pages.all_products', compact('products'));
    }


    public function searchProudct(Request $request)
    {
        $keywords = $request->input('keywords');

        $products = Product::with('category')
            ->when($keywords != '', function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            })
            ->latest()
            ->paginate(30);

        return view('frontend.pages.search_product_results', compact('products'));
    }

    public function productDetails($slug)
    {

        $product = Product::where('slug', $slug)->first();
        $relatedProducts = Product::where('slug', '!=', $slug)
            ->where('category_id', $product->category->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('frontend.pages.product_details', compact('product', 'relatedProducts'));
    }

    public function showCart()
    {

        return view('frontend.pages.cart');
    }

    public function postDetails($slug)
    {

        $post = Post::where('slug', $slug)->where('status', 'published')->first();
        $relatedPosts = Post::where('status', 'published')->where('slug', '!=', $slug)->take(2)->get();


        return view('frontend.pages.posts.details', compact('post', 'relatedPosts', 'adDetailsAffiliates', 'adSponsoredDetails', 'popularDestinations'));
    }

    public function blog()
    {

        $posts = Post::where('status', 'published')->paginate(15);

        return view('frontend.pages.posts.all', compact('popularDestinations', 'posts', 'adDetailsAffiliates', 'adSponsoredDetails'));
    }
}
