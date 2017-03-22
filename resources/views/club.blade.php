@extends('layouts.nav')

@section('content')
<div class="container-fluid bg-package color-while f-w300" style="margin-top: 5px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                <header>
                <div style="margin-top:30px;font-size:25px;color: #f24d4d;text-align: center;">English4Speak Club แหล่งรวมความรู้ภาษาอังกฤษ 
                </div>
                <div style="margin-top:5px;font-size:20px;color: #f24d4d;text-align: center;">
                ยินดีต้อนรับสู่ English4Speak Club พบกับความรู้เกี่ยวกับภาษาอังกฤษ และแบบฝึกหัดมากมายได้ที่นี่เลยค่ะ !
                </div>
                </header>
                 <br>
                  <br>
            </div>
           
            <div class="col-md-8 col-sm-12 col-xs-12">
                @foreach($article AS $art)
                    <div class="col-md-12">
                    <h5>{{$art->title}}</h5>
                    <div style="margin-top: -15px;font-size:13px;">จำนวนคนดู {{$art->reply}} ท่าน</div>
                    <div style="margin-top: 15px;"><img src="{{$art->img}}" width="100%" alt=""></div>
                    <div style="margin-top: 15px;">{{$art->body}}</div>
                    </div>
                @endforeach
                <center>{{ $article->links() }}</center>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h3>บทความแนะนำ</h3>
                @foreach($article_name AS $art_name)
                    <div style="margin-top: 15px;"><font style="font-size:13px; color: #0db09b;">{{$art_name->title}}</font></div>
                    <div style="border-bottom: 1px solid #ddd;margin-top: 5px;"></div>
                @endforeach
                <br>
                <h3>หมวดหมู่บทความ</h3>
            </div>

        </div>
    </div>
</div>
@endsection