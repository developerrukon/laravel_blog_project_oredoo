<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class LoginUserController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userId = auth()->user()->id;
        $posts = Post::where('user_id', $userId)->get();
        return view('backend.users.loginUser', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('backend.users.loginUser');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $img = $request->file('image');
        $id = auth()->user()->id;
        $image = auth()->user()->image;
        $user = User::find($id);

        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email| max:unique:users,email,'.$id,
            'phone'=>'nullable|string|max:11',
            'address'=>'nullable|string|max:150',
            'password'=>'nullable|string|min:8|confirmed',
            'image' => 'nullable| mimes:png,jpg,jpeg | max:700'
        ]);
        if($img){
            $image_name = $request->name.'_'.Str::random(6).'.'.$img->extension();
            if(file_exists(public_path('storage/users/'.$image))){
                Storage::delete('users/'.$image);
            }
            Image::make($request->file('image'))->crop(450,450)->save(public_path('storage/users/'.$image_name));

        }else{
            $image_name = $image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->image = $image_name;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('backend.login.user.show'))->with('success', "you Profile Updated Successful!");
    }

}
