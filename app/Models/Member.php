<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
#引入命名空间，告诉laravel当前的orm模型准备做用户认证
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    //字段白名单
    protected $fillable = ['username','password','cnname','phone','sex','remark','address'];
}
