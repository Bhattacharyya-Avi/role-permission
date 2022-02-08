<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Roles_permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function permissionList()
    {
        $permissions = Permission::all();
        return view('admin.pages.permission.permission-list',compact('permissions'));
    }

    public function assignPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.pages.assign_permission.assign',compact('roles','permissions'));
    }

    public function assignPermissionList()
    {
        // $assignPermissions = Roles_permission::with('role','permission')->get();
        // dd($assignPermissions);
        $assignPermissions = Role::with('assignpermission')->get();
        // dd($assignPermissions);
        return view('admin.pages.assign_permission.list',compact('assignPermissions'));
    }

    public function assignPermissionPost(Request $request)
    {
        foreach ($request->permissions as $key => $permission) {
            Roles_Permission::create([
                'role_id' => $request->role,
                'permission_id'=>$permission
             ]);
        }
        return redirect()->back();
    }
}
