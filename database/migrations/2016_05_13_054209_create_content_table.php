<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name')->nullable();
             $table->string('status')->default(0);
             $table->softDeletes();
             $table->timestamps();
        });
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('subject',255)->nullable();
            $table->string('title',255)->nullable();
            $table->string('description',160)->nullable();
            $table->integer('advertorial')->nullable();
            $table->string('tag')->nullable();
            $table->integer('status')->nullable();
            $table->string('img_highlight',255)->nullable();
            $table->string('img_facebook',255)->nullable();
            $table->text('content_text')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('categories');
        Schema::drop('contents');
    }
}
