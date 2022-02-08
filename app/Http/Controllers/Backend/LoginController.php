<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
