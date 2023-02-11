<?php

namespace App\Http\Controllers\backend;

use App\Models\Tag;
use Illuminate\Support\Str;
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
            'tag_name' => 'required|max:30|unique:tags'
        ]);

        $tag = Tag::create([
            'tag_name'=>$request->tag_name,
            'tag_slug'=>$request->tag_name,
        ]);
        if($tag){
            return back()->with('success', "Tag Create Successful!");

        }


    }
    // edit tags
   public function edit($tag){
    $edit_tag = Tag::find($tag);
    $tags = Tag::paginate(10);
    return view('backend.tag.index', compact('tags', 'edit_tag'));

    }
    //update tag
    public function update(Tag $tag, Request $request){
        // validate tag
        $request->validate([
            'tag_name' => 'required|max:30|unique:tags,tag_name,'.$tag->id
        ]);

        $tag->update([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name)
        ]);
        if($tag){
            return redirect(route('backend.tag.index'))->with('success', "Tag Update Successful!");

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
