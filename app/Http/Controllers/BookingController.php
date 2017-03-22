<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use Auth;
use Carbon\Carbon;
use DB;
use App\Http\Model\Booking;
use App\Http\Model\Time;
use App\Http\Model\TeacherTime;
class BookingController extends Controller
{

    public function index()
    {
        $Date = Input::get('date');
        $user_id = Auth::user();
        $Carbon_now = Carbon::now()->format('H:i:s');
        $Times = TeacherTime::where('date_teacher',$Date)->get();
        $Bookings = Booking::all();
        // return 'Date : '.$Times->id;
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
