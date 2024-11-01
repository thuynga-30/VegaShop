<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function _construct(){
        $this->middleware('auth',['except'=> 'logout']);
    }
    public function index(){
        return view('main.shop.index',[
            'title' => 'VeganicShop'
        ]);
    }
    public function home(){
        return view('main.shop.home',[
            'title' => 'Home'
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index'); 
    }
}
