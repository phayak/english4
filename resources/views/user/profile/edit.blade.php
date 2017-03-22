@extends('layouts.nav')

<!-- @section('trial') opened @endsection
@section('trial_ul') display: block; @endsection -->
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
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
</style>
@endsection

@section('content')
<br>
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
                    <li class="kanit f18 fw300 nav-c active"><a href="{{url('/profile/1/edit')}}">ข้อมูลส่วนตัว</a></li>
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/data/class')}}">ข้อมูลคลาสเรียน</a></li>
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/history/class')}}">ประวัติการสมัครแพ็คเกจ</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/msg/class')}}">ข้อความจากครู</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/payment/class')}}">แจ้งโอนเงิน</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/book/class')}}">จองเวลาเรียน</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10" style="border-left: 2px solid #F1F0F0;" >
            <div class="row">
                <div class="col-md-9">
                    <h3 class="kanit nav-c">ข้อมูลส่วนตัว</h3>
                    <div class="nut-teacher-1">แก้ไขข้อมูลส่วนตัว</div>
                    <br>
                    <div class="col-md-10 col-md-offset-1">
                        <form action="{{url('/profile/1')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInputDisabled2">รูปโปรไพล์ :</label>
                                    <input type="file" name="img">
                            </fieldset>

                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInputDisabled2">อีเมลล์ :</label>
                                    <input type="email" class="form-control" readonly value="english@english4speak.com" id="exampleInputDisabled2" placeholder="อีเมลล์">
                            </fieldset>
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput">ชื่อ-สกุล :</label>
                                    <input type="text" class="form-control" id="exampleInput" readonly="" placeholder="ชื่อ-สกุล" value="{{$user->fname}} {{$user->lname}}">
                            </fieldset>
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput"></label>
                                    <div class="radio">
                                        <input type="radio" name="sex" id="radio-1" value="1" {{ $user->sex == '1' ? 'checked="checked"' : '' }}>
                                        <label for="radio-1">ชาย</label>
                                        <input type="radio" name="sex" id="radio-2" value="2" {{ $user->sex == '2' ? 'checked="checked"' : '' }}>
                                        <label for="radio-2">หญิง</label>
                                    </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label semibold fw400" for="date-mask-input">วันเกิด :</label>
                                <input type="text" class="form-control" readonly id="date-mask-input" placeholder="__/__/____">
                                <small class="text-muted">กรุณาใส่เป็นตัวเลข : วัน/เดือน/ปี พ.ศ</small>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label semibold fw400" for="phone-mask-input">เบอร์โทรศัพท์ :</label>
                                <input type="text" class="form-control" name="tel" id="phone-mask-input" placeholder="___-________" value="{{$user->tel}}">
                                <!-- <small class="text-muted">เบอร์โทร : 000-0000000</small> -->
                            </fieldset>
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput">Line ID :</label>
                                    <input type="text" class="form-control" name="line" id="exampleInput" placeholder="Line ID" value="{{$user->line}}">
                            </fieldset>
                             <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput">รหัสผ่าน :</label>
                                    <input type="password" class="form-control" name="password_change" id="exampleInput" placeholder="รหัสผ่าน">
                            </fieldset>
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput"></label>
                                    <button type="submit" class="btn btn-inline btn-english ladda-button kanit fw400" data-style="expand-right">บันทึกข้อมูล</button>
                            </fieldset>

                            
                        </form>
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
<script src="{{asset('assets/js/lib/input-mask/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/lib/input-mask/input-mask-init.js')}}"></script>
@endsection
