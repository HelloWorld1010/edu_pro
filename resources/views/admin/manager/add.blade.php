<!--继承基础模板-->
@extends('admin.base')
<!--body内容-->
@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form" method="post" action="/admin/manager/add">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>登录名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="username" name="username" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会成为您唯一的登入名
                </div>
            </div>
            <div class="layui-form-item">
                <label for="nickname" class="layui-form-label">
                    <span class="x-red">*</span>昵称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="nickname" name="nickname" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="phone" name="mobile" required="" lay-verify="phone"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>邮箱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_email" name="email" required="" lay-verify="email"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>角色</label>
                <div class="layui-input-block">
                    <input type="radio" name="role_id" lay-skin="primary" title="超级管理员" value="1" >
                    <input type="radio" name="role_id" lay-skin="primary" title="编辑人员" value="2" checked="">
                    <input type="radio" name="role_id" lay-skin="primary" title="数字编辑人员" value="3">
                    <input type="radio" name="role_id" lay-skin="primary" title="审核人员" value="4">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>性别</label>
                <div class="layui-input-block">
                    <input type="radio" name="gender" lay-skin="primary" value="1" title="男" checked="">
                    <input type="radio" name="gender" lay-skin="primary" value="2" title="女">
                    <input type="radio" name="gender" lay-skin="primary" value="3" title="保密">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    6到16个字符
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>确认密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_repass" name="password_confirmation" required="" lay-verify="repass"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
{{--                <button  class="layui-btn" lay-filter="add" lay-submit="">--}}
{{--                    增加--}}
{{--                </button>--}}
                <input type="submit" class="layui-btn" value="增加">
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>
<script>
    layui.use(['form', 'layer'],
        function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //自定义验证规则
            form.verify({
                nikename: function(value) {
                    if (value.length < 5) {
                        return '昵称至少得5个字符啊';
                    }
                },
                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                repass: function(value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(add)',
                function(data) {
                    //console.log(data);
                    //发异步，把数据提交给php
                    // $.ajax({
                    //     url: '/admin/manager/add',
                    //     type: 'post',
                    //     dataType: 'json',
                    //     data: data.field,
                    //     success:function (data) {
                    //         console.log(data)
                    //     },
                    //
                    // })

{{--                    @if(count($errors) > 0)--}}
{{--                        var allError='';--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            allError += "{{$error}}<br/>";--}}
{{--                        @endforeach--}}
{{--                        //输出错误信息--}}
{{--                        layer.alert(allError,{title:'错误提示',icon:5});--}}
{{--                    @else--}}
{{--                        layer.alert("增加成功", {--}}
{{--                            icon: 6--}}
{{--                        }, function() {--}}
{{--                            //关闭当前frame--}}
{{--                            xadmin.close();--}}

{{--                            // 可以对父窗口进行刷新--}}
{{--                            xadmin.father_reload();--}}
{{--                        });--}}
{{--                        return false;--}}
{{--                    @endif--}}
                });
            @if(count($errors) > 0)
                var allError='';
                @foreach ($errors->all() as $error)
                    allError += "{{$error}}<br/>";
                @endforeach
                //输出错误信息
                layer.alert(allError,{title:'错误提示',icon:5});
            @endif

        });
</script>
@endsection
