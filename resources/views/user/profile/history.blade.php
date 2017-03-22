@extends('layouts.nav')

<!-- @section('trial') opened @endsection
@section('trial_ul') display: block; @endsection -->
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">
<style type="text/css">
    .f18 {
        font-size: 18px;
    }
    .f25 {
        font-size: 25px;
    }
    .fw300 {
        font-weight: 300 !important;
    }
    .fw400 {
        font-weight: 400 !important;
    }
    .nav-c {
        color: #757575;
    }
    .nav-c a{
        color: #757575;
    }
    .date-profile-class {
        background-color: #455978 !important;
        color: #fff !important;
        border-top-left-radius: 3px !important;
        border-bottom-left-radius: 3px !important;
    }

</style>
@endsection

@section('content')
<br>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container bg-fff profile">
    <div class="col-md-12" style="margin-top:40px;"></div>
        <div class="col-md-2">   
            <div class="row">   
                <div class="dashboard-profile-text">DASHBOARD</div>
                <div class="" style="margin-top:20px;margin-bottom:20px;">
                    <center>
                        @if(!($user->img_path == NULL || $user->img_path == ''))
                        <img src="{{asset($user->img_path)}}" class="profile-img" width="90%" height="auto" alt="">
                        @else
                        <img src="{{asset('assets/img/avatar-sign.png')}}" class="profile-img" width="90%" height="auto" alt="">
                        @endif
                    </center>
                </div>
                <ul class="nav nav-pills nav-stacked" style="padding-right:7px;" role="tablist">
                    <!-- <li class="active f25 kanit"><a href="#">Deasboard</a></li> -->
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile')}}">ห้องเรียน</a></li>
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/1/edit')}}">ข้อมูลส่วนตัว</a></li>
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/data/class')}}">ข้อมูลคลาสเรียน</a></li>
                    <li class="kanit f18 fw300 nav-c active"><a href="{{url('/profile/history/class')}}">ประวัติการสมัครแพ็คเกจ</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/msg/class')}}">ข้อความจากครู</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/payment/class')}}">แจ้งโอนเงิน</a></li>   
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/book/class')}}">จองเวลาเรียน</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10" style="border-left: 2px solid #F1F0F0;" >
            <div class="row">
                <div class="col-md-9">
                    <h3 class="kanit nav-c">ประวัติการสมัครแพ็คเกจ</h3>
                    <!-- <div class="nut-teacher-1">แก้ไขข้อมูลส่วนตัว</div> -->
            
                    <div class="table-responsive">
                    <!-- table-bordered -->
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="background-color: #455978;color:#fff;font-size:17px;font-weight: 400;"><center>วันที่สมัคร</center></th>
                            <th style="background-color: #455978;color:#fff;font-size:17px;font-weight: 400;"><center>แพ็คเกจ</center></th>
                            <th style="background-color: #455978;color:#fff;font-size:17px;font-weight: 400;"><center>ราคา</center></th>
                            <th style="background-color: #455978;color:#fff;font-size:17px;font-weight: 400;"><center>วันที่เริ่มเรียน</center></th>
                            <th style="background-color: #455978;color:#fff;font-size:17px;font-weight: 400;"><center>วันหมดอายุ</center></th>
                            <th style="background-color: #455978;color:#fff;font-size:17px;font-weight: 400;"><center>สถานะ</center></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($orders AS $order)
                            <tr>
                                <td>
                                    <center><?php $date = new DateTime($order->created_at); echo $date->format('d/m/Y H:i'); ?></center>
                                </td>
                                <td><center>{{$order->name}}</center></td>
                                <td><center>{{number_format($order->price_total)}}</center></td>
                                <td><center>{{$order->date_start}}</center></td>
                                <td><center>{{$order->date_end}}</center></td>
                                <td><center>
                                    @if($order->status == 0)
                                        <font color="red">ยังไม่ยืนยัน</font>
                                    @elseif($order->status == 2)
                                        <font color="orange">รอการยืนยัน</font>
                                    @else
                                        <font color="green">ยืนยันแล้ว</font>
                                    @endif
                                </center></td>
                            </tr>
                            @endforeach
                            @if(!($orders == '' || $orders == NULL))
                            @else
                            <center>- ยังไม่มีข้อมูลการสมัคร - </center>
                            @endif
                        
                        </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="col-md-12 class-detail-c">
                        <center>ข้อมูลแพคเกจ ณ ปัจจุบัน</center>
                        <div class="text">ชื่อแพ็คเกจ </div>
                        @if(!($package_exp != ""))
                            @if($packageNow != '' || $packageNow != NULL)
                                <center><span class="package-class">{{$packageNow->name}}</span></center>
                            @else
                                <center><span class="package-class">ยังไม่มีแพ็คเกจ</span></center>
                            @endif
                        @else
                            <center><span class="package-class" style="color:red !important;">{{ $package_exp }}</span></center>
                        @endif

                        @if(!($package_exp != ""))
                            @if($packageNow != '' || $packageNow != NULL)
                                <div class="text">เรียนวัน : <span class="package-class">{{$packageNow->description3}}</span> </div>
                            @else
                                <div class="text">เรียนวัน : <span class="package-class">-</span> </div>
                            @endif
                        @else
                            <div class="text">เรียนวัน : <span class="package-class">-</span> </div>
                        @endif

                        @if(!($package_exp != ""))
                            @if($packageNow != '' || $packageNow != NULL)
                                <div class="text">วันล่ะ : <span class="package-class">{{$packageNow->class_per_day}} คลาส</span></div>
                            @else
                                <div class="text">วันล่ะ : <span class="package-class">-</span></div>
                            @endif
                        @else
                             <div class="text">วันล่ะ : <span class="package-class">-</span></div>
                        @endif

                        @if(!($package_exp != ""))
                        
                            @if($packageNow != '' || $packageNow != NULL)
                                <div class="text">หมดอายุ : <span class="package-class" style="color:red !important;"><?php $date = new DateTime($packageNow->date_end); echo $date->format('d-m-Y'); ?></span></div>
                            @else
                                <div class="text">หมดอายุ : <span class="package-class">-</span></div>
                            @endif
                        @else
                           <div class="text">หมดอายุ : <span class="package-class">-</span></div>
                        @endif
                        
                        
                        <a href="https://www.facebook.com/messages/1600035683573274" target="_bank" class="btn offset-class kanit">ขอชดเชยคลาส</a>
                    </div>
                    <div class="col-md-12 class-detail-c">
                        <center>จํานวนคลาสที่เรียนได้</center><br>
                        <center><div class="boder-class">{{ $packageCount }}</div></center><br>
                        <center>จํานวนคลาสทดลองฟรี</center><br>
                        <center><div class="boder-class">{{$userTrial}}</div></center><br>
                        <center>สิทธิ์ชดเชยคลาส</center><br>
                        <center><div class="boder-class">{{$userMakeup}}</div></center><br>
                        <center>จํานวนคลาสที่เรียนแล้ว</center><br>
                        <center><div class="boder-class">{{$userBookingCount}}</div></center><br>
                    </div>
                    <br>
                </div>
            </div>

        </div>
    
    <div class="col-md-12" style="margin-top:40px;"></div>
</div>
@endsection
@section('script')

<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/spin.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda-button-init.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>


@endsection
