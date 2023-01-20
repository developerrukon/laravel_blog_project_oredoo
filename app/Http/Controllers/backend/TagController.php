<?php

namespace App\Http\Controllers\backend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //all tags
   public function index(){
    $tags = Tag::all();
    return view('backend.tag.index', compact('tags'));
   }
   // add tags
   public function store(Request $request){
    $request->validate([
        'name' => 'required|tag_name'|'unique:admins'
    ]);

    $tag = Tag::create([
        'tag_name' => $request->name,
    ]);
    if($tag){
        return back()->with('success', 'Tag Create Successful!');
    }{
        return back()->with('error', "Tag Not Created!");
    }
   }
      // delete tags
      public function destroy($tag){
        $tag = Tag::find($tag);
        $delete = $tag->delete();
        if($delete){
            return back()->with('success', 'Tag Delete Successful!');
        }{
            return back()->with('error', "Tag Not Deleted!");
        }
       }
}
