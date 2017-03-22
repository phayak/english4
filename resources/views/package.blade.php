@extends('layouts.nav')

@section('content')
<!-- <div class="page-content"> -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid bg-package">
    <div class="container">
        <div class="col-md-12" style="margin-top:50px;">
            <div class="title-package animated fadeInDown">แพ็คเกจ</div>
            <div class="col-md-6">
                <div class="row">
                    <div class="title-detail">คุณสามารถทดลองเรียนกับเราได้ฟรี 1 class (25 นาที) <div class="clear"></div> เพียงแค่สมัครสมาชิก คุณก็จะได้รับสิทธิ์เรียนฟรีทันที ! ! !
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <a href="{{url('login')}}" class="testclass">ทดลองเรียนฟรี !</a>
                </div>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="tab-1">แพ็คเกจธรรมดา</div>
        </div>
        
        <div class="col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
            @foreach($packages AS $packnomal)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="package-class{{$packnomal->style_css}}">
                    <div class="nomal-name">{{$packnomal->name}}</div>
                    <div class="img">
                        <img src="{{asset($packnomal->img)}}" alt="">
                    </div>
                    <div class="price">
                        <font color="#E22C21">{{$packnomal->price}}</font> / เดือน
                    </div>
                    <div class="detail-price" style="color: #414141;">{!! $packnomal->description2 !!}</div>
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
        </div>

        <div class="col-md-11 col-sm-12 col-xs-12">
            <div class="tab-2">แพ็คเกจพลัส Plus +</div>
        </div>

        <div class="col-md-11 col-sm-12 col-xs-12">
            @foreach($packageplus AS $packplus)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="package-plus-class{{$packplus->style_css}}">
                    <div class="nomal-plus-name">{{$packplus->name}}</div>
                    <div class="img">
                        <img src="{{asset($packplus->img)}}" alt="">
                    </div>
                    <div class="price">
                        <font color="#E22C21">{{$packplus->price}}</font> / เดือน
                    </div>
                    <div class="detail-price">{!! $packplus->description2 !!}</div>
                    <div class="register">
                        <a href="{{url('package/'.$packplus->id)}}">สมัครเลย</a>
                    </div>
                </div>
            </div>
            @endforeach
     <!--        <div class="col-md-3">
                <div class="package-plus-class2">
                    <div class="say-plus-name">Weekday Say “Hello” Plus +</div>
                    <div class="img">
                        <img src="{{asset('assets/img/packageplus2.jpg')}}" alt="">
                    </div>
                    <div class="price">
                        <font color="#E22C21">4,000</font> / เดือน
                    </div>
                    <div class="detail-price"><p>เรียนวันจันทร์-ศุกร์</p><p>เรียนวันล่ะ 2 คลาส</p></div>
                    <div class="register">
                        <a href="{{url('package/create')}}">สมัครเลย</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="package-plus-class3">
                    <div class="fit-plus-name">Time to fit Plus +</div>
                    <div class="img">
                        <img src="{{asset('assets/img/packageplus3.jpg')}}" alt="">
                    </div>
                    <div class="price">
                        <font color="#E22C21">5,000</font> / เดือน
                    </div>
                    <div class="detail-price"><p>เรียนวันจันทร์-อาทิตย์</p><p>เรียนวันล่ะ 2 คลาส</p></div>
                    <div class="register">
                        <a href="{{url('package/create')}}">สมัครเลย</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="package-plus-class4">
                    <div class="holiday-plus-name">Holiday Say “Hello” Plus +</div>
                    <div class="img">
                        <img src="{{asset('assets/img/packageplus4.jpg')}}" alt="">
                    </div>
                    <div class="price">
                        <font color="#E22C21">2,000</font> / เดือน
                    </div>
                    <div class="detail-price"><p>เรียนวันเสาร์-อาทิตย์</p><p>เรียนวันล่ะ 2 คลาส</p></div>
                    <div class="register">
                        <a href="{{url('package/create')}}">สมัครเลย</a>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- Life Style -->
        <div class="col-md-12">
            <div class="row">
                <div class="lifestyle">Life Style อย่างคุณเหมาะกับแพ็คเกจไหน ?</div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <ul class="nav nav-tabs nav-package">
                <a data-toggle="tab" class="" href="#home">
                <div class="col-md-3">
                    <div class="detalbox-1">
                        Child Child
                    </div>
                </div>
                </a>
                <a data-toggle="tab" class="" href="#menu1">
                <div class="col-md-3">
                    <div class="detalbox-2">
                        Weekday Say “Hello”
                    </div>
                </div>
                </a>
                <a data-toggle="tab" class="" href="#menu2">
                <div class="col-md-3">
                    <div class="detalbox-3">
                        Time to fit
                    </div>
                </div>
                </a>
                <a data-toggle="tab" class="" href="#menu3">
                <div class="col-md-3">
                    <div class="detalbox-4">
                        Holiday Say “Hello”
                    </div>
                </div>
                </a>
              </ul> 
            </div>

            <div class="tab-content tabcontent">
                <div id="home" class="tab-pane fade in active">
                    <p class="tabbottom-1"></p>
                    <p class="detail">เหมาะสำหรับคนที่อยากเรียนเพื่อฝึกทักษะการฟังและพูดให้เหมือนเจ้าของภาษาแต่ติดที่ตัวเองเป็นคนมีอะไรให้ทำเยอะแยะเสียจนต้องเลือกเวลาที่ไม่เหมือนคนอื่นอยากเรียนสบายๆไม่เคร่งเครียด
</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <p class="tabbottom-2"></p>
                    <p class="detail">เหมาะสำหรับคนที่มีเวลาว่างในวันธรรมดาอย่างสม่ำเสมอ และอยากใช้เวลาว่างให้เกิดประโยชน์เพื่อฝึกฝนทักษะการฟังและพูดภาษาอังกฤษแบบเจ้าของภาษา อยากเรียนแบบสบายๆ ไม่เคร่งเครียด และอย่างพักผ่อนในวันเสาร์ อาทิตย์</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <p class="tabbottom-3"></p>
                    <p class="detail">เหมาะสำหรับวันทำงานที่มีเวลาแลต้องการใช้เวลานั้นเพื่อฝึกทักษะการฟังการพูดให้ได้อย่างเจ้าของภาษาให้ได้ผลสูงสุดอย่างเต็มประสิทธิภาพและต่อเนื่องมากที่สุด แต่อยากเรียนแบบสบายๆ ค่อยเป็นค่อยไป</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <p class="tabbottom-4"></p>
                    <p class="detail">เหมาะสำหรับคนที่หน้าที่การงานมากมาย และหาเวลาว่างแทบไม่ได้ในวันธรรมดา ต้องใช้วันสบายๆ อย่างวันเสาร์อาทิตย์ เพื่อพัฒนาทักษะการฟังและพูดให้ได้อย่างเจ้าของภาษาในบรรยากาศสบายๆ ค่อยเป็นค่อยไป</p>
                </div>
            </div>
        </div>


    </div>

    <div class="container" style="margin-top:50px;"></div>
</div>

<!-- </div> --><!--.page-content-->

@endsection

@section('script')
<script>
    $('#hom a[href="#profile"]').tab('show') // Select tab by name
    $('#myTabs a:first').tab('show') // Select first tab
    $('#myTabs a:last').tab('show') // Select last tab
    $('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>
@endsection