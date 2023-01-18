<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);
        //permission list and array

        $permissions = [
            //Dashboard
            'dashboard.view',
            //blog permission
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',
            //admin permission
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',
            //role permission
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',
            //profile permission
            'profile.create',
            'profile.view',
            'profile.edit',
        ];
        //create $ assign permission

        for ($i=0; $i < count($permissions); $i++) {
            //create permission
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
