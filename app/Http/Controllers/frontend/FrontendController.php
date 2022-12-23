<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $slider = Post::with('categories', 'user')->select('user_id','title','slug','image','created_at')->where('slider', true)->get()->take(3);
        //$slider = Post::with('categories')->where('slider', true)->get();
        return view('frontend.index', compact('slider'));
    }
}
