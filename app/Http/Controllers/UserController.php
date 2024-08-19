<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $superAdminRole = Role::create(['name'=>'superAdmin']);


        $permissions =[
            'create-users',
            'read-users',
            'update-users',
            'delete-users',
        ];
        foreach ($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
        $superAdminRole->givePermissionTo($permissions);


        $adminRole = Role::create(['name'=>'Admin']);
        $adminPermissions =[
           'read-users',
        ];

        $adminRole->givePermissionTo($adminPermissions);
    }
}
