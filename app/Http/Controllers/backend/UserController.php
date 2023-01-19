<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//====all user========
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index', compact('users'));
    }
//====create user========
    public function create()
    {
        $roles = Role::select('name')->get();
        return view('backend.users.create', compact('roles'));
    }
//====store user========
    public function store(Request $request)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($request->roles){
            $user->assignRole($request->roles);
        }
        if($user){
            return redirect(route('backend.users.index'))->with('success', 'User Create Successful!');
        }{
            return back()->with('error', "User Not Created!");
        }

    }
    //====edit user========
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::select('name')->get();
        return view('backend.users.edit', compact('user', 'roles'));
    }
    //====update user========
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
         $user->roles()->detach();
        if($request->roles){
            $user->assignRole($request->roles);
            return redirect(route('backend.users.index'))->with('success', "User Update  Created!");
        }else{
            return back()->with('error', "User Not Fail!");
        }

    }
    //==== delete users========
        public function destroy($id)
        {
            $user = User::find($id);
            if (!is_null($user)) {
                $user->delete();
                return back()->with('success', "User Delete Successful!");
            }else{
                return back()->with('error', "User Not Deleted");
            }

        }

}
