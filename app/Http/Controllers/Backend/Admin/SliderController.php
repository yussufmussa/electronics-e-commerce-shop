<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       //
       $sliders = Slider::latest()->get();
       return view('backend.admin.sliders.index', compact('sliders'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
       return view('backend.admin.sliders.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //
       $request->validate([
           'name' => 'required|mimes:png,jpg,jpeg,PNG,JPEG'

       ]);

       $slider = new Slider();

       $sliderName = time().'.'.$request->name->extension();
       $slider->name      = $sliderName;
       $save = $slider->save();
       if($save){

           $request->name->move(public_path('photos/sliders'), $sliderName);
           return redirect()->route('admin.sliders.index')->with('message', 'Slider Added');
       }
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       ////
       $slider = Slider::findorfail($id);
       return view('backend.admin.sliders.edit', compact('slider'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       //
       $request->validate([
           'name' => 'mimes:png,jpg,jpeg,PNG,JPEG'
       ]);

       $slider = Slider::findOrFail($id);

    // Check if there's a new photo
    if ($request->hasFile('name')) {
        // Delete the old photo if it exists
        if ($slider->name) {
            $oldPhotoPath = public_path('photos/sliders/' . $slider->name);
            if (file_exists($oldPhotoPath)) {
                File::delete($oldPhotoPath);
            }
        }

        // Upload and update the new photo
        $photoName = time() . '.' . $request->name->extension();
        $request->name->move(public_path('photos/sliders'), $photoName);
        $slider->name = $photoName;
    }

    // Update other data
    $slider->save();

    return redirect()->route('admin.sliders.index')->with('message', 'Updated Successfully');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $slider = Slider::findorfail($id);
       $namePath = public_path().'/photos/sliders/'.$slider->name;
       File::delete($namePath);
       $delete = $slider->delete();
       if($delete){
           return back()->with('message', 'Slider Deleted!');
       }
   }
}
