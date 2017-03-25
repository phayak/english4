<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrialClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trial_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_booking_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->string('a1')->nullable();
            $table->string('b1')->nullable();
            $table->string('c1')->nullable();
            $table->string('d1')->nullable();
            $table->string('e1')->nullable();
            $table->string('f1')->nullable();
            $table->string('instructor1')->nullable();
            $table->string('a2')->nullable();
            $table->string('b2')->nullable();
            $table->string('c2')->nullable();
            $table->string('instructor2')->nullable();
            $table->string('a3')->nullable();
            $table->string('b3')->nullable();
            $table->string('instructor3')->nullable();
            $table->string('academic4')->nullable();
            $table->string('english5')->nullable();
            $table->string('english6')->nullable();
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
        Schema::drop('trial_classes');
    }
}
