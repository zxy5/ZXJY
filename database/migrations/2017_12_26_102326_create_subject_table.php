<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->engine = 'myisam';
            $table->smallIncrements('id')->comment('主键ID');
            $table->string('subject_name',50)->unique()->comment('学科名称');
            $table->string('logo',200)->nullable()->comment('logo');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->timestamps();
            $table->softDeletes()->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
