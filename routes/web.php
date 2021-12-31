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

/**
 * 后台登录模块路由
 */
Route::group(['prefix' => 'admin'],function(){
    //后台登录页面
    Route::get('public/login',[\App\Http\Controllers\Admin\PublicController::class,'login'])->name('login');
    //验证登录
    Route::post('public/check',[\App\Http\Controllers\Admin\PublicController::class,'check']);
    //退出
    Route::get('public/logout',[\App\Http\Controllers\Admin\PublicController::class,'logout']);
});

Route::group(['prefix' => 'admin','middleware' => ['auth:admin']],function(){
    /**
     * 后台用户管理模块
     */
    //后台首页
    Route::get('index/index',[\App\Http\Controllers\Admin\IndexController::class,'index'])->name('admin_index');
    //后台欢迎页面
    Route::get('index/welcome',[\App\Http\Controllers\Admin\IndexController::class,'welcome'])->name('admin_welcome');

    /**
     * 管理员管理模块
     */
    //管理员列表
    Route::get('manager/index',[\App\Http\Controllers\Admin\ManagerController::class,'index']);
    //添加
    Route::match(['get','post'],'manager/add',[\App\Http\Controllers\Admin\ManagerController::class,'add']);
    Route::match(['get','post'],'manager/edit',[\App\Http\Controllers\Admin\ManagerController::class,'edit']);
});
