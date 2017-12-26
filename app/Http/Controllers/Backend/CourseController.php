<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Professional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //显示课程表模板
    public function Index(){
        return view('backend.course.index');
    }
    //使用datatables插件显示课程列表
    public function ApiList(Course $course,Request $request){
        $data = $course ->with('Profession') -> get();
        //获取数据记录总数
        $count = $course -> count();
        //把datatables的json必选项组合成为数组
        $dataTables = [
            //是否需要刷新请求次数,一般在laravel中使用request->get(‘draw’)
            "draw"=>$request->get('draw'),
            //要显示的记录数有多少条
            "recordsTotal" => $count,
            //要过滤的记录数有多少条
            "recordsFiltered" => $count,
            //要显示的数据源是什么
            "data" => $data
        ];
        return $dataTables;
    }
    //显示添加模板，把学科信息显示到模板中
    public function Add(){
//        dump(Course::all()->toArray());
        //模板只需要用到两个字段'id','subject_name'
        $profession = Professional::all(['id','profession_name'])->toArray();
        //把数据的结果赋值到模板中
        return view('backend.course.add') -> with([
            'profession' => $profession,
        ]);
    }
    //添加入库的程序
    public function Store(Request $request){
        //获取所有的表单字段，但是数据库只会维护白名单
        $data = $request -> all();
        if(Course::create($data)){
            return ['status'=>true,'message'=>'添加课程成功!'];
        }else{
            return ['status'=>false,'message'=>'添加课程失败!'];
        }
    }



    //编辑模板
    public function Edit($id){
        //通过主键找到课程的对应信息，返回课程对象
        $course = Course::find($id);
        $profession = Professional::all(['id','profession_name'])->toArray();
        return view('backend.course.edit')->with([
            'id' => $id, //把要修改的课程id传到模板中
            'course' => $course,//把找到课程赋值到模板中
            'profession' => $profession,
        ]);
    }
    //编辑课程入库
    public function Save($id, Request $request) {
        //通过主键找到课程的对应信息，返回课程对象
        $profession = Course::find($id);
        //all()提交的数据sex,email,remark,phone
        $data = $request -> all();
        //在laravel5.1不支持一下代码
        //修改白名单的字段
        if($profession -> update($data)){
            return ['status' => true,'message'=>'修改课程成功!'];
        }else {
            return ['status' => false,'message'=>'修改学科失败!'];
        }

    }
    //删除学科，使用id
    public function Remove($id) {
        //找到要删除的学科，然后删除
        $profession = Course::find($id);
        //调用删除方法
        if( $profession -> delete() ){
            //删除成功,返回json[status:true,message:"成功删除学科"!']
            return ['status'=>true,'message'=>'成功删除学科!'];
        }else{
            return ['status'=>false,'message'=>'删除学科失败!'];
        }
    }

}
