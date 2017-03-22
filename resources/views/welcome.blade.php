@extends('layouts.nav')


@section('style')
<link rel="stylesheet" href="{{asset('assets/plugin/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugin/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
@endsection

@section('content')
<!-- <div class="page-content"> -->
<div class="container-fluid bg-box-1">
    <div class="container">
        <div class="col-md-12">
            <div class="title">
                <h1 class="animated fadeInDown">เก่ง<span style="color:red;">อังกฤษ</span>ต้องติด “<span style="color:#85C3CE;">เล่น</span>”</h1>
                <div class="text-line-1">การเรียนภาษาอังกฤษออนไลน์รูปแบบใหม่</div>
                <div class="text-line-2">กับครูชาวต่างชาติแบบตัวต่อตัว ง่ายๆ ได้ที่บ้าน</div>
                <span>
                    <a href="{{url('/register')}}"><div class="btn testlearn animated bounceInDown">ทดลองเรียนฟรี</div></a>
                    <a href="{{url('/aboutus')}}"><div class="btn testlearn-more animated bounceInDown">ข้อมูลเพิ่มเติม</div></a>
                </span>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="home-avatar-landing">
                        <img src="{{asset('assets/img/home-index.png')}}" width="150" alt="">
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="video"> 
                        <a href=""><div class="btn video-link animated slideInLeft"><i class="fa fa-caret-right fa-lg" aria-hidden="true"></i> ดูวิดีโอแนะนํา</div></a>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="count-student"> 
                        <div class="btn count animated slideInRight">นักเรียนจํานวน 2,952 คน</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:50px;"></div>
</div>

<div class="container-fluid bg-box-2">
    <div class="container">
        <div class="col-md-12">
            <div class="title-top">เรียนกับเราแล้วดีกว่ายังไง</div>
            <div class="col-md-3">
                <center><img src="{{asset('assets/img/learn1.png')}}" alt=""></center>
                <div class="title">
                    เรียนที่ใหนก็ได้
                </div>
                <div class="detail">
                    เรียนภาษาอังกฤษออนไลน์<br>ได้ทุกที่ที่มีอินเตอร์เน็ต
                </div>
            </div>
            <div class="col-md-3">
                <center><img src="{{asset('assets/img/learn2.png')}}" alt=""></center>
                <div class="title">
                    จัดตารางเรียนเองได้
                </div>
                <div class="detail">
                    เรียนภาษาอังกฤษออนไลน์<br>ได้ทุกที่ที่มีอินเตอร์เน็ต
                </div>
            </div>
            <div class="col-md-3">
                <center><img src="{{asset('assets/img/learn3.png')}}" alt=""></center>
                <div class="title">
                    เนื้อหาปรับตามผู้เรียน
                </div>
                <div class="detail">
                    เรียนภาษาอังกฤษออนไลน์<br>ได้ทุกที่ที่มีอินเตอร์เน็ต
                </div>
            </div>
            <div class="col-md-3">
                <center><img src="{{asset('assets/img/learn4.png')}}" alt=""></center>
                <div class="title">
                    แพ็คเกจหลากหลาย
                </div>
                <div class="detail">
                    เรียนภาษาอังกฤษออนไลน์<br>ได้ทุกที่ที่มีอินเตอร์เน็ต
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-top-step">
                    <div class="step-4"><font color="red" style="padding-top: 50px;">3</font> <font size="8">ขั้นตอนง่ายๆ</font></div>
                    <div class="eng-step">เมื่อเรียนกับ English4Speak</div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 center">
                <img src="{{asset('assets/img/step1.png')}}" alt="">
                <div class="clearfix margin10">
                    <div class="row">
                        <div class="col-md-4 center">
                            <div class="row"><div class="step1-squre">1</div></div>
                        </div>
                        <div class="col-md-8">
                            <div class="step1-text">ลงทะเบียน</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 center">
                <img src="{{asset('assets/img/step2.png')}}" alt="">
                <div class="clearfix margin10">
                    <div class="row">
                        <div class="col-md-5 center">
                            <div class="row"><div class="step1-squre">2</div></div>
                        </div>
                        <div class="col-md-7">
                            <div class="step1-text">จองคลาส</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 center">
                <img src="{{asset('assets/img/step3.png')}}" alt="">
                <div class="clearfix margin10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row"><div class="step1-squre">1</div></div>
                        </div>
                        <div class="col-md-9">
                            <div class="step1-text">เข้าเรียนผ่านเว็บไซต์</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="margin30"></div>
    </div>
</div>
<!-- <div class="container-fluid fixed-panel" id="style-2" style="margin-top: -15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <center><img src="http://www.english4speak.com/img/monitor1_03.png" width="90%" alt=""></center>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2"><font style="font-size: 200px;margin-top: -100px;">1</font></div>
                    <div class="col-md-10"><h2><font color="#f0c62e">สมัครสมาชิก</font></h2>
                <h3>
                    <p>เพียงแค่สมัครสมาชิกในวันนี้ <br>คุณจะได้รับสิทธิทดลองเรียนฟรี <br> จำนวน 1 Class </p>
                </h3></div>
                </div>
               
            </div>
        </div>

    </div>
</div> -->

<div class="container-fluid bg-box-2">
    <div class="container">
        <div class="col-md-12">
            <div class="title-top">แพ็คเกจ</div>
        </div>
        @foreach($packages AS $packnomal)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="package-class{{$packnomal->style_css}}">
                <div class="nomal-name">{{$packnomal->name}}</div>
                <div class="img margin-0">
                    <img src="{{asset($packnomal->img)}}" alt="">
                </div>
                <div class="price">
                    <font color="#E22C21">{{$packnomal->price}}</font> / เดือน
                </div>
                <div class="detail-price">{!! $packnomal->description2 !!}</div>
                <div class="register">
                    @if (Auth::guest())
                    <a href="{{url('login')}}">สมัครเลย</a>
                    @else
                    <a href="{{url('/package/'.$packnomal->id)}}">สมัครเลย</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <center><a href="{{url('/register')}}"><div class="btn learn-register">ทดลองเรียนฟรี</div></a></center>
    </div>
</div>

<!-- </div> --><!--.page-content-->
@endsection

@section('script')

<script src="{{asset('assets/plugin/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
    });
</script>

@endsection
