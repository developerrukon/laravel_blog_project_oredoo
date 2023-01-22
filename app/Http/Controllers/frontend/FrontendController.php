<?php

namespace App\Http\Controllers\frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Laravel\Ui\Presets\Vue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){

        ///sliders category
        $categories = Category::all();
        $sliders = Post::with('categories', 'user')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->get()->take(5);
        ///sub category with post count
        $categorys = Category::with('posts')->withCount('posts')->orderBy('id', 'desc')->where('status', true)->get()->take(10);
        //post with category and user
        $posts = Post::with('categories', 'user')->orderBy('id', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->paginate(8);
        //popular post with category
        $popularPosts = Post::with('categories')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->get()->take(5);
        $tags = Tag::all();

        return view('frontend.index', compact('sliders', 'categorys','posts', 'popularPosts', 'tags'));
    }
    public function author(){
        // $author_posts = Post::where('user_id', $id)->get();
        // $author = User::find($id);
        // return view('frontend.author', compact('author_posts', 'author'));
    }

    public function contact(){
        return view('frontend.contact');
    }




}
