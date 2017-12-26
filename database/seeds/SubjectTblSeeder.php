<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;
class SubjectTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Subject $subject)
    {
        $subject->truncate();
        $subject->create(['id'=>1,'subject_name'=>'PHP']);
        $subject->create(['id'=>2,'subject_name'=>'前端']);
        $subject->create(['id'=>3,'subject_name'=>'Java']);
        $subject->create(['id'=>4,'subject_name'=>'UI']);
        $subject->create(['id'=>5,'subject_name'=>'大数据']);
    }
}
