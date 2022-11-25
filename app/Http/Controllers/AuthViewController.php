<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;


class AuthViewController extends Controller
{
    //
    public function login() {
            if(!\Auth::user()){
            return view('login');
           }
           return redirect('/');
    } 

     /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginCheck(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
           
            return redirect('/login')->withErrors(['password' => 'كلمة السر غير صحيحة']);


        }
        return redirect('/');
    }
    
}
