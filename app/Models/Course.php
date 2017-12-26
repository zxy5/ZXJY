<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //表名
    protected $table = 'courses';
    //主键
    protected $primarykey = 'id';
    //字段白名单
    protected $fillable = ['profession_id','course_name','price','sale_price','teacher_id',
        'course_desc','click','duration','sort','expire_at','number','content','cover'];

    //课程：专业
    //多：1（课程属于专业）
    public function Profession(){
        return $this -> belongsTo('App\Models\Professional','profession_id','id');
    }
}
