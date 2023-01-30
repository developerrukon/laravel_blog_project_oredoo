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
        $logo =  $request->file('website_logo');
        //validation
        $request->validate([
            'website_name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $settings = Setting::first();
        $settings->update($request->all());
        //logo upload

        if($logo){
            $file_path = 'storage/settings/'.$settings->website_logo;
            //logo delete
            if(file_exists(public_path($file_path))){
                File::delete($file_path);
            }
            $logo_name = Str::random(6).'.'.$logo->extension();
            //logo upload
            Image::make($logo)->save(public_path('storage/settings/'.$logo_name));
            $settings->website_logo = $logo_name;
            $settings->save();
        }

        return back()->with('success', "Settings Data Updated!");
    }
}
