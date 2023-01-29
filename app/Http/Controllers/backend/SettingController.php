<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit(){
        $settings = Setting::first();
        return view('backend.settings.edit', compact('settings'));
    }
    public function update(Request $request){
        $request->validate([
            'website_name' => 'required|max:100',
            'description' => 'required|max:100',
        ]);
    }
}
