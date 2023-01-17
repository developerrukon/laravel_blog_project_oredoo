<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index', compact('users'));
    }
    public function create(){
        return view('backend.users.create');
    }
    public function store(Request $request){
        return 'ok';
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $create = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if($create){
            return back(route('users.index'))->with('success', 'User Create Successful!');
        }{
            return back()->with('error', "User Not Created!");
        }

    }
}
