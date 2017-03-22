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

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/admin/teacher'); }
         // แพ็คเกจปัจจุบัน
        $packageNow = DB::table('order')
            ->join('package', 'package.id', '=', 'order.package_id')
            ->where('order.user_id','=',$user->id)
            ->where('order.status','=','1')
            ->orderBy('order.id','desc')
            ->select('order.created_at','package.name','order.price_total','package.description3','order.package_id','package.class_per_day','order.date_start','order.date_end','order.status')
            ->first();

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');
        $timeVdo = Carbon::Now()->addMinutes(10)->format('Y-m-d H:i:s');
        $today = Carbon::now()->toDateString();
        
        
        // เช็ค user ว่าเคยเรียนไปแล้วหรือยัง
        // $userBooking = UserBooking::where('user_id',$user->id)->where('date',$today)->get();

        $userBooking = DB::table('user_bookings')
            ->join('users','user_bookings.teacher_id','=','users.id')
            ->where('user_bookings.user_id',$user->id)
            ->where('date',$today)
            ->select('user_bookings.*','users.name')
            ->orderBy('id', 'desc')
            ->get();
        // เช็คเวลาเข้าห้องเรียน
        $userLearn = DB::table('user_bookings')
            ->join('users','user_bookings.user_id','=','users.id')
            ->where('user_bookings.user_id',$user->id)
            ->where('user_bookings.datetime_start','>',$timenow)
            ->select('user_bookings.*','users.name')
            ->orderBy('user_bookings.date','asc')
            ->orderBy('user_bookings.datetime_start', 'desc')
            ->get();

        $userBookingCount = UserBooking::where('user_id',$user->id)->count();


        // user package
        if(!($packageNow == '' || $packageNow == NULL))
        {
            if($packageNow->date_end != "" || $packageNow->date_end != NULL){
                $package_exp = "";

            }else{
                if($packageNow->date_en < $today) {
                    $package_exp = "เพจเกจของคุณ หมดอายุ";
                }else {
                    $package_exp = "";
                }

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


        }else{

            $package_exp = "";
            $packageCount = 0;
        }

        $comment = DB::table('comment')
            ->leftJoin('users', 'comment.teacher_id', '=', 'users.id')
            ->where('user_id',$user->id)
            ->select('comment.*','users.name')
            ->get();
        $commentCount = DB::table('comment')->where('user_id',$user->id)->count();

        $userTrial = $user->trial;
        $userMakeup = $user->makeup;

        return view('user.profile.index',compact('user','userLearn','timenow','userBooking','packageNow','userBookingCount','userTrial','userMakeup','packageCount','comment','commentCount','package_exp','timeVdo','perDay'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
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

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');
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

        return view('user.profile.edit',compact('user','packageNow','userBookingCount','package_exp','userMakeup','userTrial','packageCount'));
    }
    public function update(Request $request, $id)
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

        $input = $request->except('img');

        if($request->hasFile('img')){

            if($user->img_path != "" || $user->img_path == "")
            {
                // มีรุปเก่าอยู่ ลบรูปเก่าก่อน
                unlink(base_path('public'.$user->img_path));

                $file = $request->file('img');
                $destinationPath = '/uploads/profile/';
                $now=date_format(Carbon::now(),'U');
                $filename=$now.'.'.$file->getClientOriginalExtension();

                $newfile['original_filename'] = $file->getClientOriginalName();
                $file =  $file->move(base_path().'/public'.$destinationPath,$filename);

                $path = $destinationPath.$filename;

                User::where('id', $user->id)->update([
                        'img_path' => $path,
                        'sex' => $input['sex'],
                        'tel' => $input['tel'],
                        'line' => $input['line'],
                    ]);

                return redirect('/profile/'.$id.'/edit')->with(compact('user','properties','packageNow'));

            }else{

                $file = $request->file('img');
                $destinationPath = '/uploads/profile/';
                $now=date_format(Carbon::now(),'U');
                $filename=$now.'.'.$file->getClientOriginalExtension();

                $newfile['original_filename'] = $file->getClientOriginalName();
                $file =  $file->move(base_path().'/public'.$destinationPath,$filename);

                $path = $destinationPath.$filename;

                User::where('id', $user->id)->update([
                        'img_path' => $path,
                        'sex' => $input['sex'],
                        'tel' => $input['tel'],
                        'line' => $input['line'],
                    ]);

                return redirect('/profile/'.$id.'/edit')->with(compact('user','properties','packageNow'));
            }
            
        }else{

            User::where('id', $user->id)->update([
                'sex' => $input['sex'],
                'tel' => $input['tel'],
                'line' => $input['line'],
                ]);
            return redirect('/profile/'.$id.'/edit')->with(compact('user','properties','packageNow'));
        }    

    }
    public function destroy($id)
    {
        //
    }


    function checktraildata(){

        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        $userid = Input::get('userid');
        $userbookingid = Input::get('userbookingid');
        $teacherid = Input::get('teacherid');

        // $data['userid'] = $userid;
        // $data['userbookingid'] = $userbookingid;
        // $data['teacherid'] = $teacherid;

        // $trial_class = DB::table('trial_classes')->where('user_id',$user->id)->where('user_booking_id',$userbookingid)->where('teacher_id',$teacherid)->get();
        $trial_class = DB::table('trial_classes')->where('user_id',6)->where('user_booking_id',16)->where('teacher_id',2)->get();

        if($trial_class == NULL || $trial_class == ''){
            $trial_classes = 'no';
        }else {
            $trial_classes = $trial_class;
        }
        return array('trial_classes'=>$trial_classes);exit;
    }

}
