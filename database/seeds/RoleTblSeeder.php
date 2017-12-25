<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role)
    {
        //清空roles表
        $role -> truncate();
        //生成测试角色数据
        $data = ['role_name' => '超级管理员'];
        Role::create($data);
        $data = ['role_name' => 'php学科老师'];
        Role::create($data);
        $data = ['role_name' => 'java学科老师'];
        Role::create($data);
        $data = ['role_name' => '全栈学科老师'];
        Role::create($data);
    }
}
