<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table -> engine = 'myisam';
            $table->increments('id')->comment('主键id');
            $table->string('username',60)->comment('会员账号');
            $table->string('password',64)->comment('会员密码');
            $table->string('cnname',20)->nullable()->comment('会员中文名');
            $table->string('phone',11)->nullable()->comment('手机号码');
            $table->enum('sex',['男','女'])->default('男')->comment('性别');
            $table->text('remark')->nullable()->comment('简介,备注信息');
            $table->string('address',200)->nullable()->comment('联系地址');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
