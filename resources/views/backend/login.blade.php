<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『在线教育平台』后台管理</title>
    <link href="/admin/login/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>『在线教育平台』后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            @if(count($errors->LoginErrors)>0)
                @foreach($errors->LoginErrors->all() as $messages)
                    <span style="color: red">{{$messages}}</span><br/>
                @endforeach
            @endif
            <form action="{{url('/System/Login')}}" method="post">
                {!! csrf_field() !!}
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="user" size="40" class="admin_input_style" placeholder="请输入登录帐号" />
                    </li>

                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" id="pwd" size="40" class="admin_input_style" placeholder="请输入登录密码,长度为6-16位" />
                    </li>

                    <li>
                        <label for="vcode">验证码：</label>
                        <input type="text" name="vcode" id="vcode" size="10" class="admin_input_style" placeholder="验证码" />&nbsp;<img src="{{captcha_src()}}" style="display:inline-block;vertical-align:middle;cursor: pointer;" title="看不清,可以点击切换验证码!" onclick="this.src='{{captcha_src()}}?'+Math.random();" />
                    </li>

                    <li>
                        <input type="submit" tabindex="3" value="登录后台" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>