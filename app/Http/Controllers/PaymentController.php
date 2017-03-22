<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Payment;
use Validator;
use Carbon\Carbon;
use DB;
class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        $validator = Validator::make($request->all(), [
            'order_id'  => 'required',
            'pament_type_id' => 'required',
            'total' => 'required',
            'time1' => 'required',
            'time2' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('profile/payment/class')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $input = $request->except('file_slip');

            $datereplace = str_replace('/', '-', $input['date']);
            $date = date('Y-m-d', strtotime($datereplace));

            $data['user_id'] = $user->id;
            $data['order_id'] = $input['order_id'];
            $data['pament_type_id'] = $input['pament_type_id'];
            $data['total'] = $input['total'];
            $data['date'] = $date;
            $data['time'] = $input['time1'].':'.$input['time2'];
            $review = Payment::create($data);

            DB::table('order')->where('id',$input['order_id'])->where('user_id',$user->id)->update(['status' => 2]);

            return redirect('profile/history/class');
        }

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
