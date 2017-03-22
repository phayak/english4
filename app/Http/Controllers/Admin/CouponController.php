<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Coupon;
class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 1) { return redirect('/'); }

        $conpons = Coupon::paginate(10);
        return view('admin.coupon.index',compact('conpons'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Coupon::create($input);

        return redirect('es4p/coupon');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);

        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method');

        Coupon::where('id',$id)->update($input);

        return redirect('es4p/coupon');

    }

    public function destroy($id)
    {
        Coupon::where('id',$id)->delete();

        return redirect('es4p/coupon');
    }
}
