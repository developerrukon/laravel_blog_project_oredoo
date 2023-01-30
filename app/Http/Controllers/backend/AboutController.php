<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit(){
        $about = About::first();
        return view('backend.about.edit', compact('about'));
    }
    public function update(Request $request){
        $img = $request->file('image');
        $about = About::first();
        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2024',
            'description' => 'nullable|max:20000',
        ]);
        if($img){
            $image_name = Str::random(6).'.'.$img->extension();

            //image delete
            if(file_exists(public_path('storage/about/'. $about->image))){
                Storage::delete('about/'. $about->image);
            }
            Image::make($img)->crop(1100,650)->save(public_path('storage/about/'.$image_name));
        }else{
            $image_name = $about->image;
        }
        $update = $about->update([
            'image' => $image_name,
            'description' => $request->description,

        ]);
        if($update){
            return back()->with('success', 'About Update Successful!');
        }else{
            return back()->with('success', 'About Update Fail!');
        }

    }

}
