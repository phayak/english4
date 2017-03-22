<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('login_type')->nullable();
            $table->string('fanme')->nullable();
            $table->string('lname')->nullable();
            $table->string('nick_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('sex')->nullable();
            $table->string('tel')->nullable();
            $table->integer('status')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('user_package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trial_class')->default(1);
            $table->integer('package_id')->default(0);
            $table->integer('package_status')->default(0);
            $table->date('package_date_start')->nullable();
            $table->date('package_date_end')->nullable();
        });
        Schema::create('trial_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->string('1a')->nullable();
            $table->string('1b')->nullable();
            $table->string('1c')->nullable();
            $table->string('1d')->nullable();
            $table->string('1e')->nullable();
            $table->string('1f')->nullable();
            $table->string('1instructor')->nullable();
            $table->string('2a')->nullable();
            $table->string('2b')->nullable();
            $table->string('2c')->nullable();
            $table->string('2instructor')->nullable();
            $table->string('3a')->nullable();
            $table->string('3b')->nullable();
            $table->string('3instructor')->nullable();
            $table->string('4academic')->nullable();
            $table->string('5English')->nullable();
            $table->string('6English')->nullable();
            $table->timestamps();
        });
        Schema::create('regular_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('reg1')->nullable();
            $table->integer('reg2')->nullable();
            $table->string('reg2elaborate')->nullable();
            $table->integer('reg3')->nullable();
            $table->string('reg3elaborate')->nullable();
            $table->integer('reg4')->nullable();
            $table->string('reg4elaborate')->nullable();
            $table->integer('reg5')->nullable();
            $table->string('reg5elaborate')->nullable();
            $table->timestamps();
        });
        Schema::create('user_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('teacher_time_id')->nullable();
            $table->integer('time_id')->nullable();
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('status')->default(0); // 0 จอง 1 เรียน 2 ยกเลิก
            $table->timestamps();
        });
        // --> teacher booking
        Schema::create('teacher_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->nullable();
            $table->date('date_teacher')->nullable();
            $table->time('start_time')->nullable();
            $table->timestamp('published_at');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('times', function (Blueprint $table) {
            $table->increments('id');
            $table->time('time_th');
            $table->time('time_ph');
            $table->timestamps();
        });
        Schema::create('teacher_booking_time', function (Blueprint $table) {
            $table->integer('teacher_booking_id')->unsigned()->index();
            $table->foreign('teacher_booking_id')->references('id')->on('teacher_bookings')->onDelete('cascade');

            $table->integer('time_id')->unsigned()->index();
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
            $table->timestamps();
        });

        // --> end teacher booking

        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit')->nullable();
            $table->integer('use_unit')->nullable();
            $table->string('code',30)->nullable();
            $table->string('name',100)->nullable();
            $table->integer('discount')->nullable();
            $table->date('coupon_date_start')->nullable();
            $table->date('coupon_date_end')->nullable();
            $table->timestamps();
        });
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('ip',30)->nullable();
            $table->string('name',50)->nullable();
            $table->string('email',50)->nullable();
            $table->string('subject',100)->nullable();
            $table->string('msg',255)->nullable();
            $table->integer('view')->nullable();
            $table->timestamps();
        });
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_teacher_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
        });
        // Schema::create('class_teacher', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('class_id')->nullable();
        //     $table->string('name',50)->nullable();
        //     $table->string('email',50)->nullable();
        //     $table->string('subject',100)->nullable();
        //     $table->string('msg',255)->nullable();
        //     $table->integer('view')->nullable();
        //     $table->timestamps();
        // });
        Schema::create('user_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable();
            $table->string('job',100)->nullable();
            $table->string('img',255)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pay_type',50)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('number_of_month')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->integer('price_total')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::create('package', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',10)->nullable();
            $table->string('name',100)->nullable();
            $table->string('img',200)->nullable();
            $table->integer('price')->nullable();
            $table->string('recom',100)->nullable();
            $table->string('description',255)->nullable();
            $table->integer('class_per_day')->default(1);
            $table->integer('class_of_week_start')->default(0);
            $table->integer('class_of_week_end')->default(0);
            $table->integer('lv')->default(1);
            $table->integer('index_')->default(1);
            $table->integer('style_css')->default(1);
            $table->integer('limit_day')->default(1);
            $table->timestamps();
        });
        Schema::create('package_promotion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->nullable();
            $table->string('name',100)->nullable();
            $table->integer('mumber_of_month')->nullable();
            $table->integer('discount')->default(5);
            $table->integer('lv')->default(1);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        Schema::create('payment_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_bank',50)->nullable();
            $table->string('number_bank',20)->nullable();
            $table->string('name_book',20)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->nullable();
            $table->string('pament_type_id',100)->nullable();
            $table->integer('mumber_of_month')->nullable();
            $table->integer('total')->default(0);
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('file_slip',200)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->text('body')->nullable();
            $table->integer('reply')->default(0);
            $table->timestamp('published_at');
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::drop('users');
        Schema::drop('user_package');
        Schema::drop('trial_classes');
        Schema::drop('regular_classes');
        Schema::drop('user_bookings');
        Schema::drop('teacher_bookings');
        Schema::drop('teacher_time_book');
        Schema::drop('coupon');
        Schema::drop('contact');
        Schema::drop('comment');
        Schema::drop('user_review');
        Schema::drop('order');
        Schema::drop('package');
        Schema::drop('package_promotion');
        Schema::drop('payment_type');
        Schema::drop('payment');
        Schema::drop('articles');
        Schema::drop('tags');
        Schema::drop('article_tag');
    }
}
