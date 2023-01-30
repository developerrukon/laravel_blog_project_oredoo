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
    // ---------home page--------
    public function index(){

        ///sliders category
        $categories = Category::all();
        $post_sliders = Post::with('categories', 'user')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->get()->take(5);
        ///sub category with post count
        $categorys = Category::with('posts')->withCount('posts')->orderBy('id', 'desc')->where('status', true)->get()->take(10);
        //post with category and user
        $posts = Post::with('categories', 'user')->orderBy('id', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->paginate(8);
        //popular post with category
        $popularPosts = Post::with('categories')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->get()->take(5);
        $tags = Tag::all();

        return view('frontend.index', compact('post_sliders', 'categorys','posts', 'popularPosts', 'tags'));
    }
//------- author post ---------
    public function author($id){
        $user_posts = Post::where('user_id', $id)->get();
        $author_info = User::find($id);
        $categorys = Category::get()->take(9);
        $tags = Tag::all();
        $popularPosts = Post::with('categories')->orderBy('post_view', 'desc')->select('id','user_id','title','slug','image','post_view','created_at')->where('status', 'publish')->get()->take(5);
        return view('frontend.author',[
            'user_posts' => $user_posts,
            'author_info' => $author_info,
            'popularPosts' => $popularPosts,
            'categorys' => $categorys,
            'tags' => $tags,
        ] );
    }
    // ------all users-----
    public function author_list(){
        $author_list = Post::select('user_id')->groupBy('user_id')->selectRaw('user_id, sum(user_id) as sum ')->get();
        return view('frontend.author_list', compact('author_list'));
    }
    //-------about us------
    public function about(){
        return view('frontend.about');
    }
    //-------contact-------
    public function contact(){

        return view('frontend.contact');
    }





}
