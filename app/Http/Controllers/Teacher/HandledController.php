<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\UserBooking;
use DB;
use Carbon\Carbon;

class HandledController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }
        
        // $user_bookings =  UserBooking::where('teacher_id',$user->id)->orderBy('start_time', 'desc')->get();
        $user_bookings = DB::table('user_bookings')
            ->join('users','user_bookings.user_id','=','users.id')
            ->where('user_bookings.teacher_id',$user->id)
            ->select('user_bookings.*','users.name','users.birth_date','users.sex')
            ->orderBy('user_bookings.datetime_start', 'desc')
            ->get();

        $timenow = Carbon::Now()->format('Y-m-d H:i:s');

        foreach ($user_bookings as $key => $userbook) {
            
            $data[$key]['booking_id'] = $userbook->id;
            $data[$key]['teacher_id'] = $userbook->teacher_id;
            $data[$key]['user_id'] = $userbook->user_id;
            $data[$key]['time_id'] = $userbook->time_id;
            $data[$key]['datetime_start'] = $userbook->datetime_start;
            $data[$key]['datetime_end'] = $userbook->datetime_end;
            $data[$key]['room_video'] = $userbook->room_video;
            $data[$key]['date'] = $userbook->date;
            $data[$key]['start_time'] = $userbook->start_time;
            $data[$key]['end_time'] = $userbook->end_time;
            $data[$key]['class_type'] = $userbook->class_type;
            $data[$key]['name'] = $userbook->name;
            $data[$key]['birth_date'] = $userbook->birth_date;
            $data[$key]['sex'] = $userbook->sex;
            $data[$key]['status'] = $userbook->status;

            $userCommentCount = DB::table('comment')->where('user_id',$userbook->user_id)->where('class_teacher_id',$userbook->id)->count();

            $data[$key]['comment'] = $userCommentCount;
        }
        // echo $data[0]['datetime_end'].'-'.$timenow;
        // dd($data);
        return view('teacher.handled.index',compact('data','timenow'));
    }

    public function action(Request $request)
    {   
        $input = $request->only('booking_id');
        $status = $request->only('val');
        // $user_booking = UserBooking::where('id',$input['booking_id'])->select('id','status')->first();

        $update = UserBooking::where('id',$input['booking_id'])->update(['status'=>$status['val']]);
        return $update;
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
