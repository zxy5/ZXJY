<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploaderController extends Controller
{
    public function Upload(Request $request){
        //获取webuploader对象
        $file = $request -> uploader;
        //获取后缀名称
        $ext = "." . $file -> getClientOriginalExtension();
        //生成唯一文件名
        $filename = date('YmdHis').mt_rand(1999,99999)."$ext";
        $res = $file -> storeAs('',$filename,'edu');
        if( $res ){
            return ['status'=>true,'message'=>'上传成功!','file'=>$res];
        }else{
            return ['status'=>false,'message'=>'上传失败!'];
        }
    }
}
