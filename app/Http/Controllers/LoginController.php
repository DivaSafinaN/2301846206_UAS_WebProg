<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{  
    public function login(){
        return view('auth.login',[
            "title" => "Log In" 
        ]);
    }

    public function logout_page(){
        return view('auth.logout',[
            "title" => "Log Out" 
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError','Login failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/logout-page');
    }
}
