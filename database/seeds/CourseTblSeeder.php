<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Course $course)
    {
        // 清空表数据
        $course->truncate();
        $course->create(['id'=>1,'profession_id'=>1,'course_name'=>'环境安装和基础语法','price'=>199,'sale_price'=>100,'expire_at'=>183,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);
        $course->create(['id'=>2,'profession_id'=>1,'course_name'=>'MySQL基础入门','price'=>399,'sale_price'=>200,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);

        $course->create(['id'=>3,'profession_id'=>2,'course_name'=>'MVC模式和框架','price'=>699,'sale_price'=>300,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);
        $course->create(['id'=>4,'profession_id'=>2,'course_name'=>'ThinkPHP','price'=>999,'sale_price'=>400,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);
        $course->create(['id'=>5,'profession_id'=>2,'course_name'=>'电商项目','price'=>999,'sale_price'=>400,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);

        $course->create(['id'=>6,'profession_id'=>3,'course_name'=>'Linux','price'=>399,'sale_price'=>300,'expire_at'=>183,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
        $course->create(['id'=>7,'profession_id'=>3,'course_name'=>'redis','price'=>599,'sale_price'=>400,'expire_at'=>365,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
        $course->create(['id'=>8,'profession_id'=>3,'course_name'=>'Laravel框架','price'=>899,'sale_price'=>500,'expire_at'=>365,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
        $course->create(['id'=>9,'profession_id'=>3,'course_name'=>'负载均衡','price'=>1199,'sale_price'=>600,'expire_at'=>365,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
    }
}
