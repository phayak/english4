<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegularClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regular_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_booking_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('reg1')->nullable();
            $table->integer('reg2')->nullable();
            $table->string('reg2elaborate')->nullable();
            $table->string('reg3')->nullable();
            $table->string('reg3elaborate')->nullable();
            $table->string('reg4')->nullable();
            $table->string('reg4elaborate')->nullable();
            $table->string('reg5')->nullable();
            $table->string('reg5elaborate')->nullable();
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
        Schema::drop('regular_classes');
    }
}
