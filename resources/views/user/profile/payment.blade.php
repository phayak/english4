@extends('layouts.nav')

<!-- @section('trial') opened @endsection
@section('trial_ul') display: block; @endsection -->
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugin/datepicker/css/bootstrap-datepicker.min.css')}}">

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
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/1/edit')}}">ข้อมูลส่วนตัว</a></li>
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/data/class')}}">ข้อมูลคลาสเรียน</a></li>
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/history/class')}}">ประวัติการสมัครแพ็คเกจ</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/msg/class')}}">ข้อความจากครู</a></li>  
                    <li class="kanit f18 fw300 nav-c active"><a href="{{url('/profile/payment/class')}}">แจ้งโอนเงิน</a></li>  
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/book/class')}}">จองเวลาเรียน</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10" style="border-left: 2px solid #F1F0F0;" >
            <div class="row">
                <div class="col-md-9">
                    <h3 class="kanit nav-c">แจ้งชำระเงินแพ็คเกจ</h3>
                    <!-- <div class="nut-teacher-1">แก้ไขข้อมูลส่วนตัว</div> -->
                    <hr>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <form action="{{url('profile/paymentinsert')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInputDisabled2"><font color="red">เลือกรายการที่ต้องการแจ้งชำระ {{ $errors->first('order_id', 'กรุณาเลือก') }}</font></label>
                                    <select name="order_id" class="bootstrap-select bootstrap-select-arrow">
                                        <option value="">เลือก</option>
                                        @foreach($packagePayemnt AS $pay)
                                        <option value="{{$pay->id}}">แพ็คเกจ : {{$pay->name}} ( ยอดชำระ {{$pay->price_total}} บาท)</option>
                                        @endforeach
                                    </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label semibold fw400" for="exampleInputDisabled2"><font color="red">เลือกบัญชีที่ชำระเงิน</font> </label>
                                <div class="checkbox-detailed">
                                    <input type="radio" name="pament_type_id" value="1" id="check-det-1"/ >
                                    <label for="check-det-1" style="width: 100% !important;">
                                    <span class="checkbox-detailed-tbl">
                                        <span class="checkbox-detailed-cell">
                                            <span class="checkbox-detailed-title fw300"><img src="{{asset('assets/img/icon_kasikon.png')}}" width="35" height="auto" alt=""> เลขที่บัญชี 012-8-41221-2 บจก. อิงลิช ฟอร์ สปีค จำกัด ประเภทบัญชี ออมทรัพย์ ธนาคารกสิกรไทย</span>
                                        </span>
                                    </span>
                                    </label>
                                </div>

                                <div class="checkbox-detailed">
                                    <input type="radio" name="pament_type_id" value="2" id="check-det-2"/>
                                    <label for="check-det-2" style="width: 100% !important;">
                                    <span class="checkbox-detailed-tbl">
                                        <span class="checkbox-detailed-cell">
                                            <span class="checkbox-detailed-title fw300"><img src="{{asset('assets/img/BBL-BS-E.jpg')}}" width="35" height="auto" alt=""> เลขที่บัญชี 033-0-81366-8 บจก. อิงลิช ฟอร์ สปีค จำกัด ประเภทบัญชี ออมทรัพย์ ธนาคารกรุงเทพ</span>
                                        </span>
                                    </span>
                                    </label>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInputDisabled2"><font color="red">จำนวนเงินที่ชำระ</font></label>
                                    <input type="text" class="form-control" name="total" id="money-mask-input" value="" placeholder="0,000">
                            </fieldset>

                            <label class="form-label semibold fw400" for="exampleInputDisabled2"><font color="red">วันที่ชำระ</font></label>
                            <div class="input-group date">
                                <input type="text" name="date" id="datepicker-ajax" class="form-control" readonly value=""><span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>

                            <fieldset class="form-group">
                                <label class="form-label semibold fw400" for="exampleInputDisabled2"><font color="red">เวลาที่ชำระ</font></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="time1" class="bootstrap-select bootstrap-select-arrow">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select> 
                                        </div>   
                                        <div class="col-md-6">
                                            <select name="time2" class="bootstrap-select bootstrap-select-arrow">
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                            </select>
                                        </div> 
                                    </div> 
                            </fieldset>

                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput"><font color="red">หลักฐานการชำระเงิน (ถ้ามี)</font></label>
                                    <input type="file" name="file_slip">
                            </fieldset>
                            
                            <fieldset class="form-group">
                                    <label class="form-label semibold fw400" for="exampleInput"></label>
                                    <button type="submit" class="btn btn-inline btn-english ladda-button kanit fw400" data-style="expand-right">บันทึกข้อมูล</button>
                            </fieldset>
                            
                            <hr>
                            <div><font color="red">*</font> ท่านจะเริ่มใช้งานได้เมื่อเราได้รับการยืนยันการชำระเงินแล้ว (ไม่เกิน 24 ชั่วโมง)</div>
                            
                        </form>
                        </div>
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

<script src="{{asset('assets/js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
<script src="{{asset('assets/js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/lib/select2/select2.full.min.js')}}"></script>

<script src="{{asset('assets/js/lib/input-mask/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/lib/input-mask/input-mask-init.js')}}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('assets/plugin/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugin/datepicker/locales/bootstrap-datepicker.th.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>

<script>
    $(function() {

        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            appendText: "(yyyy-mm-dd)",
            autoSize: true,
            language: "th",
            autoclose: true,
            todayHighlight: true,
            altFormat: "yy-mm-dd",
            onSelect: function (date) {
                alert('top');
                // Your CSS changes, just in case you still need them        
            }
        });

    });
</script>

@endsection
