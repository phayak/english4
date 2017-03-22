<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/es4p'); }
        
        // $comment_count = DB::table('comment')->where('teacher_id',$user->id)->count();

        // $teacher_booking_count = DB::table('teacher_bookings')->where('teacher_id',$user->id)->count();

        // $user_booking_count = DB::table('user_bookings')->where('teacher_id',$user->id)->count();
        
        // $teacher_book_time_count = DB::table('teacher_booking_time')->where()->get();
        
        // return view('teacher.dashboard',compact('comment_count','teacher_booking_count','user_booking_count'));

        return 'fail';
    }

    public function create()
    {
        
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
