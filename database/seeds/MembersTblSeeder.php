<?php

use Illuminate\Database\Seeder;
use App\Models\Member;
use Faker\Factory;

class MembersTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Member $member)
    {
        //清空数据表
        $member -> truncate();
        //生成Faker对象
        $faker = Factory::create('zh_CN');
        //生成仿真数据
        for($i=1;$i<=30;$i++) {
            $sex = $i % 2 == 0 ? '男' : '女';
            $data = [
                "username" => $faker->username,
                'password' => bcrypt('abc123'),
                'cnname' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'remark' => '测试数据填充',
                'sex' => $sex
            ];
            Member::create($data);
        }
    }
}
