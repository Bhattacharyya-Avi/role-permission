<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
       return view('admin.login');
    }


    public function doLogin(Request $request)
    {

        $userInfo=$request->except('_token');
        if(Auth::attempt($userInfo)){
            return redirect()->route('admin.dashboard')->with('message','Login successful.');
        }
        return redirect()->back()->with('error','Invalid user credentials');

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logging out.');
    }
}
