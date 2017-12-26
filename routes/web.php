<?php

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


//定义前台的路由群组
Route::group(['prefix'=>'/Home'],function(){
    Route::get('/Index',"Home\IndexController@Index");
});

//定义后台的路由群组
Route::group(['prefix'=>'/System'],function(){
    Route::post('/Login',"Backend\LoginController@Login");
    //把System/Index路由地址加上一个路由别名叫login
    Route::get('/Index',"Backend\LoginController@Index")->name('login');
});
//定义后台的系统首页和欢迎页路由,并且接受Auth的managerAuth用户认证模式验证
Route::group(['prefix'=>'/System/Home','middleware'=>['auth:managerAuth']],function(){
    //系统首页
    Route::get('/Index',"Backend\HomeController@Index");
    //系统欢迎页面
    Route::get('/Welcome',"Backend\HomeController@Welcome");
    //登出后台登录
    Route::get('/Logout',"Backend\HomeController@Logout");
});
//定义后台的管理员模块路由
Route::group(['prefix'=>'/System/Manager','middleware'=>['auth:managerAuth']],function(){
    //管理员列表
    Route::get('/Index',"Backend\ManagerController@Index");
    //管理员用于被datatables插件的ajax调用的数据
    Route::post('/ApiList',"Backend\ManagerController@ApiList");
    //管理员的添加界面
    Route::get('/Add',"Backend\ManagerController@Add");
    //管理员入库(添加)的程序路由
    Route::post('/Store',"Backend\ManagerController@Store");
    //管理员入库(删除)的程序路由,根据mg_id来删除管理员
    Route::post('/Remove/{mg_id}',"Backend\ManagerController@Remove");
    //查询要修改的管员的程序路由,根据mg_id来找到要修改的管理员记录,编辑页面路由
    Route::get('/Edit/{mg_id}',"Backend\ManagerController@Edit");
    //管理员入库(保存修改)的程序路由,根据mg_id来进行修改
    Route::post('/Save/{mg_id}',"Backend\ManagerController@Save");
});


//定义会员的前台路由
Route::group(['prefix'=>'/Home/Members'],function(){
    //前台登录页面
    Route::get('/Login','Home\MembersController@Login');
    //会员的登录ajax程序
    Route::post('/AjaxLogin','Home\MembersController@AjaxLogin');
    //前台的注册页
    Route::get('/Register','Home\MembersController@Register');
    //会员的登录ajax注册
    Route::post('/AjaxRegister','Home\MembersController@AjaxRegister');
    Route::get('/Welcome','Home\MembersController@Welcome');
});
//定义会员的后台路由
Route::group(['prefix'=>'/System/Members','middleware'=>['auth:managerAuth']],function(){
    //会员数据展示
    Route::get('/Index','Backend\MembersController@Index');
    //会员数据datatables接口
    Route::post('/ApiList','Backend\MembersController@ApiList');
    //删除会员
    Route::post('/Remove/{member_id}','Backend\MembersController@Remove');
    //会员编辑页
    Route::get('/Edit/{member_id}','Backend\MembersController@Edit');
    //会员编辑入库
    Route::post('/Save/{member_id}','Backend\MembersController@Save');

});

//定义后台的学科模块路由
Route::group(['prefix'=>'/System/Subject','middleware'=>['auth:managerAuth']],function (){
    //学科列表
    Route::get('/Index',"Backend\SubjectController@Index");
    //学科用于被databases插件的ajax调用数据
    Route::post('/ApiList',"Backend\SubjectController@ApiList");
    //学科的添加界面
    Route::get('/Add',"Backend\SubjectController@Add");
    //学科入库的程序路由
    Route::post('/Store',"Backend\SubjectController@Store");
    //学科入库（删除）的程序路由,根据mg_id来删除学科
    Route::post('/Remove/{id}',"Backend\SubjectController@Remove");
    //查询要修改的学科的程序路由,根据id来找到要修改的学科记录,编辑页面路由
    Route::get('/Edit/{id}',"Backend\SubjectController@Edit");
    //学科入库(保存修改)的程序路由,根据id 来进行修改
    Route::post('/Save/{id}',"Backend\SubjectController@Save");

});
//上传的控制路由
Route::group(['prefix'=>'/System/Uploader','middleware'=>['auth:managerAuth']],function (){
    //上传一般都是post
    Route::post('/Upload',"Backend\UploaderController@Upload");
});
//定义后台的专业模块路由
Route::group(['prefix'=>'/System/Professional','middleware'=>['auth:managerAuth']],function(){
    //专业列表
    Route::get('/Index',"Backend\ProfessionalController@Index");
    //专业用于被datatables插件的ajax调用的数据
    Route::post('/ApiList',"Backend\ProfessionalController@ApiList");
    //专业的添加界面
    Route::get('/Add',"Backend\ProfessionalController@Add");
    //专业入库(添加)的程序路由
    Route::post('/Store',"Backend\ProfessionalController@Store");
    //专业入库(删除)的程序路由,根据id来删除专业
    Route::post('/Remove/{id}',"Backend\ProfessionalController@Remove");
    //查询要修改的专业的程序路由,根据id来找到要修改的专业记录,编辑页面路由
    Route::get('/Edit/{id}',"Backend\ProfessionalController@Edit");
    //专业入库(保存修改)的程序路由,根据id来进行修改
    Route::post('/Save/{id}',"Backend\ProfessionalController@Save");
});

//定义后台的课程模块路由
Route::group(['prefix'=>'/System/Course'],function(){
    //课程列表
    Route::get('/Index',"Backend\CourseController@Index");
    //课程用于被datatables插件的ajax调用的数据
    Route::post('/ApiList',"Backend\CourseController@ApiList");
    //课程的添加界面
    Route::get('/Add',"Backend\CourseController@Add");
    //课程入库(添加)的程序路由
    Route::post('/Store',"Backend\CourseController@Store");
    //课程入库(删除)的程序路由,根据id来删除课程
    Route::post('/Remove/{id}',"Backend\CourseController@Remove");
    //查询要修改的课程的程序路由,根据id来找到要修改的课程记录,编辑页面路由
    Route::get('/Edit/{id}',"Backend\CourseController@Edit");
    //课程入库(保存修改)的程序路由,根据id来进行修改
    Route::post('/Save/{id}',"Backend\CourseController@Save");
});


//定义后台的课时模块路由
Route::group(['prefix'=>'/System/Lesson'],function(){
    Route::get('/Add',"Backend\LessonController@Add");

});



