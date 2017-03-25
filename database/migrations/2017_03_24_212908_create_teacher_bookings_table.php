<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->nullable();
            $table->date('date_teacher')->nullable();
            $table->time('start_time')->nullable();
            $table->timestamp('pubished_at')->nullable();
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
        Schema::drop('teacher_bookings');
    }
}
