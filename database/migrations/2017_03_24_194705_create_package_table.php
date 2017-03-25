<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',20)->nullable();
            $table->string('name',50)->nullable();
            $table->string('img',200)->nullable();
            $table->integer('price')->nullable();
            $table->string('recom',20)->nullable();
            $table->string('description',200)->nullable();
            $table->text('description2')->nullable();
            $table->string('description3',200)->nullable();
            $table->integer('class_per_day')->default(1);
            $table->integer('class_of_week_start')->default(0);
            $table->integer('class_of_week_end')->default(0);
            $table->integer('lv')->default(1);
            $table->integer('index_')->default(1);
            $table->integer('style_css')->default(1);
            $table->integer('limit_day')->default(1);
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
        Schema::drop('package');
    }
}
