<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//====all user========
    public function index(){
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index', compact('users'));
    }
//====create user========
    public function create(){
        return view('backend.users.create');
    }
//====store user========
    public function store(Request $request){
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $create = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($create){
            return redirect(route('backend.users.index'))->with('success', 'User Create Successful!');
        }{
            return back()->with('error', "User Not Created!");
        }

    }
}
