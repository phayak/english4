<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Package;
use App\Order;
use Auth;
use Carbon\Carbon;
use App\Coupon;
use Response;
class PackageController extends Controller
{
    
    public function coupon(Request $request)
    {
        $input = $request->all();

        if($input['code'] == ""){

            $data['couponnull'] = "0";

        }else{

            $coupon = Coupon::where('code', 'like', '%'.$input['code'])->where('status',1)->first();

            $daynow = Carbon::Now()->format('Y-m-d');

            if(!empty($coupon))
            {
                if($coupon['unit'] > 0)
                {
                    $coupon_date_start = Carbon::parse($coupon['coupon_date_start'])->format('Y-m-d');
                    $coupon_date_end = Carbon::parse($coupon['coupon_date_end'])->format('Y-m-d');
                    // เช็ควันว่ายังใช้ได้อยู่หรือไม่
                    if($coupon_date_start <= $daynow && $daynow <= $coupon_date_end)
                    {
                        $data['code'] = '1';
                        $data['exp'] = '1';
                        $data['unit'] = '1';

                        $data['coupon_id'] = $coupon['id'];
                        $data['coupon_name'] = $coupon['name'];
                        $data['coupon_discount'] = $coupon['discount'];
                    }else {
                        $data['exp'] = '0';
                    }
                }else{
                    $data['unit'] = '0';         }
                
            } else {
                $data['code'] = '0';
            }
        }
        return \Response::json($data);
        // return $input;
    }

    public function index()
    {
        $packages = Package::orderBy('id', 'asc')
            ->take(4)
            ->get();
        $packageplus = Package::orderBy('id', 'asc')
            ->skip(4)
            ->take(4)
            ->get();
        return view('package',compact('packages','packageplus'));
    }
    public function create()
    {

        return view('package_create');
    }
    public function store(Request $request)
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        $input = $request->all();

        if($input['coupon_id'] == '' || $input['coupon_id'] == NULL)
        {
            // $inputnot = 'no';
            // ไม่มีคูปอง
            $package = Package::find($input['package_id']);

            $order = Order::where('user_id',$user->id)->orderby('date_end','desc')->first();
            $today = Carbon::now()->format('Y-m-d');


            // return $order;
            if(!empty($order == NULL || $order == ''))
            {

                
                $date_start = Carbon::now()->format('Y-m-d');
                $date_end   = Carbon::now()->addMonth(1)->format('Y-m-d');

                Order::create([
                    'pay_type' => 'bank',
                    'user_id' => $user->id,
                    'package_id' => $package->id,
                    'number_of_month' => 1,
                    'coupon_id'  => 0,
                    'price_total'  => $package->price,
                    'date_start'  => $date_start,
                    'date_end'  => $date_end,
                ]);
                return redirect('profile/history/class')->with('status', 'สามารถแจ้งการโอนเงินได้');
            }
            else
            {
                // เซ็คอีก 1 รอบ ว่ามีอยู่หรือป่าว
                if($order['date_end'] <= $today)
                {
                    // echo 'ได้';
                    $date_start = Carbon::now()->format('Y-m-d');
                    $date_end   = Carbon::now()->addMonth(1)->format('Y-m-d');

                    Order::create([
                        'pay_type' => 'bank',
                        'user_id' => $user->id,
                        'package_id' => $package->id,
                        'number_of_month' => 1,
                        'coupon_id'  => 0,
                        'price_total'  => $package->price,
                        'date_start'  => $date_start,
                        'date_end'  => $date_end,
                    ]);
                    return redirect('profile/history/class')->with('status', 'สามารถแจ้งการโอนเงินได้');

                }
                else {
                    // echo 'ไม่ได้';
                    return redirect('profile/history/class')->with('status', 'สามารถแจ้งการโอนเงินได้');
                }
                // return redirect('package/'.$input['package_id'])->with('status', 'คุณมีแพ็คเกจอยู่แล้ว');
            } // else
            
        }else{
            
            // มีคูปอง
            $package = Package::find($input['package_id']);

            $order = Order::where('user_id',$user->id)->orderby('date_end','desc')->first();
            $today = Carbon::now()->format('Y-m-d');

            // return $order;
            if(!empty($order == NULL || $order == ''))
            {

                $date_start = Carbon::now()->format('Y-m-d');
                $date_end   = Carbon::now()->addMonth(1)->format('Y-m-d');

                $coupon = Coupon::find($input['coupon_id']);

                $coupon_change_unit = ($coupon->unit-1);
                // update coupon ----->>>>>>>
                $conpon = DB::table('coupon')->where('id', $input['coupon_id'])->update(['unit' => $coupon_change_unit]);

                $price_coupon = ($package->price*$coupon->discount/100);
                $price_total_val = ($package->price-$price_coupon);

                Order::create([
                    'pay_type' => 'bank',
                    'user_id' => $user->id,
                    'package_id' => $package->id,
                    'number_of_month' => 1,
                    'coupon_id'  => $input['coupon_id'],
                    'price_total'  => $price_total_val,
                    'date_start'  => $date_start,
                    'date_end'  => $date_end,
                ]);
                return redirect('profile/history/class')->with('status', 'สามารถแจ้งการโอนเงินได้');
            }
            else
            {

                // เซ็คอีก 1 รอบ ว่ามีอยู่หรือป่าว
                if($order['date_end'] <= $today)
                {
                    // echo 'ได้';
                    $date_start = Carbon::now()->format('Y-m-d');
                    $date_end   = Carbon::now()->addMonth(1)->format('Y-m-d');

                    $coupon = Coupon::find($input['coupon_id']);

                    $coupon_change_unit = ($coupon->unit-1);
                    // update coupon ----->>>>>>>
                    $conpon = DB::table('coupon')->where('id', $input['coupon_id'])->update(['unit' => $coupon_change_unit]);

                    $price_coupon = ($package->price*$coupon->discount/100);
                    $price_total_val = ($package->price-$price_coupon);

                    Order::create([
                        'pay_type' => 'bank',
                        'user_id' => $user->id,
                        'package_id' => $package->id,
                        'number_of_month' => 1,
                        'coupon_id'  => $input['coupon_id'],
                        'price_total'  => $price_total_val,
                        'date_start'  => $date_start,
                        'date_end'  => $date_end,
                    ]);
                    return redirect('profile/history/class')->with('status', 'สามารถแจ้งการโอนเงินได้');

                }
                else {
                    // echo 'ไม่ได้';
                    return redirect('profile/history/class')->with('status', 'สามารถแจ้งการโอนเงินได้');
                }
                // return redirect('package/'.$input['package_id'])->with('status', 'คุณมีแพ็คเกจอยู่แล้ว');
            } // else

            return redirect('package/'.$input['package_id']);
            // dd($input['coupon_id']);
        }
    }
    public function show($id)
    {   
        $user = Auth::User();
        if($user->status != 0) { return redirect('/'); }

        $package = Package::find($id);

        return view('package_create',compact('package'));
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
