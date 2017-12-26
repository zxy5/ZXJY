<?php

namespace App\Http\Controllers\Backend;

use App\Models\Professional;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionalController extends Controller
{
    //显示专业表模板
    public function Index(){
        return view('backend.profession.index');
    }
    //使用datatables插件显示专业列表
    public function ApiList(Professional $professional,Request $request){
        $data = $professional -> with('Subject') -> get();
        //获取数据记录总数
        $count = $professional -> count();
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
//        dump(Professional::all()->toArray());
        //模板只需要用到两个字段'id','subject_name'
        $subject = Subject::all(['id','subject_name'])->toArray();
        //把数据的结果赋值到模板中
        return view('backend.profession.add') -> with([
            'subject' => $subject,
        ]);
    }
    //添加入库的程序
    public function Store(Request $request){
        //获取所有的表单字段，但是数据库只会维护白名单
        $data = $request -> all();
        if(Professional::create($data)){
            return ['status'=>true,'message'=>'添加专业成功!'];
        }else{
            return ['status'=>false,'message'=>'添加专业失败!'];
        }
    }



    //编辑模板
    public function Edit($id){
        //通过主键找到专业的对应信息，返回专业对象
        $profession = Professional::find($id);
        $subject = Subject::all(['id','subject_name'])->toArray();
        return view('backend.profession.edit')->with([
            'id' => $id, //把要修改的专业id传到模板中
            'profession' => $profession,//把找到专业赋值到模板中
            'subject' => $subject,
        ]);
    }
    //编辑专业入库
    public function Save($id, Request $request) {
        //通过主键找到专业的对应信息，返回专业对象
        $profession = Professional::find($id);
        //all()提交的数据sex,email,remark,phone
        $data = $request -> all();
        //在laravel5.1不支持一下代码
        //修改白名单的字段
        if($profession -> update($data)){
            return ['status' => true,'message'=>'修改专业成功!'];
        }else {
            return ['status' => false,'message'=>'修改学科失败!'];
        }

    }
    //删除学科，使用id
    public function Remove($id) {
        //找到要删除的学科，然后删除
        $profession = Professional::find($id);
        //调用删除方法
        if( $profession -> delete() ){
            //删除成功,返回json[status:true,message:"成功删除学科"!']
            return ['status'=>true,'message'=>'成功删除学科!'];
        }else{
            return ['status'=>false,'message'=>'删除学科失败!'];
        }
    }


}
