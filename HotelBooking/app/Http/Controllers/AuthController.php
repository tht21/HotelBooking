<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {  
        return view('admin.auth.login');
    }

     public function postLogin(AuthRequest $request)
     {
        $data = $request->only('email','password');
        // dd(Hash::make(123456789));
        if( Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
