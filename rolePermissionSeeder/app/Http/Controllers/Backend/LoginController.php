<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function registration()
    {
        return view('admin.registration');
    }

    public function registrationPost(Request $request)
    {
        $user = User::create([
           'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role_id'=>'1'
        ]);
        $this->dispatch(new SendMailJob($user->email));
        return redirect()->route('login');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginpost(Request $request)
    {
        // dd($request->all());
        $userInfo=$request->except('_token');
        if(Auth::attempt($userInfo)){
            return redirect()->route('admin.role.list');
        }
        return redirect()->back();

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
