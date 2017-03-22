<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call('UserSeeder');
        $this->call('TimeSeeder');
    }
}
class UserSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();

        $user = array(
            array('id'=>'','name'=>'Super Admin','email' => 'admin@admin.com','password' => bcrypt('admin1234'),'status'=> 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'','name'=>'Teacher Test','email' => 'teacher@admin.com','password' => bcrypt('admin1234'),'status'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'','name'=>'User test','email' => 'user@admin.com','password' => bcrypt('admin1234'),'status'=> 0,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('users')->insert($user);
    }
}
class TimeSeeder extends Seeder {
    public function run()
    {
        DB::table('times')->delete();

        $time = array(
            array('id'=>'1','time_th'=>'00:00:00','time_ph' => '01:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'2','time_th'=>'00:30:00','time_ph' => '01:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'3','time_th'=>'01:00:00','time_ph' => '02:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'4','time_th'=>'01:30:00','time_ph' => '02:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'5','time_th'=>'02:00:00','time_ph' => '02:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'6','time_th'=>'02:30:00','time_ph' => '03:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'7','time_th'=>'03:00:00','time_ph' => '03:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'8','time_th'=>'03:30:00','time_ph' => '04:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'9','time_th'=>'04:00:00','time_ph' => '04:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'10','time_th'=>'04:30:00','time_ph' => '05:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'11','time_th'=>'05:00:00','time_ph' => '05:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'12','time_th'=>'05:30:00','time_ph' => '06:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'13','time_th'=>'06:00:00','time_ph' => '07:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'14','time_th'=>'06:30:00','time_ph' => '07:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'15','time_th'=>'07:00:00','time_ph' => '08:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'16','time_th'=>'07:30:00','time_ph' => '08:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'17','time_th'=>'08:00:00','time_ph' => '09:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'18','time_th'=>'08:30:00','time_ph' => '09:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'19','time_th'=>'09:00:00','time_ph' => '10:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'20','time_th'=>'09:30:00','time_ph' => '10:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'21','time_th'=>'10:00:00','time_ph' => '11:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'22','time_th'=>'10:30:00','time_ph' => '11:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'23','time_th'=>'11:00:00','time_ph' => '12:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'24','time_th'=>'11:30:00','time_ph' => '00:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'25','time_th'=>'12:00:00','time_ph' => '01:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'26','time_th'=>'12:30:00','time_ph' => '01:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'27','time_th'=>'13:00:00','time_ph' => '02:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'28','time_th'=>'13:30:00','time_ph' => '02:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'29','time_th'=>'14:00:00','time_ph' => '03:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'30','time_th'=>'14:30:00','time_ph' => '03:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'31','time_th'=>'15:00:00','time_ph' => '04:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'32','time_th'=>'15:30:00','time_ph' => '04:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'33','time_th'=>'16:00:00','time_ph' => '05:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'34','time_th'=>'16:30:00','time_ph' => '05:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'35','time_th'=>'17:00:00','time_ph' => '06:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'36','time_th'=>'17:30:00','time_ph' => '06:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'37','time_th'=>'18:00:00','time_ph' => '07:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'38','time_th'=>'18:30:00','time_ph' => '07:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'39','time_th'=>'19:00:00','time_ph' => '08:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'40','time_th'=>'19:30:00','time_ph' => '08:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'41','time_th'=>'20:00:00','time_ph' => '09:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'42','time_th'=>'20:30:00','time_ph' => '09:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'43','time_th'=>'21:00:00','time_ph' => '10:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'44','time_th'=>'21:30:00','time_ph' => '10:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'45','time_th'=>'22:00:00','time_ph' => '11:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'46','time_th'=>'22:30:00','time_ph' => '11:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'47','time_th'=>'23:00:00','time_ph' => '12:00:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id'=>'48','time_th'=>'23:30:00','time_ph' => '00:30:00','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('times')->insert($time);
    }
}
