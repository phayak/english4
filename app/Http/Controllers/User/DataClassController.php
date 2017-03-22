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
class DataClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dataclass(Request $request)
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

        $userBookingClass = DB::table('user_bookings')
            ->join('users','user_bookings.teacher_id','=','users.id')
            ->where('user_bookings.user_id',$user->id)
            ->select('user_bookings.*','users.name')
            ->orderBy('id', 'desc')
            ->paginate(4);

        if($userBookingClass != NULL || $userBookingClass != '')
        {
            $classhistory = 1;
        }else{
            $classhistory = 0;
        }
        // user package
        // เช็ค user ว่าเคยเรียนไปแล้วหรือยัง
        $userBooking = UserBooking::where('user_id',$user->id)->get();
        $userBookingCount = UserBooking::where('user_id',$user->id)->count(); 
        // user package

        // user package
        if(!($packageNow == '' || $packageNow == NULL))
        {
           
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

        }else{
            $package_exp = "";
           	$packageCount = 0;
        }

        $userTrial = $user->trial;
        $userMakeup = $user->makeup;

        return view('user.profile.dataclass',compact('user','packageNow','userBookingCount','userBooking','classhistory','userBookingClass','intWorkDay','userMakeup','userTrial','packageCount','package_exp'));

    }
}
