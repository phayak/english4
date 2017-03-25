<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trial_class')->default(1);
            $table->integer('package_id')->default(0);
            $table->integer('package_status')->default(0);
            $table->date('package_date_start')->nullable();
            $table->date('package_date_end')->nullable();
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
        Schema::drop('user_package');
    }
}
