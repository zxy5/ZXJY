<?php

namespace App\Http\Controllers\Backend;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function Index(){
        return view('backend.subject.index');
    }
    //使用datatable插件显示学科列表
    public function ApiList(Subject $subject,Request $request){
        $data = $subject->get();
        //获取数据的记录总数
        $count = $subject->count();
        //把datatables的json必选项组合成为数组
        $dataTables = [
            //是否需要刷新请求次数，一般在larave中使用request->get('draw')
            "draw" => $request -> get('draw'),
            //要显示的记录数有多少条
            "recordsTotal" => $count,
            //要过滤的记录数有多少条
            "reordsFiltered" => $count,
            //要显示的数据源是什么
            "data" => $data
        ];
        //在laravel当中使用return 返回是数组，那么在浏览器中直接展现为json格式的数据
        return $dataTables;
    }
    //显示添加模板
    public function Add(){
        return view('backend.subject.add');
    }
    //添加入库程序
    public function Store(Request $request){
        //获取所有的表单字段，但是数据库只会维护白名单
        //subject_name,logo,sort
        $data = $request->all();
        if(Subject::create($data)){
            return ['status'=>true,'message'=>'添加学科成功!'];
        }else {
            return ['status'=>false,'message'=>'添加学科失败!'];
        }
    }
    //编辑模板
    public function Edit($id){
        //通过主键找到学科的对应信息，返回学科对象
        $subject = Subject::find($id);
        return view('backend.subject.edit')->with([
            'id' => $id, //把要修改的学科id传到模板中
            'subject' => $subject,//把找到学科赋值到模板中
        ]);
    }
    //编辑学科入库
    public function Save($id, Request $request) {
        //通过主键找到学科的对应信息，返回学科对象
        $subject = Subject::find($id);
        //all()提交的数据sex,email,remark,phone
        $data = $request -> all();
        //在laravel5.1不支持一下代码
        //修改白名单的字段
        if($subject -> update($data)){
            return ['status' => true,'message'=>'修改学科成功!'];
        }else {
            return ['status' => false,'message'=>'修改学科失败!'];
        }

    }
    //删除学科，使用id
    public function Remove($id) {
        //找到要删除的学科，然后删除
        $subject = Subject::find($id);
        //调用删除方法
        if( $subject -> delete() ){
            //删除成功,返回json[status:true,message:"成功删除学科"!']
            return ['status'=>true,'message'=>'成功删除学科!'];
        }else{
            return ['status'=>false,'message'=>'删除学科失败!'];
        }
    }
}
