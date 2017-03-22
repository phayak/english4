<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\RegularClass;
use App\Http\Model\TrialClass;
use Auth;
use Input;
class RegularClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $RegularClass = RegularClass::all();
        return $RegularClass;
    }

    public function create()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $user_id = Input::get('userid');
        $booking_id = Input::get('booking_id');

        $data['user_id'] = $user_id;
        $data['teacher_id'] = $user->id;
        $data['user_booking_id'] = $booking_id;

        return view('teacher.regularclass.create',compact('data'));
    }

 
    public function store(Request $request)
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $input = $request->except('_token');

        RegularClass::create($input);
        echo "<script>window.close();</script>";
        // return redirect('/teacher/regularclass/create');
    }

    public function show($id)
    {
       $regularclass =  RegularClass::where('user_id',$id)->get();
       $trialClass =  TrialClass::where('user_id',$id)->get();
       dd($trialClass);

       return view('teacher.regularclass.show',compact('regularclass'));
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
