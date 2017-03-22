@extends('layouts.nav')

<!-- @section('trial') opened @endsection
@section('trial_ul') display: block; @endsection -->
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugin/datepicker/css/bootstrap-datepicker.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/jquery.loading.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">


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
                    <li class="kanit f18 fw300 nav-c"><a href="{{url('/profile/payment/class')}}">แจ้งโอนเงิน</a></li>   
                    <li class="kanit f18 fw300 nav-c active"><a href="{{url('/profile/book/class')}}">จองเวลาเรียน</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10" style="border-left: 2px solid #F1F0F0;" >
            <div class="row">
                <div class="col-md-9">
                    <h3 class="kanit nav-c">จองเวลาเรียน</h3>
                    <!-- <div class="nut-teacher-1">แก้ไขข้อมูลส่วนตัว</div> -->
                    <br>
                    <div class="col-md-12 col-sm-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="input-group date">
                                      <input type="text" id="datepicker-ajax" class="form-control" data-date-format='yy-mm-dd' readonly value="<?php echo ($dateInput=='1' ? \Carbon\Carbon::parse($getDayInput)->format('d/m/Y') : \Carbon\Carbon::Now()->format('d/m/Y')); ?>"><span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8">
                               <span class="pull-right"> page {{ $paginate->links() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bookingclass">
                    <!-- table-bordered -->
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="row">

                                <?php $timeNow = \Carbon\Carbon::now()->format('H:i:s'); ?>
                                <?php $timeone = \Carbon\Carbon::now()->addMinute(60)->format('Y-m-d H:i:s'); ?>

                                @if(!($data == 0 || $data == NULL))
                                <br>
                                @foreach($data AS $array => $dt)


                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{asset('assets/img/avatar-sign.png')}}" class="img" width="100%" alt="">
                                    <div class="bookgin-class-name-teacher">{{$dt['teacher_name']}} <br> </div>
                                    
                                    @foreach($dt['time_booking'] AS $key => $timetb)
                                        
                                       <!-- เช็คสถานะว่า ยังไม่ได้จอง -->
                                        @if($timetb->status_booking == 0) 
                                                 
                                            <?php $timetaecher = \Carbon\Carbon::parse($dt['date_teacher'].$timetb->time_th)->format('Y-m-d H:i:s'); ?>
                                            @if($timeone <= $timetaecher)
                                            
                                            <button  id="btntime{{$timetb->time_id}}-{{$dt['teacher_id']}}" class="booking-class-2"
                                                onclick="submitclass({{ $packageCount }},5,{{$dt['teacher_id']}},{{$timetb->time_id}},<?php echo "'".$dt['date_teacher']."'"; ?> );">
                                                 <div class="kanit">ว่าง</div>
                                                <div>
                                                    <?php echo \Carbon\Carbon::parse($timetb->time_th)->format('H:i'); ?>
                                                    -
                                                    <?php echo \Carbon\Carbon::parse($timetb->time_th)->addMinute(30)->format('H:i'); ?>
                                                </div>
                                            </button>
                                           
                                            @else
                                                <div class="booking-class-2" style="text-align: center;cursor:default;background: #4b843d; color: #ddd;" >
                                                    
                                                    <div>ไม่ว่าง</div>
                                                    <div>
                                                        <?php echo \Carbon\Carbon::parse($timetb->time_th)->format('H:i'); ?>
                                                        -
                                                        <?php echo \Carbon\Carbon::parse($timetb->time_th)->addMinute(30)->format('H:i'); ?>
                                                    </div>
                                                </div>
                                                
                                            @endif

                                        @endif
                                        @if($timetb->status_booking == 1)
                                            <div class="booking-class-3" style="text-align: center;cursor:default"">
                                                <div>ไม่ว่าง</div>
                                                <div>
                                                    <?php echo \Carbon\Carbon::parse($timetb->time_th)->format('H:i'); ?>
                                                    -
                                                    <?php echo \Carbon\Carbon::parse($timetb->time_th)->addMinute(30)->format('H:i'); ?>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            @endforeach

                            @else
                                <hr>
                                <br>
                                <h4><center>- ไม่พบข้อมูลเรียน -</center></h>
                                <br>
                                <hr>
                            @endif
                            
                            
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    
                                </div>
                            

                            </div>
                        </div>
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
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
</div>




@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/spin.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda-button-init.js')}}"></script>


<script src="{{asset('assets/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('assets/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
<script src="{{asset('assets/js/lib/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>

<script src="{{asset('assets/plugin/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugin/datepicker/locales/bootstrap-datepicker.th.min.js')}}"></script>

<script src="{{asset('assets/js/moment-with-locales.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.loading.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>


<!-- Modal Cancelfial -->
<div class="modal" id="mySubmitclass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="border: 0 !important;margin-bottom: -30px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <!-- <h4 class="modal-title" id="myModalLabel">ยกเลิกคลาสเรียน</h4> -->
            <div id="detailstudent">
                <center><h3>ยันยันการจอง</h3></center>
                <center><div style="font-size: 20px;margin-top: 10px;margin-bottom: 60px;"><font color="">คุณต้องการที่จะจองแบบใหน</font></div></center>
                <center>
                    <button id="btnA" class="btn btn-success kanit fw300">ใช้แพ็คเกจ ({{ $packageCount }})</button>
                    <button id="btnB" class="btn btn-english button-margin-left-20 kanit fw300" >ใช้ทดลองเรียน ({{$userTrial}})</button>
                    <button id="btnC" class="btn btn-warning button-margin-left-20 kanit fw300">ใช้ชดเชย ({{$userMakeup}})</button>
                </center>
            </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">

    

</script>
<script>
    var token = window.Laravel.csrfToken;
    function Submitclass(){
        $('#mySubmitclass').modal('toggle');
    }

    function submitclass(package,packagefree,teacher_id,time_id,date_teacher){
        $('#mySubmitclass').modal('toggle');

        $(document).on('click', "#btnA", function() {
            $.ajax({
                url: "{{url('user/booking')}}",
                type: 'POST',
                dataType: 'json',
                data: {_token: token, teacher_id: teacher_id, time_id:time_id, date_teacher: date_teacher},
                success: function (data) {
                    console.log(data);
                
                    if(data.todaybooking == 'no'){
                       swal(
                            'คุณเลือกวันที่ไม่ถูกต้อง !',
                            'ท่านไม่สามารถทำรายย้อนหลังได้',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.package_exp == 'nopackage'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก คุณไม่มี แพ็คเกจ',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.package_exp == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจ ของคุณหมดอายุ',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.intHoliday == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก คุณใช้จํานวนคลาสที่เรียน หมดแล้ว',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.package_no == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจไม่ตรงตามเงื่อนไข',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.check_class_per_day == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.teacher_null == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก ข้อมูลการจองไม่ตรงกับฐานข้อมูล',
                            'error'
                        );
                       location.reload();

                    }
                    if(data.book_count_week == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                       location.reload();

                    }

                    if(data.teacher_null == 'yes'){
                        $("#btntime"+time_id+"-"+teacher_id).removeClass('booking-class-2').addClass('booking-class-3');
                        $("#btntime"+time_id+"-"+teacher_id).prop('disabled', true);

                       swal(
                            'จองสำเร็จ!',
                            'ท่านได้จองคลาสนี้แล้ว',
                            'success'
                        );
                       location.reload();
                    }
                    
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    swal(
                        'error!',
                        'เนืองจาก server มีปัญหา',
                        'error'
                    );
                    location.reload();
                    console.log('Error:', data);
                }
            });
        });
        $(document).on('click', "#btnB", function() {
            $.ajax({
                url: "{{url('user/bookingtrial')}}",
                type: 'POST',
                dataType: 'json',
                data: {_token: token, teacher_id: teacher_id, time_id:time_id, date_teacher: date_teacher},
                success: function (data) {
                    console.log(data);
                
                    if(data.trial_class == 'no'){
                        swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก จำนวนการจองของคุณได้ครบแล้ว',
                            'error'
                        );
                        location.reload();
                    }

                    if(data.package_no == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'สิทธิ์ทดลองเรียนได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                        location.reload();
                    }
                    if(data.book_count_week == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                        location.reload();
                    }
                    if(data.check_class_per_day == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.teacher_change == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'ไม่ตรงตามเงื่อนไขทดลองเรียนฟรี',
                            'error'
                        );
                       location.reload();
                    }
                    if(data.teacher_null == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก ข้อมูลการจองไม่ตรงกับฐานข้อมูล',
                            'error'
                        );
                       location.reload();

                    }
                    if(data.teacher_null == 'yes'){
                        $("#btntime"+time_id+"-"+teacher_id).removeClass('booking-class-2').addClass('booking-class-3');
                        $("#btntime"+time_id+"-"+teacher_id).prop('disabled', true);

                       swal(
                            'จองสำเร็จ!',
                            'ท่านได้จองคลาสนี้แล้ว',
                            'success'
                        );
                        location.reload();
                    }
                    
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    swal(
                        'error!',
                        'เนืองจาก server มีปัญหา',
                        'error'
                    );
                    location.reload();
                    console.log('Error:', data);
                }
            });
        });
        $(document).on('click', "#btnC", function() {
           $.ajax({
                url: "{{url('user/bookingmakeup')}}",
                type: 'POST',
                dataType: 'json',
                data: {_token: token, teacher_id: teacher_id, time_id:time_id, date_teacher: date_teacher},
                success: function (data) {
                    console.log(data);
                
                    if(data.package_no == 'no'){
                       swal(
                            'ไม่มีสิทธิ์ชดเชยคลาสเรียน !',
                            'เนืองจาก ต้องมีแพ็คในการใช้งานเท่านั้น',
                            'error'
                        );
                        location.reload();
                    }

                    if(data.book_count_week == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                        location.reload();
                    }
                    if(data.check_class_per_day == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก แพ็คเกจได้ครบตามเงื่อนไขแล้ว',
                            'error'
                        );
                        location.reload();
                    }
                    if(data.teacher_change == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'ไม่ตรงตามเงื่อนไขทดลองเรียนฟรี',
                            'error'
                        );
                        location.reload();
                    }
                    if(data.teacher_null == 'no'){
                       swal(
                            'คุณไม่สามารถทำรายการได้ !',
                            'เนืองจาก ข้อมูลการจองไม่ตรงกับฐานข้อมูล',
                            'error'
                        );
                        location.reload();

                    }
                    if(data.teacher_null == 'yes'){
                        $("#btntime"+time_id+"-"+teacher_id).removeClass('booking-class-2').addClass('booking-class-3');
                        $("#btntime"+time_id+"-"+teacher_id).prop('disabled', true);

                        swal(
                            'จองสำเร็จ!',
                            'ท่านได้จองคลาสนี้แล้ว',
                            'success'
                        );
                        location.reload();
                    }
                    
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    swal(
                        'error!',
                        'เนืองจาก server มีปัญหา',
                        'error'
                    );
                    location.reload();
                    console.log('Error:', data);
                }
            }); 
        });
       
    
    }

</script>

<script>

    $(function() {

        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            appendText: "(yyyy-mm-dd)",
            autoSize: true,
            language: "th",
            startDate: "<?php echo \Carbon\Carbon::Now()->format('d/m/Y'); ?>",
            autoclose: true,
            todayHighlight: true,
            altFormat: "yy-mm-dd",
            onSelect: function (date) {
                alert('top');
                // Your CSS changes, just in case you still need them        
            }
        });
        $('#datepicker-ajax').change(function(event) {
            var datechange = $('#datepicker-ajax').val();
            var token = $('#token').val();

            //profile/book/class?date=2017-01-03

            var $yy = datechange.substr(6,4);
            var $mm = datechange.substr(3,2);
            var $dd = datechange.substr(0,2);
            var $newdate = $yy + '-' + $mm + '-' + $dd;


            $('body').loading({
              stoppable: true,
              theme: 'dark',
              // message: 'Working...'
            });
            window.location.href = "/profile/book/class?date="+$newdate;

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // $.ajax({
            //     type: 'POST',
            //     url: "{{url('profile/book/changedate')}}",
            //     data: {_token: token,datepicker:datechange},
            //     success: function (response) {
            //        console.log(response);                 
            //     },
            // })

            
        });

    });

    function trialClassExp() {
        swal(
          'Oops...',
          'แพ็คเกจทดลองหมดแล้ว',
          'error'
        );
    }
    function packageExp() {
        swal(
          'Oops...',
          'แพ็คเกจของคุณครบแล้ว',
          'error'
        );
    }
    function packageNotBooking() {
        swal(
          'Oops...',
          'แพ็คเกจของคุณไม่ตรง',
          'error'
        );
    }



</script>


@endsection
