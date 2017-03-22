<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Payment;
class PaymentController extends Controller
{

    public function index()
    {
        // $payments = Payment::all();

        $payments = DB::table('payment AS pay')
            ->leftJoin('users AS u','pay.user_id','=','u.id')
            ->leftJoin('order AS o','pay.order_id','=','o.id')
            ->leftJoin('package AS p','o.package_id','=','p.id')
            ->leftJoin('payment_type AS pt','pay.pament_type_id','=','pt.id')
            ->select('pay.*','u.name AS userName','pt.name_bank','p.name AS userPackage','o.price_total')
            ->orderBy('pay.id', 'desc')
            ->paginate(10);

        // dd($payments);
        return view('admin.payment.index',compact('payments'));
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
        if($user->status != 1) { return redirect('/'); }

        $payment = DB::table('payment AS pay')
            ->leftJoin('users AS u','pay.user_id','=','u.id')
            ->leftJoin('order AS o','pay.order_id','=','o.id')
            ->leftJoin('package AS p','o.package_id','=','p.id')
            ->leftJoin('payment_type AS pt','pay.pament_type_id','=','pt.id')
            ->where('pay.id',$id)
            ->select('pay.*','u.name AS userName','pt.name_bank','p.name AS userPackage','o.price_total')
            ->first();

        return view('admin.payment.edit',compact('payment'));

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
