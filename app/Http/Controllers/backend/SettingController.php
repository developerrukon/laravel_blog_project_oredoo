<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit(){
        $settings = Setting::first();
        return view('backend.settings.edit', compact('settings'));
    }
    public function update(Request $request){
        $image_white = $request->file('website_logo_white');
        $image_dark = $request->file('website_logo_dark');
        $settings = Setting::first();
        $request->validate([
            'website_name' => 'nullable|max:50',
            'website_logo_white' => 'nullable|mimes:png|max:300',
            'website_logo_dark' => 'nullable|mimes:png,|max:300',
        ]);

        // ----------image white-------
        if($image_white){
            $image_name_white = 'logo-white.'.$image_white->extension();
            //image delete
            if(file_exists(public_path('storage/settings/'. $settings->website_logo_white))){
                Storage::delete('settings/'. $settings->website_logo_white);
            }
            Image::make($image_white)->save(public_path('storage/settings/'.$image_name_white));
        }else{
            $image_name_white = $settings->website_logo_white;
        }

        // --------image dark---------
        if($image_dark){
            $image_name_dark = 'logo-dark.'.$image_dark->extension();
            //image delete
            if(file_exists(public_path('storage/settings/'. $settings->website_logo_dark))){
                Storage::delete('settings/'. $settings->website_logo_dark);
            }
            Image::make($image_dark)->save(public_path('storage/settings/'.$image_name_dark));
        }else{
            $image_name_dark = $settings->website_logo_dark;
        }

        $update = $settings->update([
            'website_name' => $request->website_name,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'Youtube' => $request->youtube,
            'copyright' => $request->copyright,
            'website_logo_white' => $image_name_white,
            'website_logo_dark' => $image_name_dark,

        ]);
        if($update){
            return back()->with('success', 'Setting Update Successful!');
        }else{
            return back()->with('success', 'Setting Update Fail!');
        }
    }
}
