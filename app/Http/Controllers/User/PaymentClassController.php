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
class PaymentClassController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function paymentclass(Request $request)
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        // แพ็คเกจปัจจุบัน
        $packageNow = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','1')
            ->orderBy('order.id','desc')
            ->select('order.created_at','package.name','order.price_total','package.description3','order.package_id','package.class_per_day','order.date_start','order.date_end','order.status')
            ->first();

        $packagePayemnt = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','0')
            ->select('order.id','order.created_at','package.name','order.price_total','package.description3','package.class_per_day','order.date_start','order.date_end','order.status')
            ->get();

        $today = Carbon::now()->toDateString();

        if($packageNow == NULL || $packageNow == ''){
            $package_exp = "-";
        }else {
            if($packageNow->date_end < $today) {
                $package_exp = "เพจเกจของคุณ หมดอายุ";
            }else {
                $package_exp = "";
            }
        }

         // เช็ค user ว่าเคยเรียนไปแล้วหรือยัง
        $userBooking = UserBooking::where('user_id',$user->id)->get();
        $userBookingCount = UserBooking::where('user_id',$user->id)->count();


        $userBookingofmonth = 0;   
        // user package
        $intWorkDay = 0;
        $intHoliday = 0;

        // user package
        if(!($packageNow == '' || $packageNow == NULL))
        {

            if($userBookingCount >= $user->trial){
                $userTrialClass = 0;
            }
            else {
                $userTrialClass = $user->trial;
            }

            $strStartDate = $packageNow->date_start;
            $strStartDate1 = $packageNow->date_start;
            $strEndDate = $packageNow->date_end;

            $intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate)) /  ( 60 * 60 * 24 )) + 1; 
            $intHolidaycount = 1;
            $perDay = $packageNow->class_per_day;
            while (strtotime($strStartDate) <= strtotime($strEndDate)) {
                $DayOfWeek = date("w", strtotime($strStartDate));
                if($DayOfWeek == 0 or $DayOfWeek ==6)  // 0 = Sunday, 6 = Saturday;
                {
                    if($strEndDate < $today) {
                        $intHolidaycount = 0;
                    }else {
                        $intHolidaycount++;
                    }
                }
                else
                {
                    if($strEndDate < $today) {
                        $intHolidaycount = 0;
                    }else {
                        $intHolidaycount++;
                    }
                }
                // $DayOfWeek = date("l", strtotime($strStartDate)); // return Sunday, Monday,Tuesday....

                $strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
            }

            // เช็คเพจเกจหมดอายุ เมื่อยังมีคลาสที่ยังไม่ได้เรียน ปรับเป็น 0
            if($intHolidaycount < 0){
                $intHoliday = 0;
            }else{
                $intHoliday = $intHolidaycount;
            }

            $userBookingofmonthday = UserBooking::where('user_id',$user->id)->whereBetween('date',[$packageNow->date_start, $packageNow->date_end])->count();
            // เช็คเพจเกจหมดอายุ เมื่อยังมีคลาสที่ยังไม่ได้เรียน ปรับเป็น 0
            if($userBookingofmonthday > 0){
                $userBookingofmonth = 0;
            }else{
                $userBookingofmonth = $userBookingofmonthday;
            }


            $BookCountMonth = UserBooking::where('user_id',$user->id)->whereBetween('date', [$strStartDate1, $strEndDate])->select('id')->where('class_type',2)->count();

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

        }else{
            $package_exp = "";
            $perDay = 0;

            $packageCount = 0;
        }


        $userMakeup = $user->makeup;
        $userTrial = $user->trial;

        return view('user.profile.payment',compact('user','packagePayemnt','packageNow','userBookingCount','userTrialClass','intWorkDay','userBookingofmonth','packageCount','userMakeup','userTrial','package_exp','intHoliday','perDay'));

    }
}
