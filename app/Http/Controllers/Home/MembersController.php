<?php

namespace App\Http\Controllers\Home;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入用户认证
use Illuminate\Support\Facades\Auth;
//引入Session类
use Illuminate\Support\Facades\Session;

class MembersController extends Controller
{
   public function Login(){
       return view('home.members.login');
   }
    //用于被datarables请求的ajax方法
    public function AjaxLogin( Request $request )
    {
        //货物用户名和密码
        $info = $request -> only(['username','password']);
        if(Auth::guard('memberAuth')->attempt(['username'=>$info['username'],'password'=>$info['password']])){
            //标注当前登录成功
            $request -> session() -> put('login','okay');
            //登录成功跳转的地址
            return ['status'=>true,'url'=>'/Home/Welcome'];
        }else{
            //登录失败
            return ['status'=>false,'message'=>'用户名或密码错误'];
        }
    }
}
