<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Time;
use App\Order;
use App\User;
use Auth;
use DB;
use Carbon\Carbon;
use File;
use Storage;
use App\UserBooking;
use App\Package;
use Input;
use Alert;

class BookClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bookingclass(Request $request)
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        $getDayInput = '';
        $getDay = Input::get('date');

        if($getDay == NULL || $getDay == '')
        {
            $dateInput = '0';
        }else{
            $dateInput = '1';
        }

        // แพ็คเกจปัจจุบัน
        $packageNow = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','1')
            ->orderBy('order.id','desc')
            ->select('order.created_at','package.name','order.price_total','package.description3','order.package_id','package.class_per_day','order.date_start','order.date_end','order.status')
            ->first();

        $date = $request->only('date');
        $times = Time::select('id','time_th','time_ph')->get();

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');
        $today = Carbon::now()->toDateString();
        $todayN = Carbon::Now()->format('N');

        if($packageNow == NULL || $packageNow == ''){
            $package_exp = "-";
        }else {
            if($packageNow->date_end < $today) {
                $package_exp = "เพจเกจของคุณ หมดอายุ";
            }else {
                $package_exp = "";
            }
        }
        

        if(Input::has('date')){
            // select date ถ้าเกิดว่า เวลาที่เลือกมาน้อยกว่า วันปกติให้ ขึ้นวันล่าสุด
            $today_selectdate = Carbon::parse(Input::get('date'))->toDateString();

            if($today_selectdate <= $today)
            {
                $today_select = $today;
            }else{
                $today_select = $today_selectdate;
                $getDayInput = $today_select;
            }

            $teacher_booking_today = DB::table('teacher_bookings AS tb')
            ->join('users','tb.teacher_id','=','users.id')
            ->where('date_teacher',$today_select)
            ->select('tb.id','tb.teacher_id','tb.date_teacher','users.name AS teacher_name')
            ->get();

            $paginate = DB::table('teacher_bookings')->where('date_teacher',$today_select)->paginate(4);

            if(!($teacher_booking_today == '' || $teacher_booking_today == NULL))
            {
                // ถ้าเกิดมีข้อมูล
                foreach($teacher_booking_today AS $key=>$tbt)
                {
                        $data[$key]['teacher_bookgin_time_id'] = $tbt->id;

                        $time_booking_teacher  = DB::table('teacher_booking_time AS tbt2')
                            ->join('times','tbt2.time_id','=','times.id')
                            ->where('teacher_booking_id',$data[$key]['teacher_bookgin_time_id'])
                            ->select('tbt2.time_id','tbt2.status_booking','times.time_th')
                            ->get();


                        $time_book_count  = DB::table('teacher_booking_time')
                            ->where('teacher_booking_id',$data[$key]['teacher_bookgin_time_id'])
                            ->count();
                      

                        $data[$key]['teacher_id'] = $tbt->teacher_id;
                        $data[$key]['teacher_name'] = $tbt->teacher_name;
                        $data[$key]['date_teacher'] = $tbt->date_teacher;
                        $data[$key]['time_booking_count'] = $time_book_count;
                        $data[$key]['time_booking'] = $time_booking_teacher;
                        // $data[$key]['time_zone'] = $timeout;
                }
            }
            else {
                // ถ้าเกิดมีข้อมูล
                $data = 0;
            }

            // เช็ค user ว่าเคยเรียนไปแล้วหรือยัง
            $userBooking = UserBooking::where('user_id',$user->id)->get();
            $userBookingCount = UserBooking::where('user_id',$user->id)->count();
            $userBookingCounttoday = UserBooking::where('user_id',$user->id)->where('date',$today_select)->count();

            if(!($packageNow == '' || $packageNow == NULL))
            {
                // เช็คค่าว่า user booking ไปครบแล้วหรือยัง
                if($userBookingCounttoday < $packageNow->class_per_day)
                {
                    $bookiingUser = 1;
                }else{
                    $bookiingUser = 0;
                }

                // เช็ค ว่า เรียนตรงกับวันใหนได้บ้าง
                $strStartDate = $packageNow->date_start;
                $strEndDate = $packageNow->date_end;
            

                $BookCountMonth = UserBooking::where('user_id',$user->id)->whereBetween('date', [$strStartDate, $strEndDate])->select('id')->where('class_type',2)->count();

                switch ($packageNow->package_id) {
                    case "1":
                        $packageCount = 12*$packageNow->class_per_day-$BookCountMonth;
                        break;
                    case "2":
                        $packageCount = (22*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "3":
                        $packageCount = (30*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "4":
                        $packageCount = (8*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "5":
                        $packageCount = (12*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "6":
                        $packageCount = (22*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "7":
                        $packageCount = (30*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "8":
                        $packageCount = (16*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    default:
                        echo "no connection server check package";
                }

                // have package

            }else{ // ไม่มีแพ็คเกจ หรือ สมัคร ใหม่
                $package_exp = "";
                $packageCount = 0;

            }

            $userTrial = $user->trial;
            $userMakeup = $user->makeup;


            return view('user.profile.classbook',compact('user','paginate','data','packageNow','userBookingCount','userBookingCounttoday','bookiingUser','packageCount','package_exp','dateInput','getDayInput','userMakeup','userTrial'));

        } else {
            // today
            $teacher_booking_today = DB::table('teacher_bookings AS tb')
            ->join('users','tb.teacher_id','=','users.id')
            ->where('date_teacher',$today)
            ->select('tb.id','tb.teacher_id','tb.date_teacher','users.name AS teacher_name')
            ->get();


            $paginate = DB::table('teacher_bookings')->where('date_teacher',$today)->paginate(4);

            if(!($teacher_booking_today == '' || $teacher_booking_today == NULL))
            {
                // ถ้าเกิดมีข้อมูล
                foreach($teacher_booking_today AS $key=>$tbt)
                {
                        $data[$key]['teacher_bookgin_time_id'] = $tbt->id;

                        $time_booking_teacher  = DB::table('teacher_booking_time AS tbt2')
                            ->join('times','tbt2.time_id','=','times.id')
                            ->where('teacher_booking_id',$data[$key]['teacher_bookgin_time_id'])
                            ->select('tbt2.time_id','tbt2.status_booking','times.time_th')
                            ->get();

                        $time_book_count  = DB::table('teacher_booking_time')
                            ->where('teacher_booking_id',$data[$key]['teacher_bookgin_time_id'])
                            ->count();
                      

                        $data[$key]['teacher_id'] = $tbt->teacher_id;
                        $data[$key]['teacher_name'] = $tbt->teacher_name;
                        $data[$key]['date_teacher'] = $tbt->date_teacher;
                        $data[$key]['time_booking_count'] = $time_book_count;
                        $data[$key]['time_booking'] = $time_booking_teacher;
                        // $data[$key]['time_zone'] = $timeout;
                }
            }
            else {
                // ถ้าเกิดมีข้อมูล
                $data = 0;
            }

            // เช็ค user ว่าเคยเรียนไปแล้วหรือยัง
            $userBooking = UserBooking::where('user_id',$user->id)->get();
            $userBookingCount = UserBooking::where('user_id',$user->id)->count();
            $userBookingCounttoday = UserBooking::where('user_id',$user->id)->where('date',$today)->count();

            if(!($packageNow == '' || $packageNow == NULL))
            {
                // เช็คค่าว่า user booking ไปครบแล้วหรือยัง
                if($userBookingCounttoday < $packageNow->class_per_day)
                {
                    $bookiingUser = 1;
                }else{
                    $bookiingUser = 0;
                }


                $strStartDate = $packageNow->date_start;
                $strEndDate = $packageNow->date_end;
 
                $BookCountMonth = UserBooking::where('user_id',$user->id)->whereBetween('date', [$strStartDate, $strEndDate])->select('id')->where('class_type',2)->count();

                switch ($packageNow->package_id) {
                    case "1":
                        $packageCount = 12*$packageNow->class_per_day-$BookCountMonth;
                        break;
                    case "2":
                        $packageCount = (22*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "3":
                        $packageCount = (30*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "4":
                        $packageCount = (8*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "5":
                        $packageCount = (12*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "6":
                        $packageCount = (22*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "7":
                        $packageCount = (30*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    case "8":
                        $packageCount = (16*$packageNow->class_per_day)-$BookCountMonth;
                        break;
                    default:
                        echo "no connection server check package";
                }


            }else{ // ไม่มีแพ็คเกจ หรือ สมัคร ใหม่
                $package_exp = "";
                $packageCount = 0;
            }

        // dd($intHoliday);
        $userTrial = $user->trial;
        $userMakeup = $user->makeup;
            // return $data;
            // alert()->message('Message', 'Optional Title');
        return view('user.profile.classbook',compact('user','paginate','data','packageNow','userBookingCount','userBookingCounttoday','bookiingUser','packageCount','package_exp','dateInput','getDayInput','userMakeup','userTrial'));
        }

    }
}
