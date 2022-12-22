<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
//role index
    public function index(){
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('roles.index', compact('roles'));
    }

//roles create
    public function create(){
        $permissions = Permission::orderBy('id', 'desc')->get(['id', 'name']);
        return view('roles.create', compact('permissions'));
    }
// store role
    public function store(Request $request){
       $request->validate([
        'name' => 'required'
       ]);
       $role = Role::create([
        'name' => $request->name,
       ]);
       $role->givePermissionTo($request->permission);
       return back()->with('success', 'Role Create Successful.!');
    }
//optional permission
    public function storePermission(Request $request){
        $request->validate([
           'name' => 'required'
        ]);
        Permission::create([
            'name' => $request->name,
        ]);
        return back()->with('success', 'Permission Create Successful.!');

    }

}
