<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        create table roles
        Schema::create('roles', function (Blueprint $table) {
            $table->engine='myisam';
            $table->increments('id')->comment('主键id');
            $table->string('role_name',60)->comment('角色名称');
            $table->string('role_auth_ids',128)->nullable()->comment('权限ids,1,2,5');
            $table->text('role_auth_ac')->nullable()->comment('控制器-操作');
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
        Schema::dropIfExists('roles');
    }
}
