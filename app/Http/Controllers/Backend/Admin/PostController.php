<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::with('user')->get();
        return view('backend.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'title' =>'required',
            'body' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,JPG',
        ]);

        
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title);
        $thumbnailName = Str::uuid().'.'.$request->thumbnail->extension();
        $post->thumbnail = $thumbnailName;
        $post->user_id = $request->user_id;
        $post->save();
        
        $request->thumbnail->move(public_path('photos/posts'), $thumbnailName);
        return redirect()->route('admin.posts.index')->with('message', 'Post Created');
    
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
        //
        $post = Post::findorfail($id);
        return view('backend.admin.post.edit', compact('post'));
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
            'title' =>'required',
            'body' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,JPG',
        ]);
        $post = Post::findorFail($id);
        
        if($request->hasFile('thumbnail')){
        
        $photoPath = public_path().'/photos/posts/'.$post->thumbnail;
        File::delete($photoPath);

        $thumbnailName = time().'.'.$request->thumbnail->extension();

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'thumbnail' => $thumbnailName,
            'slug' => Str::slug($request->title)
        ];
        $save = $post->update($data);
        if($save){
            $request->thumbnail->move(public_path('photos/posts'), $thumbnailName);
            return redirect()->route('admin.posts.index')->with('message', 'Post Updated');

        }
        }

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'slug' => Str::slug($request->title)
        ];

        $save = $post->update($data);
        if($save){
            return redirect()->route('admin.posts.index')->with('message', 'Post Updated');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findorFail($id);
        $photoPath = public_path().'/photos/posts/'.$post->thumbnail;
        File::delete($photoPath);
        $delete = $post->delete();
        if($delete){
            return back()->with('message', 'Post deleted Successfully');
        }
        
    
    }

   

    public function updateStatus(Request $request){
        $deadline = Post::findOrFail($request->id);
        $deadline->status = $request->status;
        $deadline->save();
        return response()->json(['message' => 'Post Status Updated!']);
    }

}
