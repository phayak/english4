<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TeacherBooking;
use App\Time;
use Auth;
use Carbon\Carbon;

class AddClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/es4p'); }

        // $TeacherTimes = TeacherBooking::all();
        $TeacherTimes = TeacherBooking::where('teacher_id',$user->id)->orderBy('id','desc')->get();


        return view('teacher.addclass.index',compact('TeacherTimes'));
    }
    public function create()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $today_TH = Carbon::now('Asia/Bangkok')->format('Y-m-d');
        $today_PH = Carbon::now('Asia/Manila')->format('Y-m-d');

        $Times = Time::all();
        return view('teacher.addclass.create',compact('Times','today_PH'));
        
    }
    public function store(Request $request)
    {
        $user_id = Auth::User()->id;

        $input = $request->except('time');

        $date = str_replace('/', '-', $input['date']);
        $data_format_add = date('Y-m-d', strtotime($date));

        $TeacherTime = TeacherBooking::where('teacher_id',$user_id)->where('date_teacher',$data_format_add)->count();


        $timeNowToday = Carbon::now('Asia/Bangkok')->format('Y-m-d H:i:s');

        // $timeDayTH_Now = Carbon::now('Asia/Bangkok')->format('Y-m-d H:i:s');
        // $timeDayPH_Now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

        $timeTH_Now = Carbon::now('Asia/Bangkok')->format('H:i:s');
        $timePH_Now = Carbon::now('Asia/Manila')->format('H:i:s');

        $timeCheck = Carbon::parse('23:00:00')->format('H:i:s');
        $timeCheck2 = Carbon::parse('01:00:00')->format('H:i:s');

        if($TeacherTime == 0) {

            // if($timePH_Now <= $timeCheck && $timeCheck2 >= $timePH_Now)
            // {
            //     $data_format_add2 = Carbon::parse($data_format_add)->subDay(1)->format('Y-m-d');

            //     $booking['teacher_id'] = $user_id;
            //     $booking['date_teacher'] = $data_format_add2;
                
            //     $time = $request->only('time');

            //     $teacherbookings = TeacherBooking::create($booking);
            //     $teacherbookings->times()->attach($time['time']);

            //     return redirect('admin/teacher/class');
            // }else {

                $booking['teacher_id'] = $user_id;
                $booking['date_teacher'] = $data_format_add;
                
                $time = $request->only('time');

                $teacherbookings = TeacherBooking::create($booking);
                $teacherbookings->times()->attach($time['time']);

                return redirect('admin/teacher/class');
            // }
        }else{
            return redirect('admin/teacher/class');
            // return redirect()->back();
        }
        

        
    }
    public function show($id)
    {
        $user = Auth::User();
        $teacherbooking = TeacherBooking::where('id',$id)->where('teacher_id',$user->id)->first();
        if(empty($teacherbooking))
            abort(404);

        return view('teacher.addclass.show',compact('teacherbooking'));
    }

    public function edit($id)
    {
        $user = Auth::User();
        $teacherBooking = TeacherBooking::where('id',$id)->where('teacher_id',$user->id)->first();
        if(empty($teacherBooking))
            return back();

        $Times = Time::get();
        return view('teacher.addclass.edit',compact('teacherBooking','Times','id'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::User();
        $input = $request->except('time');
        $date = str_replace('/', '-', $input['date']);
        $data_format_add = date('Y-m-d', strtotime($date));

        $TeacherTime = TeacherBooking::where('teacher_id',$user->id)->where('date_teacher',$data_format_add)->count();
        
        $booking = TeacherBooking::findOrFail($id);

        $date_teacher = Carbon::parse($booking->date_teacher)->format('Y-m-d');
        $date_now = Carbon::now()->format('Y-m-d');


        if($date_teacher > $date_now){
 
            $booking->update($input);
            $time = $request->only('time');
        
            if(!empty($booking)) {
                $booking->times()->sync($time['time']);
            }
            else {
                $booking->times()->detach();
            }
            return redirect('admin/teacher/class/'.$id.'/edit');

        }else{
            
            return redirect()->back();
        }

        
    }

    public function destroy($id)
    {
        //
    }
}
