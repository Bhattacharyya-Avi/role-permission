<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Roles_permission;
use App\Models\Roles_user;
use App\Models\User;

class RoleController extends Controller
{
    public function roleList()
    {
        // $user_id = auth()->user()->id;
        // $user = Roles_user::with('user','role')->where('user_id',$user_id)->first();
        // // dd($user);
        // $role = Role::where('id',$user->role_id)->first();
        // // dd($role);
        // $permissions = Roles_permission::where('role_id',$role->id)->get();
        // dd($permissions);
        // $role->givePermissionsTo($permissions);


        $roles = Role::all();
        return view('admin.pages.role.role-list',compact('roles'));
    }
}
