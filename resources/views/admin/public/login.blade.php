<!doctype html>
<html  class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.2</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/admin/static/css/font.css">
    <link rel="stylesheet" href="/admin/static/css/login.css">
    <link rel="stylesheet" href="/admin/static/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">x-admin2.0-管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" action="/admin/public/check" >
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <div class="layui-row">
            <div class="layui-col-md7">
                <input name="captcha" lay-verify="required" placeholder="验证码"  type="text" class="layui-input" maxlength="8">
            </div>
            <div class="layui-col-md5">
                <a class="change_captcha" href="javascript:;">
                    <img style="height:50px;width:142px;" src="{{captcha_src()}}" class="captcha">
                </a>
            </div>
        </div>
        <hr class="hr15">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
        {{ csrf_field() }}
    </form>
</div>

<script>
    $(function  () {
        layui.use('form', function(){
            var form = layui.form;
            // layer.msg('玩命卖萌中', function(){
            //   //关闭后的操作
            //   });
            //监听提交
            // form.on('submit(login)', function(data){
            //     // alert(888)
            //     layer.msg(JSON.stringify(data.field),function(){
            //         location.href='index.html'
            //     });
            //     return false;
            // });

            //以弹窗形式输出错误的内容
            @if(count($errors) > 0)
                var allError='';
                @foreach ($errors->all() as $error)
                    allError += "{{$error}}<br/>";
                @endforeach
                //输出错误信息
                layer.alert(allError,{title:'错误提示',icon:5});
            @endif
        });

        //验证码
        var src = $(".captcha").attr('src');
        $(".change_captcha").click(function () {
            $(".captcha").attr('src',src+'&_='+Math.random())
        })


    })


</script>
<!-- 底部结束 -->
</body>
</html>
