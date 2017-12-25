<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;

class MembersController extends Controller
{
    public function Index(){
        return view('backend.members.index');
    }
    public function ApiList(Member $member,Request $request){
        //获取所有的会员数据，使用关联获取，with方法
        //with方法表示要管理哪一个属性
        $data = $member  -> get();
        //获取数据的记录总数
        $count = $member -> count();
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
    //删除会员，使用mg_id
    public function Remove($id) {
        //找到要删除的会员，然后删除
        $member = Member::find($id);
        //调用删除方法
        if( $member -> delete() ){
            //删除成功,返回json[status:true,message:"成功删除会员"!']
            return ['status'=>true,'message'=>'成功删除会员!'];
        }else{
            return ['status'=>false,'message'=>'删除会员失败!'];
        }
    }
    //编辑模板
    public function Edit($id){
        //通过主键找到会员的对应信息，返回会员对象
        $member = Member::find($id);
        return view('backend.members.edit')->with([
            'id' => $id, //把要修改的会员id传到模板中
            'member' => $member,//把找到会员赋值到模板中
        ]);
    }

    //编辑会员入库
    public function Save($id, Request $request) {
        //通过主键找到会员的对应信息，返回会员对象
        $member = Member::find($id);
        //all()提交的数据mg_sex,mg_email,mg_remark,mg_phone
        $data = $request -> all();
        //在laravel5.1不支持一下代码
        //修改白名单的字段
        if($member -> update($data)){
            return ['status' => true,'message'=>'修改会员成功!'];
        }else {
            return ['status' => false,'message'=>'修改会员失败!'];
        }

    }
}
