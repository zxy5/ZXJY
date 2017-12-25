<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    //设置角色的白名单
    protected $fillable = ['role_name','role_auth_ids','role_auth_ac'];
}
