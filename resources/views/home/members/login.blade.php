<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/home/img/asset-favicon.ico">
    <title>在线教育网</title>
    <link rel="stylesheet" href="/home/plugins/normalize-css/normalize.css" />
    <link rel="stylesheet" href="/home/plugins/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="/home/css/page-learing-sign.css" />
</head>

<body>
<!-- 页面 -->
<div class="register">
    <div class="register-head">
        <div class="wrap">
            <a href="javascript:;" class="logo">
                <img src="/home/img/asset-logoico.png" alt="logo" width="200">
            </a>
            <div class="go-regist" style="position: absolute;border-bottom: 10px;">还没有账号？<a href="#">去注册</a></div>
        </div>
    </div>
    <div class="register-body">
        <div class="register-cent">
            <img src="/home/img/asset-login_img.jpg" alt="" class="register-ico">
            <form class="required-validate" id="regStudentForm">
                <ul class="r-position login">
                    <li>
                        <div class="page-header">
                            <h3>欢迎登录在线教育</h3>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">登录名：</label>
                            <div class="">
                                <input type="text" class="form-control" name="username" placeholder="请输入登录名">
                                <span class="verif-span">请输入5-25个字符</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">密码</label>
                            <div class="">
                                <input type="password" class="form-control" name="password" placeholder="请输入密码">
                                <span class="verif-span">请输入6-16个字符</span>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <button name="login" type="button" class="btn btn-primary" onclick="login();">登录</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <div class="register-footer">
        <!--底部版权-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div>
                            <!--<h1 style="display: inline-block">学成网</h1>--><img src="/home/img/asset-logoIco.png" alt=""></div>
                        <div>学成网致力于普及中国最好的教育它与中国一流大学和机构合作提供在线课程。</div>
                        <div>© 2017年XTCG Inc.保留所有权利。-沪ICP备15025210号</div>
                        <input type="button" class="btn btn-primary" value="下 载" />
                    </div>
                    <div class="col-lg-5 row">
                        <dl class="col-lg-4">
                            <dt>关于学成网</dt>
                            <dd>关于</dd>
                            <dd>管理团队</dd>
                            <dd>工作机会</dd>
                            <dd>客户服务</dd>
                            <dd>帮助</dd>
                        </dl>
                        <dl class="col-lg-4">
                            <dt>新手指南</dt>
                            <dd>如何注册</dd>
                            <dd>如何选课</dd>
                            <dd>如何拿到毕业证</dd>
                            <dd>学分是什么</dd>
                            <dd>考试未通过怎么办</dd>
                        </dl>
                        <dl class="col-lg-4">
                            <dt>合作伙伴</dt>
                            <dd>合作机构</dd>
                            <dd>合作导师</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>
<!-- 页面 css js -->
<script type="text/javascript" src="/home/plugins/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="/home/plugins/bootstrap/dist/js/bootstrap.js"></script>
<script src="/home/js/page-learing-sign.js"></script>
</body>
<script type="text/javascript">
    function login() {
        $.ajax({
            type:'POST',
            url: '{{url("Home/Members/AjaxLogin")}}',
            dataType:'json',
            data:{
                _token:'{{csrf_token()}}',
                username:$('#username').val(),
                password:$('#password').val()
            },
            success:function (json) {
                if(json.status){
                    window.location = json.url;
                }else{
                    alert(json.message);
                }
            }
        });
    }
</script>