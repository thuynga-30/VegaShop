<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function signup(){
        return view('users.log-sign.signup',[
            'title' => 'Sign Up'
        ]);
    }

    public function save(Request $request){
        //valdate
        
        $request->merge(['password'=>Hash::make($request->password)]);
        try {
         
            User::create($request->all());

        } catch (\Throwable $th){
            dd($th);
        }
        return redirect()->route('login');
    }

    public function login(){
        return view('users.log-sign.login',[
            'title' => 'Login'
        ]);
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]); 
        if (Auth::attempt([
            'email'=> $request-> input('email'),
            'password' => $request-> input('password')
        ],  )) { 
            
            return redirect()->route('home');
        }
        Session:: flash('error','Email hoặc Password không đúng');
        return redirect()->back();
    }
}
