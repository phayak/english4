<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pay_type')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('number_of_month')->default(0);
            $table->integer('coupon_id')->default(0);
            $table->integer('price_total')->nullable();
            $table->integer('status')->default(0);
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
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
        Schema::drop('order');
    }
}
