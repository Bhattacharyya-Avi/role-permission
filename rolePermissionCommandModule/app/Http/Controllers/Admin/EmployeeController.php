<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Role;
use App\Models\User;
use Devfaysal\Muthofun\Facades\Muthofun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function list(){
        $employees = User::orderBy('id','desc')->get();
        return view('admin.pages.Employee.employee-list',compact('employees'));
    }

    public function create(){
        $roles = Role::select('id','name')->orderBy('id','desc')->get();
        return view('admin.pages.Employee.create-employee',compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'address'   => 'required',
            'phone'     => 'required|max:16|min:11||unique:users,phone',
            'role_id'   => 'required',
        ]);

       try{
         $password = Str::random(8);
         $user = User::create([
               'name'      =>$request->name,
               'email'     =>$request->email,
               'address'   =>$request->address,
               'phone'     =>$request->phone,
               'role_id'   =>$request->role_id,
               'password'  =>bcrypt($password),
           ]);
           SendEmailJob::dispatch($user,$password);
           Muthofun::send($user->phone , 'Hello Sadia,How are you?');
           return redirect()->route('user.list')->with('success','User Created successfully');

       }catch (\Throwable $throwable){
           return redirect()->route('user.list')->with('error','something went wrong');

       }
    }


    public function edit($id){
        $roles = Role::select('id','name')->orderBy('id','desc')->get();
        $employee = User::find($id);
        return view('admin.pages.Employee.edit',compact('roles','employee'));
    }


    public function update(Request $request,$id): RedirectResponse
    {
        $employee = User::find($id);
        try {
        $employee->update([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'address'   =>$request->address,
            'phone'     =>$request->phone,
            'role_id'   =>$request->role_id,
        ]);
            return redirect()->route('user.list')->with('success','User updated successfully');
        }catch (\Throwable $throwable){
            return redirect()->route('user.list')->with('error','something went wrong');
        }
    }


    public function delete($id)
    {
        $employee = User::find($id)->delete();
        return redirect()->route('user.list')->with('success','User deleted successfully');

    }
}
