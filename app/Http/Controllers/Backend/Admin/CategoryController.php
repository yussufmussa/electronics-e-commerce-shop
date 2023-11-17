<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name','asc')->with('products')->get();
        return view('backend.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:categories',
            'photo' => 'required|mimes:png,jpg,JPG,jpeg',

        ]);

        $renamePhoto = time(). '.' .$request->photo->extension();
        $category = new Category();
        $category->name = $request->name;
        $category->category_photo = $renamePhoto;
        $category->slug = Str::slug($request->name);
        $category->save();
        $request->photo->move(public_path('photos/category_photo'), $renamePhoto);
        return redirect()->route('admin.category.index')->with('message', 'Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('backend.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $category = Category::findorfail($id);
        $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg',

        ]);

        if($request->hasFile('photo')){
            $photoPath = public_path().'/photos/category_photo/'.$category->category_photo;
            File::delete($photoPath);
            $renamePhoto = time(). '.' .$request->photo->extension();
            $request->photo->move(public_path('/photos/category_photo/'), $renamePhoto);
            $category->category_photo = $renamePhoto;

        }
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        $update = $category->update($data);
        return redirect()->route('admin.category.index')->with('message', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);

        $photoPath = public_path().'/photos/category_photo/'.$category->category_photo;
        File::delete($photoPath);
        
        $delete = $category->delete();
        return back()->with('message', 'Category deleted');
    }

}
