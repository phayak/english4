<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\UserBooking;
use Carbon\Carbon;
use App\Time;
use DB;
use Input;
use App\Package;
class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function change(Request $request)
    {
        $datepic = $request->all();

        $var = $datepic['datepicker'];
        $datechange = str_replace('/', '-', $var);
        $date = date('Y-m-d', strtotime($datechange));

        $teacher_bookings = DB::table('teacher_bookings')->where('date_teacher',$date)->get();

        return $teacher_bookings;
    }
    public function store(Request $request)
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        $data['teacher_id'] = $request->teacher_id;
        $data['date_teacher'] = $request->date_teacher;
        $data['time_id'] = $request->time_id;

        $teacher_booking = DB::table('teacher_bookings')->where('teacher_id',$data['teacher_id'])->where('date_teacher',$data['date_teacher'])->first();

        // เช็ค ว่าเป็น trial หรือ nomal
        $userBookingCount = DB::table('user_bookings')->where('user_id')->count();
        if($userBookingCount >= 1){
            $classtype = 2;
        }
        else {
            $classtype = 1;
        }

        $random = uniqid();

        // cheack start_time and end_time
        $start_time = Carbon::parse($time->time_th)->format('H:i:s');
        $end_time   = Carbon::parse($time->time_th)->addMinute(30)->format('H:i:s');

        $datetime_start = Carbon::parse($teacher_booking->date_teacher.$start_time)->format('Y-m-d H:i:s');
        $datetime_end = Carbon::parse($teacher_booking->date_teacher.$end_time)->format('Y-m-d H:i:s');
       

        // เปลี่ยน status_booking
        DB::table('teacher_booking_time')->where('teacher_booking_id',$teacher_booking->id)->where('time_id',$request->time_id)
            ->update(['status_booking' => 1]);

        $UserBooking = new UserBooking;
        $UserBooking->teacher_id = $data['teacher_id'];
        $UserBooking->user_id = $user->id;
        $UserBooking->teacher_time_id = $request->time_id;
        $UserBooking->room_video = $random;
        $UserBooking->time_id = $request->time_id;
        $UserBooking->datetime_start = $datetime_start;
        $UserBooking->datetime_end = $datetime_end;
        $UserBooking->date = $teacher_booking->date_teacher;
        $UserBooking->start_time = $start_time;
        $UserBooking->end_time = $end_time;
        $UserBooking->class_type = $classtype;
        $UserBooking->save();

        return $request->time_id;

        //flash('ท่าน จองห้องเรียนร้อยแล้ว', 'success');
        //return redirect('profile/book/class')->with('status', 'สำเร็จ');
    }
    public function bookingmakeup(Request $request)
    {
        $user = Auth::User();
        $data['teacher_id'] = $request->teacher_id;
        $data['date_teacher'] = $_POST["date_teacher"];
        $data['time_id'] = $request->time_id;

        $time = Time::where('id',$request->time_id)->first();
        // เช็ค วันที่ 
        $today_selectdate = Carbon::parse($data['date_teacher'])->toDateString();

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');
        $today = Carbon::now()->toDateString();
        $todayN = Carbon::Now()->format('N');
        $dayN = Carbon::parse($data['date_teacher'])->format('N');

        $packageNow = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','1')
            ->orderBy('order.id','desc')
            ->select('order.created_at','package.name','order.price_total','package.description3','order.package_id','package.class_per_day','order.date_start','order.date_end','order.status')
            ->first();


        // เช็ควันที่ น้อยกว่า วันปกติหรือ วันนี้
        if($today_selectdate >= $today)
        {

            if($packageNow != NULL || $packageNow != '')
            {

                if($packageNow->date_end < $today) {
                    // เปลี่ยน status makeup รีเซ็ต 0 
                    DB::table('users')->where('id',$user->id)->update(['makeup' => 0]);

                    // แพ็คเกจของคุณ หมดอายุ
                    $package_exp = "no";
                    return array('package_exp'=>$package_exp);exit;
                }else {

                    
                    $teacher_booking = DB::table('teacher_bookings')
                                    ->where('teacher_id',$data['teacher_id'])
                                    ->where('date_teacher',$data['date_teacher'])
                                    ->select('date_teacher','id')
                                    ->first();

                    //  เช็คว่า บันทึกลงเวลาของครู มีหรือไม่
                    if($teacher_booking != NULL || $teacher_booking != '')
                    {

                        $random = uniqid();

                        // cheack start_time and end_time
                        $start_time = Carbon::parse($time->time_th)->format('H:i:s');
                        $end_time   = Carbon::parse($time->time_th)->addMinute(30)->format('H:i:s');

                        $datetime_start = Carbon::parse($teacher_booking->date_teacher.$start_time)->format('Y-m-d H:i:s');
                        $datetime_end = Carbon::parse($teacher_booking->date_teacher.$end_time)->format('Y-m-d H:i:s');

                        // เปลี่ยน status_useruptrial
                        $userupmakeup = $user->makeup-1;
                        DB::table('users')->where('id',$user->id)->update(['makeup' => $userupmakeup]);

                        // เปลี่ยน status_booking
                        DB::table('teacher_booking_time')->where('teacher_booking_id',$teacher_booking->id)->where('time_id',$request->time_id)->update(['status_booking' => 1]);

                        $UserBooking = new UserBooking;
                        $UserBooking->teacher_id = $data['teacher_id'];
                        $UserBooking->user_id = $user->id;
                        $UserBooking->teacher_time_id = $request->time_id;
                        $UserBooking->room_video = $random;
                        $UserBooking->time_id = $request->time_id;
                        $UserBooking->datetime_start = $datetime_start;
                        $UserBooking->datetime_end = $datetime_end;
                        $UserBooking->date = $teacher_booking->date_teacher;
                        $UserBooking->start_time = $start_time;
                        $UserBooking->end_time = $end_time;
                        $UserBooking->class_type = 3;
                        $UserBooking->save();

                        $teacher_null = 'yes';
                        return array('teacher_null'=>$teacher_null);
                        exit;
                    }else {
                        $teacher_null = 'no';
                        return array('teacher_null'=>$teacher_null);
                        exit;
                    }

                }

            }else{
                // ถ้า เวลาที่ชดเชยคลาสไป วันปัจจุบัน ให้ ทำการแจ้งเตือน
                $package_no =  'no';
                return array('package_no'=>$package_no);exit;
            }

        } else {
            // ถ้า วันที่น้อยกว่า วันปัจจุบัน ให้ ทำการแจ้งเตือน
            $todaybooking =  'no';
            return array('todaybooking'=>$todaybooking);exit;
        }
    }
    public function bookingtrial(Request $request)
    {
        $user = Auth::User();
        $data['teacher_id'] = $request->teacher_id;
        $data['date_teacher'] = $_POST["date_teacher"];
        $data['time_id'] = $request->time_id;

        $time = Time::where('id',$request->time_id)->first();
        // เช็ค วันที่ 
        $today_selectdate = Carbon::parse($data['date_teacher'])->toDateString();

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');
        $today = Carbon::now()->toDateString();
        $todayN = Carbon::Now()->format('N');
        $dayN = Carbon::parse($data['date_teacher'])->format('N');

        $packageNow = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','1')
            ->orderBy('order.id','desc')
            ->select('order.created_at','package.name','order.price_total','package.description3','order.package_id','package.class_per_day','order.date_start','order.date_end','order.status')
            ->first();
            
        // เช็ควันที่ น้อยกว่า วันปกติหรือ วันนี้
        if($today_selectdate >= $today){

            if($user->trial > 0)
            {
                //เช็ค ว่าเรียนไปวันนั้นๆ ไปกี่ครั้ง
                $userBookCounttoday = UserBooking::where('user_id',$user->id)->where('date',$today_selectdate)->count();

                $teacher_booking = DB::table('teacher_bookings')
                                    ->where('teacher_id',$data['teacher_id'])
                                    ->where('date_teacher',$data['date_teacher'])
                                    ->select('date_teacher','id')
                                    ->first();

                $user_booking_teacher = DB::table('user_bookings')
                                        ->where('teacher_id',$data['teacher_id'])
                                        ->where('user_id',$user->id)
                                        ->count();

                // $wss = $userBookCounttoday.'-'.$user_booking_teacher;

                // return array('userBookCounttoday'=>$wss);die;
                // เช็ค package ว่า ได้ซื้อหรือไม่
                if($packageNow != NULL || $packageNow != '')
                {
                    //เช็คว่า ครูซ้ำกันหรือไม่
                    // เช็ค แพ็คเกจที่มีอยู่ปัจจุบันหรือไม่มีการซื้อ
                    if($userBookCounttoday == $packageNow->class_per_day)
                    {
                        $class_per = 'no';
                        return array('check_class_per_day'=>$class_per);

                    } else {

                        if($user_booking_teacher == 0 && $userBookCounttoday == 0)
                        {
                            //  เช็คว่า บันทึกลงเวลาของครู มีหรือไม่
                            if($teacher_booking != NULL || $teacher_booking != '')
                            {

                                $random = uniqid();

                                // cheack start_time and end_time
                                $start_time = Carbon::parse($time->time_th)->format('H:i:s');
                                $end_time   = Carbon::parse($time->time_th)->addMinute(30)->format('H:i:s');

                                $datetime_start = Carbon::parse($teacher_booking->date_teacher.$start_time)->format('Y-m-d H:i:s');
                                $datetime_end = Carbon::parse($teacher_booking->date_teacher.$end_time)->format('Y-m-d H:i:s');

                                // เปลี่ยน status_useruptrial
                                $useruptrial = $user->trial-1;
                                DB::table('users')->where('id',$user->id)->update(['trial' => $useruptrial]);

                                // เปลี่ยน status_booking
                                DB::table('teacher_booking_time')->where('teacher_booking_id',$teacher_booking->id)->where('time_id',$request->time_id)->update(['status_booking' => 1]);

                                $UserBooking = new UserBooking;
                                $UserBooking->teacher_id = $data['teacher_id'];
                                $UserBooking->user_id = $user->id;
                                $UserBooking->teacher_time_id = $request->time_id;
                                $UserBooking->room_video = $random;
                                $UserBooking->time_id = $request->time_id;
                                $UserBooking->datetime_start = $datetime_start;
                                $UserBooking->datetime_end = $datetime_end;
                                $UserBooking->date = $teacher_booking->date_teacher;
                                $UserBooking->start_time = $start_time;
                                $UserBooking->end_time = $end_time;
                                $UserBooking->class_type = 1;
                                $UserBooking->save();

                                //flash('ท่าน จองห้องเรียนร้อยแล้ว', 'success');
                                //return redirect('profile/book/class')->with('status', 'สำเร็จ');

                                $teacher_null = 'yes';
                                return array('teacher_null'=>$teacher_null);
                                exit;
                            }else {
                                $teacher_null = 'no';
                                return array('teacher_null'=>$teacher_null);
                                exit;
                            }

                        }else {
                           $teacher_change = 'no';
                           return array('teacher_change'=>$teacher_change);exit;
                        }
                    }

                }else{
                    // เช็ค แพ็คเกจที่มีอยู่ปัจจุบันหรือไม่มีการซื้อ
                    //เช็คว่า ครูซ้ำกันหรือไม่
                    if($userBookCounttoday == 1)
                    {
                        $class_per = 'no';
                        return array('check_class_per_day'=>$class_per);
                        
                    } else {
                        if($user_booking_teacher == 0 && $userBookCounttoday == 0)
                        {

                            //  เช็คว่า บันทึกลงเวลาของครู มีหรือไม่
                            if($teacher_booking != NULL || $teacher_booking != '')
                            {

                                $random = uniqid();
                                // cheack start_time and end_time
                                $start_time = Carbon::parse($time->time_th)->format('H:i:s');
                                $end_time   = Carbon::parse($time->time_th)->addMinute(30)->format('H:i:s');

                                $datetime_start = Carbon::parse($teacher_booking->date_teacher.$start_time)->format('Y-m-d H:i:s');
                                $datetime_end = Carbon::parse($teacher_booking->date_teacher.$end_time)->format('Y-m-d H:i:s');
                               

                                // เปลี่ยน status_booking
                                DB::table('teacher_booking_time')->where('teacher_booking_id',$teacher_booking->id)->where('time_id',$request->time_id)->update(['status_booking' => 1]);

                                $UserBooking = new UserBooking;
                                $UserBooking->teacher_id = $data['teacher_id'];
                                $UserBooking->user_id = $user->id;
                                $UserBooking->teacher_time_id = $request->time_id;
                                $UserBooking->room_video = $random;
                                $UserBooking->time_id = $request->time_id;
                                $UserBooking->datetime_start = $datetime_start;
                                $UserBooking->datetime_end = $datetime_end;
                                $UserBooking->date = $teacher_booking->date_teacher;
                                $UserBooking->start_time = $start_time;
                                $UserBooking->end_time = $end_time;
                                $UserBooking->class_type = 1;
                                $UserBooking->save();

                                //flash('ท่าน จองห้องเรียนร้อยแล้ว', 'success');
                                //return redirect('profile/book/class')->with('status', 'สำเร็จ');

                                $teacher_null = 'yes';
                                return array('teacher_null'=>$teacher_null);
                                exit;
                            }else {
                                $teacher_null = 'no';
                                return array('teacher_null'=>$teacher_null);
                                exit;
                            }

                        } else {

                            $teacher_change = 'no';
                            return array('teacher_change'=>$teacher_change);exit;

                        }
                    }
            
                }

            }else{
                $trial_class = 'no';
                return array('trial_class'=>$trial_class);exit;
            }
        }else{
            // ถ้า วันที่น้อยกว่า วันปัจจุบัน ให้ ทำการแจ้งเตือน
            $todaybooking =  'no';
            return array('todaybooking'=>$todaybooking);
            exit;
        }

    }


    public function ajaxstore(Request $request)
    {
        $user = Auth::User();

        $data['teacher_id'] = $request->teacher_id;
        $data['date_teacher'] = $_POST["date_teacher"];
        $data['time_id'] = $request->time_id;

        $time = Time::where('id',$request->time_id)->first();

        // เช็ค วันที่ 
        $today_selectdate = Carbon::parse($data['date_teacher'])->toDateString();

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');
        $today = Carbon::now()->toDateString();
        $todayN = Carbon::Now()->format('N');
        $dayN = Carbon::parse($data['date_teacher'])->format('N');

         // แพ็คเกจปัจจุบัน
        $packageNow = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','1')
            ->orderBy('order.id','desc')
            ->select('order.created_at','package.name','order.price_total','package.description3','order.package_id','package.class_per_day','order.date_start','order.date_end','order.status')
            ->first();

        // เช็ควันที่ น้อยกว่า วันปกติหรือ วันนี้
        if($today_selectdate >= $today){

            // เช็ค package ว่า ได้ซื้อหรือไม่
            if($packageNow != NULL || $packageNow != ''){
                // เช็ค package ยัง ใช้งานได้อยู่หรือไม่ หรือ หมดอายุ
                if($packageNow->date_end < $today) {
                    // แพ็คเกจของคุณ หมดอายุ
                    $package_exp = "no";
                    return array('package_exp'=>$package_exp);exit;
                }else {

                    $package = Package::where('id',$packageNow->package_id)->select('id','class_of_week_end','class_per_day')->first();

                    if($package->class_of_week_start <= $dayN && $dayN <= $package->class_of_week_end )
                    {
                        //เช็ค ว่าเรียนไปวันนั้นๆ ไปกี่ครั้ง
                        $userBookCounttoday = UserBooking::where('user_id',$user->id)->where('date',$today_selectdate)->count();

                        // เช็ค package child child and plus
                        if($package->id == 1 || $package->id == 5)
                        {
                            // package Child Child AND plus
                            if($userBookCounttoday == $package->class_per_day)
                            {
                                $class_per = 'no';
                                return array('check_class_per_day'=>$class_per);

                            } else {

                                $teacher_booking = DB::table('teacher_bookings')
                                    ->where('teacher_id',$data['teacher_id'])
                                    ->where('date_teacher',$data['date_teacher'])
                                    ->select('date_teacher','id')
                                    ->first();
 
                                $week = Carbon::parse($data['date_teacher'])->format('W');
                                $year = Carbon::parse($data['date_teacher'])->format('Y');
                                $startweek = date("Y-m-d", strtotime($year.'W'.$week));
                                $endweek = date('Y-m-d', strtotime($startweek. ' + 6 day'));

                                $BookCountWeek = UserBooking::where('user_id',$user->id)->whereBetween('date', [$startweek, $endweek])->count();

                                // เช็คว่า booking ไปแล้ว ครบ 3 ครั้งต่อ 1 อาทิตย์หรือยัง
                                if($BookCountWeek == 3)
                                {
                                    $book_count_week = 'no';
                                    return array('book_count_week'=>$book_count_week);
                                    exit;

                                }else{

                                    //  เช็คว่า บันทึกลงเวลาของครู มีหรือไม่
                                    if($teacher_booking != NULL || $teacher_booking != '')
                                    {

                                        $random = uniqid();
                                        // cheack start_time and end_time
                                        $start_time = Carbon::parse($time->time_th)->format('H:i:s');
                                        $end_time   = Carbon::parse($time->time_th)->addMinute(30)->format('H:i:s');

                                        $datetime_start = Carbon::parse($teacher_booking->date_teacher.$start_time)->format('Y-m-d H:i:s');
                                        $datetime_end = Carbon::parse($teacher_booking->date_teacher.$end_time)->format('Y-m-d H:i:s');
                                       

                                        // เปลี่ยน status_booking
                                        DB::table('teacher_booking_time')->where('teacher_booking_id',$teacher_booking->id)->where('time_id',$request->time_id)->update(['status_booking' => 1]);

                                        $UserBooking = new UserBooking;
                                        $UserBooking->teacher_id = $data['teacher_id'];
                                        $UserBooking->user_id = $user->id;
                                        $UserBooking->teacher_time_id = $request->time_id;
                                        $UserBooking->room_video = $random;
                                        $UserBooking->time_id = $request->time_id;
                                        $UserBooking->datetime_start = $datetime_start;
                                        $UserBooking->datetime_end = $datetime_end;
                                        $UserBooking->date = $teacher_booking->date_teacher;
                                        $UserBooking->start_time = $start_time;
                                        $UserBooking->end_time = $end_time;
                                        $UserBooking->class_type = 2;
                                        $UserBooking->save();

                                        //flash('ท่าน จองห้องเรียนร้อยแล้ว', 'success');
                                        //return redirect('profile/book/class')->with('status', 'สำเร็จ');

                                        $teacher_null = 'yes';
                                        return array('teacher_null'=>$teacher_null);
                                        exit;
                                    }else {
                                        $teacher_null = 'no';
                                        return array('teacher_null'=>$teacher_null);
                                        exit;
                                    }

                                }

                                
                            }
                            
                        }else {
                            // package Weekday Say “Hello” ,Time To Fit ,Holiday Say “Hello” AND plus
                            // เช็ค เรียนได้วันล่ะกี่ครั้ง
                            if($userBookCounttoday == $package->class_per_day)
                            {
                                $class_per = 'no';
                                return array('check_class_per_day'=>$class_per);
                            } else {
                               
                                // เช็ค teacher_id กับ วันที่ของครู
                                $teacher_booking = DB::table('teacher_bookings')
                                    ->where('teacher_id',$data['teacher_id'])
                                    ->where('date_teacher',$data['date_teacher'])
                                    ->select('date_teacher','id')
                                    ->first();

                                // เช็คว่า บันทึกลงเวลาของครู มีหรือไม่
                                if($teacher_booking != NULL || $teacher_booking != '')
                                {

                                    $random = uniqid();
                                    // cheack start_time and end_time
                                    $start_time = Carbon::parse($time->time_th)->format('H:i:s');
                                    $end_time   = Carbon::parse($time->time_th)->addMinute(30)->format('H:i:s');

                                    $datetime_start = Carbon::parse($teacher_booking->date_teacher.$start_time)->format('Y-m-d H:i:s');
                                    $datetime_end = Carbon::parse($teacher_booking->date_teacher.$end_time)->format('Y-m-d H:i:s');
                                   

                                    // เปลี่ยน status_booking
                                    DB::table('teacher_booking_time')->where('teacher_booking_id',$teacher_booking->id)->where('time_id',$request->time_id)
                                        ->update(['status_booking' => 1]);

                                    $UserBooking = new UserBooking;
                                    $UserBooking->teacher_id = $data['teacher_id'];
                                    $UserBooking->user_id = $user->id;
                                    $UserBooking->teacher_time_id = $request->time_id;
                                    $UserBooking->room_video = $random;
                                    $UserBooking->time_id = $request->time_id;
                                    $UserBooking->datetime_start = $datetime_start;
                                    $UserBooking->datetime_end = $datetime_end;
                                    $UserBooking->date = $teacher_booking->date_teacher;
                                    $UserBooking->start_time = $start_time;
                                    $UserBooking->end_time = $end_time;
                                    $UserBooking->class_type = 2;
                                    $UserBooking->save();

                                    //flash('ท่าน จองห้องเรียนร้อยแล้ว', 'success');
                                    //return redirect('profile/book/class')->with('status', 'สำเร็จ');

                                    $teacher_null = 'yes';
                                    return array('teacher_null'=>$teacher_null);
                                }else {
                                    $teacher_null = 'no';
                                    return array('teacher_null'=>$teacher_null);
                                }


                            }
                        }


                    } else {
                        $userPackageBooking = 'no';
                        return array('package_no'=>$userPackageBooking);
                    }

                    // เช็คเพจเกจหมดอายุ เมื่อยังมีคลาสที่ยังไม่ได้เรียน ปรับเป็น 0
                    if($intHolidaycount < 0){
                        $intHoliday = 'no';
                        return array('intHoliday'=>$intHoliday);

                    }else{
                        $intHoliday = $intHolidaycount;
                    }

                }
                
            }else {
                $package_exp = "nopackage";
                return array('package_exp'=>$package_exp);
                exit;
            }

        }else{
            // ถ้า วันที่น้อยกว่า วันปัจจุบัน ให้ ทำการแจ้งเตือน
            $todaybooking =  'no';
            return array('todaybooking'=>$todaybooking);
        }
        $check = 'nonono';
        return array('check'=>$check);
        exit;

        
    }
}
