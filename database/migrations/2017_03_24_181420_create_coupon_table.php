<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit')->default(0);
            $table->integer('use_unit')->default(0);
            $table->string('code',50)->nullable();
            $table->string('name')->nullable();
            $table->integer('discount')->nullable();
            $table->date('coupon_date_start')->nullable();
            $table->date('coupon_date_end')->nullable();
            $table->integer('status')->default(0);
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
        Schema::drop('coupon');
    }
}
