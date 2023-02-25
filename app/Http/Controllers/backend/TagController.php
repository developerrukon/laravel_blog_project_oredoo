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
    $tags = Tag::withCount('posts')->paginate(10);
    $trash_tag = Tag::withCount('posts')->onlyTrashed()->paginate(10);
    return view('backend.tag.index', compact('tags', 'trash_tag'));
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
    $tags = Tag::withCount('posts')->paginate(10);
    $edit_tag = Tag::find($tag);
    $trash_tag = Tag::withCount('posts')->onlyTrashed()->paginate(10);
    return view('backend.tag.index', compact('tags', 'edit_tag', 'trash_tag'));

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
        // restore tags
      public function restore($id){
        $tag = Tag::onlyTrashed()->findOrFail($id);
        $tag->restore();
        return back()->with('success', 'Tag Restore Successful!');
       }
               // restore tags
      public function permanentDelete($id){
        $tag = Tag::onlyTrashed()->findOrFail($id);
        $tag->posts()->detach();
        $tag->forceDelete();
        return back()->with('success', 'Tag Restore Successful!');
       }

}
