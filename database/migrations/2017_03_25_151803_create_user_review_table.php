<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_date_start',50)->nullable();
            $table->string('job',100)->nullable();
            $table->string('img',255)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('sort')->default(1);
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
        Schema::drop('user_review');
    }
}
