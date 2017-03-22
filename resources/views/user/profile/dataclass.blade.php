@extends('layouts.nav')

<!-- @section('trial') opened @endsection
@section('trial_ul') display: block; @endsection -->
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                    <li class="kanit f18 fw300 nav-c active"><a href="{{url('/profile/data/class')}}">ข้อมูลคลาสเรียน</a></li>
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
                    <h3 class="kanit nav-c">ข้อมูลคลาสเรียน</h3>
                    <!-- <div class="nut-teacher-1">แก้ไขข้อมูลส่วนตัว</div> -->
                    @if($classhistory == 1)
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            @foreach($userBookingClass AS $uBook)
                            <div class="col-md-6">
                                <div class="border-dataclass">
                                    <div class="box-date">
                                        <!-- MONDAY 06 JUNE 2016 -->
                                        <?php echo \Carbon\Carbon::parse($uBook->date)->format('l \, d F Y'); ?>
                                    </div>
                                    <div class="box-time">
                                        <?php echo \Carbon\Carbon::parse($uBook->start_time)->format('H:i'); ?> - <?php echo \Carbon\Carbon::parse($uBook->end_time)->format('H:i'); ?>
                                    </div>
                                    <div class="box-teacher">
                                        {{$uBook->name}}
                                    </div>
                                    <div class="box-status">
                                        @if($uBook->status == 0)
                                        สถานะ : <span class="val-2">ยังไม่เข้าเรียน <i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                        @else
                                        สถานะ : <span class="val-1">เข้าเรียนแล้ว <i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                    
                                    <div class="box-button">
                                        <center><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-english-class">เข้าห้องเรียน</a></center>
                                        <?php 
                                            $cancelclass =  \Carbon\Carbon::parse($uBook->date.$uBook->start_time)->format('Y-m-d H:i:s');
                                            $timeone = \Carbon\Carbon::now()->addMinute(60)->format('Y-m-d H:i:s'); 
                                        ?>
                                        @if($timeone <= $cancelclass)
                                        <center><a href="javascript:void(0);" onclick="cancelclass();" class="btn btn-english-cancel-class">ยกเลิกคลาสนี้</a></center>
                                        @else
                                        <center><a href="javascript:void(0);" onclick="cancelclassfail();" class="btn btn-english-cancel-class2">ยกเลิกคลาสนี้</a></center>
                                        @endif

                                        <center><a href="javascript:void(0);" onclick="checkdetail({{ $uBook->id }},{{ $uBook->user_id }},{{ $uBook->teacher_id }});"  class="btn btn-english-view-class">ดูข้อมูลคลาสนี้</a></center>
                                    </div>
                                   
                                </div>
                            </div> <!-- col-md-6 -->
                            @endforeach
                            <div class="col-md-12">
                                <br>
                                <center>{{ $userBookingClass->links() }}</center>
                            </div>

                        </div> <!-- row -->
                    </div>
                    @else
                        <div class="col-md-12 col-sm-12">
                            <hr>
                            <br>
                            <center><h4>ไม่พบข้อมูล</h4></center>
                            <br>
                            <hr>
                        </div>
                    @endif
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


<!-- Modal -->
<div class="modal" id="trialclasses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-toggle="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ดูข้อมูล คลาสเรียน</h4>
      </div>
      <div class="modal-body">
            <div id="detailstudent"></div>
            <div id="detail_english">
                <ul>
                    <li></li>
                </ul>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Cancelfial -->
<div class="modal" id="myCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
            <!-- <h4 class="modal-title" id="myModalLabel">ยกเลิกคลาสเรียน</h4> -->
            <div id="detailstudent">
                <center><h4>คุณต้องการยกเลิกคลาสเรียนนี้</h4></center>
                <center><div style="font-weight: 300;"><font color="red">เนื่อจากการยกเลิกคลาสเรียนต้อง ยกเลิกก่อนเป็นเวลา 3 ชั่วโมงก่อนเวลาเริ่มเรียน</font></div></center>
            </div>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal Cancelfial -->
<div class="modal" id="myCancelFail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
            <!-- <h4 class="modal-title" id="myModalLabel">ยกเลิกคลาสเรียน</h4> -->
            <div id="detailstudent">
                <center><h4>คุณไม่สามารถยกเลิกคลาสเรียนนี้</h4></center>
                <center><div><font color="red">เนื่อจากการยกเลิกคลาสเรียนต้อง ยกเลิกก่อนเป็นเวลา 3 ชั่วโมงก่อนเวลาเริ่มเรียน</font></div></center>
            </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
    function cancelclass(){
        $('#myCancel').modal('toggle');
    }
    function cancelclassfail(){
        $('#myCancel').modal('toggle');
        // $('#myCancelFail').modal('toggle');
    }

</script>
@endsection
@section('script')
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/spin.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda-button-init.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/app.js')}}"></script> -->


<script>
    var token = window.Laravel.csrfToken;
    $('#trialclasses').on('hidden.bs.modal', function () {
        location.reload();
    })
    function checkdetail(userbookid,userid,teacherid){
        // console.log(userbookid+'|'+userid+'|'+teacherid);
        $.ajax({
            url: '/checktraildata',
            type: 'POST',
            dataType: 'json',
            data: { _token:token,userbookingid:userbookid,userid:userid,teacherid:teacherid},
            success:function(data) {

                if(data.trial_classes != 'no')
                {
                    $('#detailstudent').html('<center><h3>Trial Class Student</h3></center>');

                    $.each( data.trial_classes, function( i, item ) {

                        $("#detail_english ul").append('<li><h3>introduce yourself</h3></li>');
                        $("#detail_english ul").append('<li><label>1.Name of the student</label></li>');
                        $("#detail_english ul").append('<li class="fw400">'+item.a1+'</li>');
                        $("#detail_english ul").append('<li><label>2.Nickname</label></li>');
                        $("#detail_english ul").append('<li class="fw400">'+item.a2+'</li>');
                        $("#detail_english ul").append('<li><label>3.Date of Birth</label></li>');
                        $("#detail_english ul").append('<li class="fw400">'+item.a3+'</li>');
                        // if ( i === 3 ) {
                        //   return false;
                        // }
                    });


                    $('#trialclasses').modal('show');
                    return true;
                    

                } else{
                    $('#detailstudent').html('<center><h2 style="margin-top:20px;">--ไม่พบข้อมูล--</h2></center>');
                    $('#trialclasses').modal('show');
                    return false;
                }
               

                // $.each(data, function(i,item) {
                //     alert(data.);
                // })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            }
        });

    }
</script>


@endsection
