<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\TrialClass;

use Auth;
use Input;
class TrialClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }


        $TrialClass = TrialClass::all();
        return view('teacher.trialclass.index');
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

        return view('teacher.trialclass.create',compact('data'));
    }

    public function store(Request $request)
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $input = $request->except('_token');

        TrialClass::create($input);
        echo "<script>window.close();</script>";
        // return redirect('/teacher/trialclass/create');
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
