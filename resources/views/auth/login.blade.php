@extends('layouts.nav')
@section('style')
<style type="text/css">
    .bg-fff {
        background-color: #fff;
        
    }
    .border-login {
        border: 3px solid #e8e8e8;
        border-radius: 15px;
    }
    .btn-facebook {
        background-color: #4E6BAD;
        color: #fff;
        padding-top: 10px;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 10px;
        border-radius: 10px;
        font-size: 18px;
    }
    .btn-facebook:hover {
        color: #fff;
        background-color: #375ba8;
    }
    .title-login-facebook {
        padding-top: 30px;
        font-size: 20px;
        padding-bottom: 50px;
        color: #757575;
    }
    .title-login-email {
        font-size: 22px;
        padding-bottom: 30px;
        text-decoration:underline;
        text-align: center;
        color: #757575;
    }
    .login {
        padding-top: 30px;
    }
    .border-left {
        border-left: 3px solid #e8e8e8;
        height: 400px;
    }
    .title-register {
        padding-top: 30px;
        font-size: 20px;
        padding-bottom: 50px;
        color: #757575;
    }
    .btn-register {
        background-color: #ff5e5e;
        color: #fff;
        padding-top: 10px;
        padding-left: 78px;
        padding-right: 78px;
        padding-bottom: 10px;
        border-radius: 10px;
        font-size: 18px;
    }
    .btn-register:hover {
        color: #fff;
        background-color: #f95252;
    }
    .btn-sign-in {
        background-color: #3881A2;
        color: #fff;
        padding-top: 10px;
       /* padding-left: 78px;
        padding-right: 78px;*/
        padding-bottom: 10px;
        border-radius: 10px;
        font-size: 18px;
        width: 100%;
        border:0;
    }
    .btn-sign-in:hover {
        color: #fff;
        background-color: #449abf;
    }
    .center {
        text-align: center;
    }
    .reset-password {
        font-size: 18px;
        float: right;
        color: #3881A2;
    }
    .input-all {
        border: 2px solid #e8e8e8 !important;
    }
    .goback {
        background-color: #3881A2;
        padding: 10px 25px;
        color: #fff;
        font-size: 18px;
        float: right;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .goback:hover {
        color: #fff;
    }
    @media screen and (min-width: 991px) {
           .border-left {
                display: block;
           }
        }
        @media screen and (max-width: 991px) {
           .border-left {
                display: none;
           }
           .btn-sign-in {
                color: #fff;
                padding-top: 10px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 10px;
                border-radius: 10px;
                font-size: 18px;
                border:0;
            }
        }
</style>

@endsection
@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/')}}" class="goback kanit"><i class="fa fa-caret-left fa-lg" aria-hidden="true"></i> กลับหน้าหลัก</a>
            </div>
        </div>
    </div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-fff border-login">
            <div class="col-md-12" style="margin-top:20px;"></div>
            <div class="col-md-5 col-md-offset-1 center">
                <div class="title-login-facebook kanit">สำหรับผู้ที่มีบัญชี Facebook</div>
                <div><a class="btn-facebook kanit" href="{{url('')}}"><i class="font-icon font-icon-facebook"></i> เข้าระบบด้วย facebook</a></div>
                <br>
                <div class="title-register kanit">สำหรับผู้ที่ยังไม่ได้ลงทะเบียน</div>
                <div><a class="btn-register kanit" href="{{url('register')}}"> ลงทะเบียน</a></div>

            </div>
            <div class="col-md-1">
                <div class="border-left"></div>
            </div>
            <div class="col-md-4">
                <div class="login">
                    <div class="title-login-email kanit">สำหรับผู้ที่เคยลงทะเบียนแล้ว</div>
                    <form id="form-signin_v2" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label kanit" style="color: #757575;">อีเมล์</label>
                                <input type="email" class="form-control input-all" data-validation="[NOTEMPTY]" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label kanit" style="color: #757575;">รหัสผ่าน</label>
                                <input type="password" class="form-control input-all" data-validation="[NOTEMPTY]" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="checkbox-bird">
                                <input type="checkbox" name="remember" id="check-bird-9">
                                <label for="check-bird-9">Remember Me</label>
                            </div>
                        </div>
                        <div class="form-group center">

                            <button type="submit" class="btn-sign-in kanit">
                                <i class="fa fa-btn fa-sign-in"></i> เข้าสู่ระบบ
                            </button>
                        </div>
                        <div class="form-group">
                            <a class="reset-password kanit" href="{{ url('/password/reset') }}">ลืมรหัสผ่าน ?</a>
                        </div>
                        
                    </form>
                </div>   
            </div> 

            <div class="col-md-12" style="margin-top:20px;"></div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:100px;"></div>
</div>

@endsection
