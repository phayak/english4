<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('password_see',25)->nullable();
            $table->string('login_type',50)->nullable();
            $table->string('img_path',200)->nullable();
            $table->string('fanme',100)->nullable();
            $table->string('lname',100)->nullable();
            $table->string('nick_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('sex')->nullable();
            $table->string('tel')->nullable();
            $table->string('line')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('trial')->default(5);
            $table->integer('makeup')->default(5);
            $table->integer('status')->default(0);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
