<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registration(Request $request)
    {
//        dd($request->all());
        User::create([
            'name'=>$request->user_name,
            'email'=>$request->user_email,
            'password'=>bcrypt($request->user_password),
            'mobile'=>$request->user_mobile,
        ]);

        return redirect()->back()->with('message','Registration successful.');


    }


    public function login(Request $request)
    {

        $userInfo=$request->except('_token');
//        $credentials['email']=$request->user_email;
//        $credentials['password']=$request->user_password;
//        dd($credentials);
//        $credentials=$request->only('user_email','user_password');


        if(Auth::attempt($userInfo)){
            return redirect()->back()->with('message','Login successful.');
        }
        return redirect()->back()->with('error','Invalid user credentials');

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('website')->with('message','Logging out.');
    }
}
