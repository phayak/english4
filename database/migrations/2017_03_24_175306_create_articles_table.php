<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('subject')->nullable();
            $table->string('title')->nullable();
            $table->longText('body')->nullable();
            $table->integer('advertorial')->nullable();
            $table->string('img')->nullable();
            $table->string('img_highlight')->nullable();
            $table->string('img_facebook')->nullable();
            $table->integer('status')->default(1);
            $table->integer('reply')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('articles');
    }
}
