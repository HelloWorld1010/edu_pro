<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台路由
Route::group(['prefix' => 'admin'],function(){
    //后台登录页面
    //Route::get('public/login',['\App\Http\Controllers\Admin\PublicController'])->name('login');
    Route::get('public/login',function(){
        return 'Hello World';
    })->name('login');
});
