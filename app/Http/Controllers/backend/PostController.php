<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->orderBy('id', 'desc')->select('id', 'title', 'slug','image', 'description', 'slider', 'post_view', 'status', 'created_at')->paginate(20);
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('image');
        $request->validate([
            'title' => 'required|max:200|unique:posts,title',
            'description' => 'nullable',
            'categories' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'status' => 'nullable',
            // 'is_slider' => 'nullable'
        ]);
        $image_name = null;
        if($img){
            $image_name = Str::random(6).'.'.$img->extension();
            $upload = Image::make($img)->crop(1100,600)->save(public_path('storage/post/'.$image_name), 90);
        }
        if($upload){
            $post = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'image' => $image_name,
                'status' => $request->status,
                // 'slider' => $request->is_slider,
            ]);
            $post->categories()->attach($request->categories);
            return redirect(route('backend.post.index'))->with('success', 'Post Create Successful.!');

        }else{
            return back()->with('error', "Image Not Uploaded!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {

        $post = Post::where('id', $post)->firstOrFail();
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('backend.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
    $img = $request->file('image');
    $request->validate([
        'title' => 'required | unique:posts,title,'.$post->id,
        'description' => 'nullable',
        'categories' => 'required ',
        'image' => 'nullable | mimes:png,jpg,jpeg,svg|max:5000',
        'status' => 'required',
        // 'is_slider' => 'nullable'
    ]);

    if($img){
        $image_name = Str::random(6).'.'.$img->extension();

//image delete
        if(file_exists(public_path('storage/post/'.$post->image))){
            Storage::delete('post/'. $post->image);
        }
        Image::make($img)->crop(1100,600)->save(public_path('storage/post/'.$image_name));
    }else{
        $image_name = $post->image;
    }

    $post->update([
        'user_id' => Auth::user()->id,
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'image' => $image_name,
        'status' => $request->status,
        // 'slider' => $request->is_slider,
    ]);
    $post->categories()->sync($request->categories);
    return redirect(route('backend.post.index'))->with('success', 'Post Update Successful!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {;
        $post->categories()->detach();
        $post->delete();
        return back()->with('success', 'Delete Post Successful.!');
    }
}
