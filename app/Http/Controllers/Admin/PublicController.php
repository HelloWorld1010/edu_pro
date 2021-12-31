<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //登录页面的展示
    public function login(){
        //展示视图
        return view('admin.public.login');
    }

    //登录验证方法
    public function check(Request $request){
        //验证规则
        $request->validate([
            'username' => 'required|min:2|max:20',
            'password' => 'required|min:6',
            'captcha'  => 'required|size:4|captcha'
        ]);

        //进行身份核实
        $credentials = $request->only('username','password');
        $credentials['status'] = 1; //要求用户状态为启用

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect('/admin/index/index');
        }else{
            return redirect('admin/public/login')->withErrors([
                'loginError' => '用户名或密码错误！'
            ]);
        }
    }

    /**
     * 退出
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(){
        //退出
        Auth::guard('admin')->logout();
        //跳转到登录页面
        return redirect('/admin/public/login');
    }
}
