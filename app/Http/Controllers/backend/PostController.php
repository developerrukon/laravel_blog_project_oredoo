<?php

namespace App\Http\Controllers\backend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Cache\TagSet;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories','tags', 'user')->orderBy('id', 'desc')->paginate(15);
        $draft_post = Post::with('categories','tags', 'user')->where('status', 'draft')->orderBy('id', 'desc')->paginate(15);
        $allTrashPost = Post::onlyTrashed('categories')->orderBy('id', 'desc')->paginate(15);
        return view('backend.post.index', compact('posts','draft_post', 'allTrashPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();
        return view('backend.post.create', compact('categories', 'tags'));
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
            'title' => 'required| max:500|unique:posts,title',
            'description' => 'nullable|max:20000',
            'categories' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2024',
            'tags' => 'required',
        ]);
        if($img){
            $image_name = Str::random(6).'.'.$img->extension();
            $img_upload = Image::make($img)->crop(1100,600)->save(public_path('storage/post/'.$image_name), 90);
        }
        if($img_upload){
            $post = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'image' => $image_name,
                'status' => $request->status,
            ]);
            if($post){
                $post->categories()->attach($request->categories);
                $post->tags()->attach($request->tags);
                return back()->with('success', 'Post Create Successful.!');
            }

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

        $post = Post::where('status', 'publish')->find($post);
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
        $tags = Tag::all();
        return view('backend.post.edit', compact('post', 'categories', 'tags'));
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
        'description' => 'nullable|max:20000',
        'categories' => 'required',
        'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2024',
        'tags' => 'required',
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
    ]);
    $post->categories()->sync($request->categories);
    $post->tags()->sync($request->tags);
    return redirect(route('backend.post.index'))->with('success', 'Post Update Successful!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
//delete post
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Delete Post Successful.!');
    }
//restore post
    public function restore($post)
    {
        $post = Post::onlyTrashed()->find($post);
        $post->restore();
        return back()->with('success', 'Post Restore Successful.!');
    }
//permanent delete post
    public function permanentDelete($post)
    {

        $data = Post::onlyTrashed()->findOrFail($post);
        if($data->image){
            $image_delete = Storage::delete('post/'.$data->image);
            if($image_delete){
                $data->categories()->detach();
                $data->tags()->detach();
                $data->forceDelete();
                return back()->with('success', 'Delete Category Successful.!');
            }
        };

    }
    //permanent delete post
    public function status($post)
    {

    $post = Post::findOrFail($post);
        if($post){
            if($post->status == 'publish'){
                $post->update([
                    'status' => 'draft',
                ]);
            }else{
                $post->update([
                    'status' => 'publish',
                ]);
            }
        }
        return back()->with('success', "Status Change Successful!");
    }

}
