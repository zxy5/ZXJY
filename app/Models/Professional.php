<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    //表名
    protected $table = 'professions';
    //主键
    protected $primaryKey = 'id';
    //字段白名单
    protected $fillable = ['subject_id','profession_name','price','sale_price','expire_at',
        'number','teacher_ids','content','cover','banner','profession_desc','click','duration','is_recommend',
        'is_best','is_hot','sort'];
    //专业：学科
    //多:1(专业属于学科，belongsTo)
    public function Subject(){
        //关联的模型,主表的关联id，关联的外键
        return $this -> belongsTo('\App\Models\Subject','subject_id','id');
    }
}
