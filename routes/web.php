<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\MainController;

Route::get('main/shop/index',[MainController::class,'index'])->name('index');
Route::get('users/log-sign/signup',[LoginController::class,'signup'])->name('signup');
Route::post('users/log-sign/signup/save',[LoginController::class,'save']);

Route::get('users/log-sign/login',[LoginController::class,'login'])->name('login');
Route::post('users/log-sign/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('main/shop/home', [MainController::class, 'home'])->name('home');
});
Route::get('/logout',[MainController::class,'logout'])->name('logout');