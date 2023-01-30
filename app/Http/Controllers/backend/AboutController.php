<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit(){
        $about = About::all();
        return $about;
        return view('backend.about.edit', compact('about'));
    }
}
