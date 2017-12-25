<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Manager;

class ManagerTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Manager $manager)
    {
        //获取Facker的实例，把数据生成指向中国大陆
        $faker = Factory::create('zh_CN');
        //每一次生成数据之前，我们都把manager表的数据清空一次
        $manager -> truncate();
        //生成30个管理员的仿真测试数据
        for($i=1;$i<=30;$i++) {
            $sex = $i % 2 ==0 ? "男" : "女";
            $data = [
              'username' => $faker -> username,
                'password' => bcrypt('123456'),
                'mg_role_ids' => mt_rand(1,4),#随机生成id=1,id=2,id=3,id=4
                'mg_sex' => $sex,
                'mg_phone' => $faker -> phoneNumber,
                'mg_email' => $faker -> email,
                'mg_remark' => '都是测试数据填充的'
            ];
            Manager::create( $data );
        }
    }
}
