@extends('layouts.nav')

@section('content')
<!-- <div class="page-content"> -->
<div class="container-fluid bg-teacher">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="title">
                    <h1 class="animated fadeInDown">ครูของเรา</h1>
                    <div class="text">ครูของเราเป็นชาวฟิลิปปินส์ ซึ่งมีประสบการณ์ใน การสอนนักเรียนต่างชาติมากกว่า 3 ปี ซึ่งนักเรียน ส่วนใหญ่มาจากประเทศ ญี่ปุ่น เกาหลี และจีน ภาษาอังกฤษถือเป็นภาษาราชการของประเทศ ฟิลิปปินส์ อีกทั้งครูของเราทุกคนผ่านการทดสอบ เพื่อให้มีความรู้ความสามารถในการสอนนักเรียนเป็น อย่างดี</div>
                    <!-- <a href=""><div class="btn testlearn animated bounceInDown">ทดลองเรียนฟรี</div></a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container teacher-present">
        @foreach($teachers AS $data)
        <div class="row teacher-box">
            <div class="col-md-2">
                <img src="{{ $data->img }}" width="100%" height="auto" alt="">
                <div class="teacher-name">{{ $data->name }}</div>
            </div>
            <div class="col-md-5 bg-teacher-detail">
                <div class="detail">
                    {{ $data->title }}
                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-12 teacher-video">
                    <iframe src="{{ $data->vdo_link }}" width="100%" height="230" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>

        @endforeach



    </div>
    <div class="container" style="margin-top:50px;"></div>
</div>
<!-- </div> --><!--.page-content-->

@endsection
