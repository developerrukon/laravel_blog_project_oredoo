<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
//r=========ole index======
    public function index(){
        $roles = Role::get();
        return view('backend.roles.index', compact('roles'));
    }

//==========roles  permission create========
    public function create()
    {
        $permissions = Permission::orderBy('name')->get(['id', 'name']);
        return view('backend.roles.create', compact('permissions'));
    }
// ========store role=======
    public function store(Request $request){
        //validate role
        $request->validate([
            'name' => 'required|unique:roles'
           ]);
           //create role
           $role = Role::create([
            'name' => $request->name,
           ]);
           //permission input
           $permissions = $request->input('permissions');
           if(!empty($role)){
            $role->syncPermissions($permissions);
            return redirect(route('backend.role.index'))->with('success', 'Role Create Successful.!');
           }else{
            return back()->with('error', 'Role Create fail!');
           }


    }
    // ========store permission=======
    public function storePermission(Request $request){
        // validate permission
        $request->validate([
            'name' => 'required|unique:permissions'
           ]);

        $permission = Permission::create([
            'name'=>$request->name,
        ]);
        if($permission){
            return back()->with('success', "Permission Create Successful!");

        }

    }
    //=======edit role=========

    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::orderBy('name')->get();
        return view('backend.roles.edit', compact('role', 'permissions'));
    }
    //======update role====
    public function update(Request $request, $id){
        //validate role
        $request->validate([
            'name' => 'required | unique:roles,name,'.$id,
           ]);
           //role find
           $role = Role::findById($id);
           //permission find
           $permissions = $request->input('permissions');

           if(!empty($permissions)){
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
            return redirect(route('backend.role.index'))->with('success', 'Role Update Successful.!');
           }else{
            return back()->with('error', 'Role Update fail!');
           }
    }
    public function destroy($id)
    {
        $role = Role::findById($id);
        if(!is_null($role)){
            $role->delete();
        }
        return back()->with('success', "Role Delete Successful!");
    }

}
