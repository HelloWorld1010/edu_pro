<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->id()->autoIncrement();  //主键id
            $table->string('username',180)->notNull()->unique();    //用户名，唯一
            $table->string('password',255)->notNull();  //密码varchar(255),不能为空
            $table->enum('gender',[1,2,3])->notNull()->default(1)->comment('性别：1：男，2：女，3：保密');   //性别
            $table->string('mobile',11);    //手机号
            $table->string('email',50);     //邮箱
            $table->tinyInteger('role_id');     //角色表中主键id
            $table->string('nickname',255);     //昵称
            $table->rememberToken();    //实现记住登录状态字段，用户存储token
            $table->enum('status',[1,2])->notNull()->default(1);    //账号状态 1：禁用， 2：启用
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
        Schema::dropIfExists('manager');
    }
}
