<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendPostController extends Controller
{

    public function archive($slug){
        $catPost = Category::where('slug', $slug)->firstOrFail();
        $catPost -> setRelation('posts', $catPost->posts()->paginate(9));
        return view('frontend.archive', compact('catPost'));
    }
    public function singlePost($slug){
        $post = Post::where('slug', $slug)->first();
        $post->increment('post_view');
        $comments = Comment::where('post_id', $post->id)->where('parent_id', NULL)->orderBy('id', 'desc')->with('user', 'replys.user', 'post')->get();
        return view('frontend.single', compact('post', 'comments'));
    }

}
