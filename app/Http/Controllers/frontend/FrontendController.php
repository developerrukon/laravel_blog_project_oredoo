<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $sliders = Post::with('categories', 'user')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('slider', true)->get()->take(4);
        $categorys = Category::with('posts')->orderBy('id', 'desc')->where('status', 1)->get()->take(10);
        $posts = Post::with('categories', 'user')->orderBy('id', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('slider', 'publish')->paginate(6);
        $popularPosts = Post::with('categories')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('slider', 'publish')->get()->take(5);

        return view('frontend.index', compact('sliders', 'categorys','posts', 'popularPosts'));
    }
}
