<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerRequest;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * 管理员用户列表
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $name   = $request->input('username');
        $start  = $request->input('start');
        $end    = $request->input('end');
        $pageSize = $request->input('pagesize',15);

        //查询数据
        $users = Manager::when($name,function ($query) use ($name){
           $query->where('username','like',"%$name%");
        })->when($start,function($query) use ($start){
            $query->where('created_at','>=',$start);
        })->when($end,function($query) use ($end){
            $query->where('created_at','<=',$end);
        })->paginate($pageSize);

        //展示页面
        return view('admin.manager.index',compact('users'));
    }

    /**
     * 管理员用户添加
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add(Request $request){
        //判断请求类型
        if($request->method() == 'POST'){

            $request->validate([
                'username' => 'required|unique:manager|min:2|max:20',
                'password' => 'required|min:6|confirmed',
                'mobile' => 'required|min:8|max:11',
                'email' => 'required|email|unique:manager',
                'role_id' => 'required',
                'gender' => 'required',
            ]);

            $manager = new Manager();
            $manager->username = $request->input('username');
            $manager->password = bcrypt($request->input('password'));
            $manager->mobile = $request->input('mobile');
            $manager->email = $request->input('email');
            $manager->role_id = $request->input('role_id');
            $manager->gender = $request->input('gender');
            $manager->nickname = $request->input('nickname');
            $manager->save();

            return $manager;
        }else{
            return view('admin.manager.add');
        }
    }

    public function edit(Request $request){
        if($request->method() == "POST"){
            //验证规则
            $request->validate([
                'password' => 'required|min:6|confirmed',
                'mobile' => 'required|min:8|max:11',
                'email' => 'required|email',
                'role_id' => 'required',
                'gender' => 'required',
            ]);

            $id = $request->input('id');
            $manager = Manager::find($id);

            $request_data = [
                'password'  => bcrypt($request->input('password')),
                'mobile'    => $request->input('mobile'),
                'email'     => $request->input('email'),
                'role_id'   => $request->input('role_id'),
                'gender'    => $request->input('gender'),
                'nickname'  => $request->input('nickname')
            ];
            dd($manager->update($request_data));

        }else{
            $id = $request->input('id');

            $manager = Manager::find($id);
            return view('admin.manager.edit',compact('manager'));
        }
    }
}
