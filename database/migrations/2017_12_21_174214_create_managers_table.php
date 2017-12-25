<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->engine = 'myisam';
            $table->increments('id')->comment('主键');
            $table->string('username',64)->comment('管理员名称');
            $table->char('password',64)->comment('管理员密码');
            $table->string('mg_role_ids',200)->nullable() ->comment('rbac角色');
            $table->enum('mg_sex',['男','女'])->default('男')->comment('性别');
            $table->char('mg_phone',11)->nullable() ->comment('手机号码');
            $table->string('mg_email',64)->nullable() ->comment('邮箱');
            $table->text('mg_remartk')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managers');
    }
}
