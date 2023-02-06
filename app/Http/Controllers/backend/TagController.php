<?php

namespace App\Http\Controllers\backend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //all tags
   public function index(){
    $tags = Tag::paginate(10);
    return view('backend.tag.index', compact('tags'));
   }
   // add tags
   public function store(Request $request){

        // validate tag
        $request->validate([
            'tag_name' => 'required|unique:tags'
        ]);

        $tag = Tag::create([
            'tag_name'=>$request->tag_name,
            'tag_slug'=>$request->tag_name,
        ]);
        if($tag){
            return back()->with('success', "Tag Create Successful!");

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
