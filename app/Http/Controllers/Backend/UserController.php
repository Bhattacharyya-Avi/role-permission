<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use App\Models\Roles_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function userList()
    {
        $users = Roles_user::with('user','role')->get();
        // dd($users);
        return view('admin.pages.user.list',compact('users'));
    }
    
    public function adduser()
    {
        $roles = Role::all();
        return view('admin.pages.user.create',compact('roles'));
    }

    public function userpost(Request $request)
    {
        // dd($request->all());
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        Roles_user::create([
            'role_id'=>$request->role,
            'user_id'=>$user->id
        ]);

        return redirect()->back();
    }
}
