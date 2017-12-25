<?php

namespace App\Http\Controllers\Backend;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function Index(){
        return view('backend.manager.index');
    }
    //用于被datarables请求的ajax方法
    public function ApiList( Manager $manager,Request $request ) {
        //获取所有的管理员数据，使用关联获取，with方法表示要管理哪一个属性
        $data = $manager -> with('Role') -> get();
        $count = $manager -> count();
        //把datatables的json必选项组合成为数组
        //是否需要刷新请求次数，一般在laravel中使用request->get('draw')

        $dataTables = [
            //是否需要刷新请求次数，一般在laravel中使用request->get('draw')
            "draw" => $request -> get('draw'),
            //要显示的记录数有多少条
            'recordsTotal' => $count,
            //要过滤的记录数
            'recordsFiltered' => $count,
            "data" => $data
        ];

        //在laravel当中使用return返回的是数组，那么在浏览器中直接展现为json格式的数据
        return $dataTables;
//        dump($data);
//        dump($count);
    }
    //删除管理员，使用id
    public function Remove($id) {
        //找到要删除的管理员，然后删除
        $manager = Manager::find($id);
        //调用删除方法
        if( $manager -> delete() ){
            //删除成功,返回json[status:true,message:"成功删除管理员"!']
            return ['status'=>true,'message'=>'成功删除管理员!'];
        }else{
            return ['status'=>false,'message'=>'删除管理员失败!'];
        }
    }
    public function Add(){
        return view('backend.manager.add');
    }
    public function Store(Request $request) {
        //获取所以表单字段,但是数据库智慧维护白名单
        $data = $request -> all();
        //加上bcrypt加密
        $data['password'] = bcrypt($data['password']);
        if(Manager::create($data)){
            return ['status'=>true,'message'=>'添加管理员成功!'];
        }else{
            return ['status'=>false,'message'=>'添加管理员失败!'];
        }
    }
    //编辑模板
    public function Edit($id){
        //通过主键找到管理员的对应信息,返回管理员对象
       $manager = Manager::find($id);
        return view('backend.manager.edit')->with([
            'id' => $id,
            'manager' => $manager,
        ]);
    }
    //修改后的数据入库
    public function Save($id,Request $request){
        //通过主键找到管理员的对应信息,返回管理员对象
        $manager = Manager::find($id);
        //all()提交的数据[mg_sex,mg_email,mg_remark,mg_phone]
        $data = $request -> all();
        //在laravel5.4里面提交了一个修改的白名单方法update
        //修改白名单
        if($manager -> update($data)){
            return ['status'=>true,'message'=>'编辑管理员成功!'];
        }else{
            return ['status'=>false,'message'=>'编辑管理员失败!'];
        }
    }
}
