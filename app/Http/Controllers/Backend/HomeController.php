<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
#引入用户认证的命名空间
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //系统欢迎页
    public function Index(){
        return view('backend.home.index');
    }
    //系统欢迎页
    public function Welcome(){
        return view('backend.home.welcome');
    }
    public function Logout(){
        //用户认证的退出登录方法
        Auth::guard('managerAuth')->logout();
        //跳转到路由别名login
        return redirect()->route('login');
    }
}
