<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Order;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 1) { return redirect('/'); }

        // $orders = Order::paginate(10);
        $orders = DB::table('order AS o')
            ->leftJoin('users AS u','o.user_id','=','u.id')
            ->leftJoin('package AS p','o.package_id','=','p.id')
            ->leftJoin('coupon AS c','o.coupon_id','=','c.id')
            ->select('o.*','u.name AS userName','p.name AS userPackage','c.name AS userCoupon','c.discount')
            ->orderBy('o.id','desc')
            ->paginate(10);

        // dd($orders);

        $orderCountAll = Order::all()->count();
        $orderCountAllSum = Order::all()->sum('price_total');

        $orderCountNot = Order::where('status',0)->count();
        $orderCountNotSum = Order::where('status',0)->sum('price_total');

        $orderCountActive = Order::where('status',1)->count();
        $orderCountActiveSum = Order::where('status',1)->sum('price_total');

        $orderCountWait = Order::where('status',2)->count();
        $orderCountWaitSum = Order::where('status',2)->sum('price_total');

        return view('admin.order.index',compact('orders','orderCountAll','orderCountActive','orderCountWait','orderCountAllSum','orderCountNot','orderCountNotSum','orderCountActiveSum','orderCountWaitSum'));
    }
    public function edit($id)
    {
        $user = Auth::User();
        if($user->status != 1) { return redirect('/'); }

        // $order = Order::find($id);
        $order = DB::table('order AS o')
            ->leftJoin('users AS u','o.user_id','=','u.id')
            ->leftJoin('package AS p','o.package_id','=','p.id')
            ->leftJoin('coupon AS c','o.coupon_id','=','c.id')
            ->where('o.id',$id)
            ->select('o.*','u.name AS userName','p.name AS userPackage','c.name AS userCoupon','c.discount')
            ->first();

        // dd($order);
        return view('admin.order.edit',compact('order'));
    }
    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method');

        Order::where('id',$id)->update($input);

        return redirect('es4p/order');
    }
     public function destroy($id)
    {
        //
    }
}
