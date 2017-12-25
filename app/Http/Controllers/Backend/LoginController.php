<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
#引入用户认证的命名空间
use Illuminate\Support\Facades\Auth;
#引入表单验证类Validater
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function Index(){
        return view('backend.login');
    }
    //管理员登陆的方法
    public function Login(Request $request) {
        //获取客户端提交表单信息
        $info = $request -> only(['username','pwd','vcode']);
        /*
         * 验证规则如下:
         * 1)用户名，密码，验证码必填
         * 2)密码长度6-16位
         * 3)验证码正确验证
         * */
        $rules = [
            'username' => 'required',
            'pwd'    => 'required|between:6,16',
            'vcode'   => 'required|captcha',
        ];
        //如果验证失败，那么就定义如下错误提示
//        $message = [
//            "username.required" => '管理员账号必须填写',
//            "pwd.required" => '管理员密码必须填写',
//            "pwd.between" => '管理员密码必须在6-16位之间',
//            "vcode.required" => '验证码必须填写',
//            "vcode.captcha" => '验证码不正确',
//        ];
        /*
         * 添加表单验证规则，使用Validator类
         * Validator::make方法用于产生验证规则,格式如下：
         * Validator::make(要验证的数据，验证的规则，验证错误的提示信息)
         * */
        $Validator = Validator::make($info,$rules);
        if($Validator -> fails()){
            //把用户的提交信息一次性存储到session当中
            $request -> flash();
            //返回登录页面,待着错误验证信息一起返回
            return redirect() -> back() -> withErrors($Validator,'LoginErrors');
//            return "您未通过验证";
        }else {
            /*我们在用户认证中，要校验username是否正确,如果username正确
            我们还要校验用户密码的bcrypt加密是否正确，如果一切都正确，
            我们需要把正确的用户信息放到session中，因此编写如下代码:*/
            if( Auth::guard('managerAuth')->attempt(['username'=>$info['username'],
                'password'=>$info['pwd']])){
//               return "跳转到后台系统的欢迎界面";
//              return redirect() -> to('System/Home/Index');
                return redirect('System/Home/Index');
            }else{
                $request -> flash();
                return redirect() -> back() ->
                withErrors("用户名管理账号或者密码不正确",'LoginErrors');
            }
        }

    }
}
