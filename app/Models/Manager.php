<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    //如果配置了前缀，那么以下会表示为qz_manager
    protected $table = 'managers';
    //主键
    protected $primaryKey = 'id';
    //设置manager表的字段白名单
    protected $fillable = ['username','password','mg_role_ids','mg_sex','mg_phone','mg_email','mg_remark'];

    public function Role(){
        //设置角色id跟管理员mg_role_id的1对1关系
        return $this->hasOne('App\Models\Role','id','mg_role_ids');
    }
}
