<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit(){
        $settings = Setting::all();
        return view('backend.settings.edit', compact('settings'));
    }
}
