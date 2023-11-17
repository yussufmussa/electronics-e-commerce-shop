<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('backend.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|mimes:jpg,png',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $newProductThumbanial= time(). '.' .$request->thumbnail->extension();
        $product->thumbnail = $newProductThumbanial;
        $product->save();
        $request->thumbnail->move(public_path('photos/thumbnails'), $newProductThumbanial);

        return redirect()->route('admin.products.index')->with(['message' => 'Product Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required',
            'description' => 'required',
            'thumbnail' => 'mimes:jpg,png',
            'price' => 'required',
        ]);

        // Check if there's a new photo
    if ($request->hasFile('thumbnail')) {
        // Delete the old photo if it exists
        if ($product->thumbnail) {
            $oldPhotoPath = public_path('photos/thumbnails/' . $product->thumbnail);
            if (file_exists($oldPhotoPath)) {
                File::delete($oldPhotoPath);
            }
        }

        // Upload and update the new photo
        $photoName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('photos/thumbnails'), $photoName);
        $product->thumbnail = $photoName;
    }
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('admin.products.index')->with(['message' => 'Product Updated Successfully']);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $namePath = public_path().'/photos/thumbnails/'.$product->thumbnail;
        File::delete($namePath);
        $delete = $product->delete();
        if($delete){
            return back()->with('message', 'Product Deleted!');
        }
    }
}
